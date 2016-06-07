<?php

/**
 * EGalleryBase class file.
 *
 * Provides functions used by EGallery and EGalleryManager classes.
 * Logs notices to the category 'app.extensions.EGallery' with a level of 'info'.
 *
 * @version 1.0
 *
 * @author scythah <scythah@gmail.com>
 * @link http://www.yiiframework.com/extension/egallery/
 */

class EGalleryBase extends CWidget {
	public $name = 'Галерея';
	public $path = '/images/gallery';
	public $id = 'gallery';
    public $showNav = true;
	public $mimeTypes = array('image/gif','image/jpeg','image/png');
    public $createThumbnails = true;
    public $thumbnailWidth = 279;
    public $thumbnailHeight = 185;
    public $displayFoldersAsDates = false;
    public $dateFormat = 'jS M Y';
    public $imagesPerPage = 60;
    public $imagesPerRow = 5;
    public $albumsPerPage = 30;
    public $albumsPerRow = 0;
    public $sort_order = 'desc';
	protected $_dir;
	protected $_realpath;
	protected $_images = array();
	protected $_albums = array();
	protected $_cssFile;
	protected $_folderImage;
	protected $_blankImage;
	protected function setup(){
		if(substr($this->path, 0, 1) == '/')
		{
			$this->_realpath = realpath($_SERVER['DOCUMENT_ROOT'].$this->path);
		}
		else
		{
			$this->_realpath = realpath(getcwd().DIRECTORY_SEPARATOR.$this->path);
		}
		if($this->path != '' && file_exists($this->_realpath)):
			$cs=Yii::app()->clientScript;
			$am = Yii::app()->getAssetManager();

			$this->_folderImage = $am->publish(dirname(__FILE__).DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'folder.png');
			$this->_blankImage = $am->publish(dirname(__FILE__).DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'image.png');
			$this->_cssFile = $am->publish($this->generateCSS(dirname(__FILE__).DIRECTORY_SEPARATOR.'css'));
			$cs->registerCssFile($this->_cssFile);

			parent::init();
		else:
			Yii::log('Path to gallery is not specified or invalid: '.$this->path, 'info', 'app.extensions.EGallery');
			throw new CException('Path to gallery is not specified or invalid.');
		endif;
	}

	/**
	 * Gets a list of albums, sorted according to {@see $sort_order} with
	 * the first image as a thumbnail or the {@see $folderImage default folder image}
	 * if a thumbnail hasn't been created yet.
	 *
	 * @return array the list of albums
	 */
	protected function getAlbums()
	{
		$_cache=(isset(Yii::app()->cache))?Yii::app()->cache->get('EGallery_'.$this->path.'_albums'):false;
		if($_cache!==false && json_decode($_cache, true)!==null):
			return json_decode($_cache, true);
		else:
			function cmp($a, $b)
			{
				return strcmp($a['name'], $b['name']);
			}

			$goodfiles = array();

			$albums = new DirectoryIterator($this->_realpath);
			foreach ($albums as $album) {
				if ($album->isDir() && !$album->isDot() && substr($album->getFilename(), 0, 1) != '.') {
					$thumb = $this->getImages($album->getFilename(), true);
                    
					$goodfiles[] = array('title'=>$this->getTitle($album->getFilename()),
									'name'=>$album->getFilename(),
									'count'=>$this->getImageCount($album->getFilename()),
									//'thumb'=>($thumb[0]['thumb'] == $this->_blankImage)?$this->_folderImage:$thumb[0]['thumb'],
                                    'thumb'=>(empty($thumb))
                                    ?$this->_folderImage:$thumb[0]['thumb'],
								);
				}
			}

			usort($goodfiles, 'cmp');
			if($this->sort_order == 'desc')
			{
				$goodfiles = array_reverse($goodfiles);
			}

			if(isset(Yii::app()->cache))
			{
				Yii::app()->cache->set('EGallery_'.$this->path.'_albums', json_encode($goodfiles));
			}

			return $goodfiles;
		endif;
	}

	/**
	 * Takes a directory name and tries to get it's title from "description.txt".
	 *
	 * @param string the name of the directory
	 * @return string the title
	 */
	protected function getTitle($name)
	{
		$_cache=(isset(Yii::app()->cache))?Yii::app()->cache->get('EGallery_'.$this->path.'_'.$name.'_title'):false;
		if($_cache!==false):
			return $_cache;
		else:
			$_realpath = $this->_realpath.DIRECTORY_SEPARATOR.$name.DIRECTORY_SEPARATOR;
			$file = $_realpath.'description.txt';
			if(file_exists($file))
			{
				$name = $this->readDescription($_realpath.'description.txt', true);
			}
			elseif($this->displayFoldersAsDates)
			{
				if(strtotime($name)!==false || strtotime($name)!==-1)
				{
					$name = date($this->dateFormat, strtotime($name));
				}
			}

			if(isset(Yii::app()->cache))
			{
				Yii::app()->cache->set('EGallery_'.$this->path.'_'.$name.'_title', $name);
			}

			return $name;
		endif;
	}

	protected function getImages($path, $single = false)
	{
		$_images = array();
		if(strstr($path, '../'))
		{
			Yii::log('Possible hacking attempt occured when trying to getImages(). Path requested: '.$path, 'info', 'app.extensions.EGallery');
			return $_images;
		}
		$path = preg_replace('~[^a-z0-9-_ ()\./]~i', '', $path);

		$_cache=(isset(Yii::app()->cache))?Yii::app()->cache->get('EGallery_'.$this->path.'_'.$path.'_'.$single.'_images'):false;
		if($_cache!==false && json_decode($_cache, true)!==null):
			return json_decode($_cache, true);
		else:
			$_needsThumbs = array();
			$_realpath = $this->_realpath.DIRECTORY_SEPARATOR.$path;

			if (!file_exists($_realpath))
			{
				Yii::log('Invalid path specified for getImages(): '.$path, 'info', 'app.extensions.EGallery');
				return $_images;
			}

			$images = new DirectoryIterator($_realpath);
			if(Yii::app()->getUrlManager()->getUrlFormat() == 'path' && !strstr($this->path,str_ireplace('index.php','',$_SERVER['PHP_SELF'])))
			{
				$this->path = str_ireplace('index.php','',$_SERVER['PHP_SELF']).$this->path;
			}
			foreach ($images as $image) {
				if ($image->isFile() && $image->isReadable() && preg_match("/\.(jpe?g|gif|png)$/i",$image->getFilename())) {
					$mime = getimagesize($image->getPathname());
					$mime = $mime['mime'];

					if(in_array($mime,$this->mimeTypes))
					{
						if(file_exists($_realpath.DIRECTORY_SEPARATOR.'thumbs'.DIRECTORY_SEPARATOR.$image->getFilename())){
							$thumb = $this->path.'/'.$path.'/'.'thumbs'.'/'.$image->getFilename();
						}
						else
						{
							$thumb = $this->_blankImage;
							$_needsThumbs[] = array('folder'=>$_realpath.DIRECTORY_SEPARATOR.'thumbs','image'=>$image->getFilename());
						}

						$pathinfo = pathinfo($image->getPathname());
						$_images[] = array(
							'url' => $this->path.'/'.$path.'/'.$image->getFilename(),
							'thumb' => $thumb,
							'alt' => $pathinfo['filename'],
						);

						if($single)
						{
							break;
						}
					}
				}
			}

			if(!empty($_needsThumbs))
			{
				$this->generateThumbnails($_needsThumbs);
			}
			elseif(isset(Yii::app()->cache))
			{
				Yii::app()->cache->set('EGallery_'.$this->path.'_'.$path.'_'.$single.'_images', json_encode($_images));
			}

			return $_images;
		endif;
	}

	/**
	 * Writes the array to a text file in /path/to/gallery/needsThumbs.txt for batch processing.
	 * Runs the thumbnail generator script in the background.
	 *
	 * @param array $_needsThumbs the array of images needing thumbnails
	 */
	private function generateThumbnails($_needsThumbs)
	{
		file_put_contents($this->_realpath.DIRECTORY_SEPARATOR.'needsThumbs.txt',serialize($_needsThumbs));

		$Command = realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR.'EGalleryProcessQueue.php '.$this->_realpath.' '.$this->thumbnailWidth.' '.$this->thumbnailHeight;

		if(PHP_SHLIB_SUFFIX == 'so')// *nix (aka NOT windows)
		{

			$phpPaths = array('php','/usr/local/bin/php','/usr/local/php5/bin/php','/usr/bin/php','/usr/bin/php5');
			foreach($phpPaths as $path)
			{
				exec("echo '<?php echo version_compare(PHP_VERSION, \"5.0.0\", \">=\"); ?>' | $path",$result);
				if($result)
				{
					shell_exec("nohup $path $Command 2> /dev/null > /dev/null &");
					break;
				}
			}
		}
		else // Windows
		{
			$WshShell = new COM("WScript.Shell");
			$WshShell->Run("php.exe $Command", 0, false);
		}
	}

	/**
	 * Gets the number of images in the specified directory that match {@see $mimeTypes}
	 * and pass the regular expression (default allows .gif .jpg .jpeg .png).
	 *
	 * @param string $path to the directory
	 * @return integer the number of images in the directory
	 */
	protected function getImageCount($path)
	{
		$_numImages = false;
		if(strstr($path, '../'))
		{
			Yii::log('Possible hacking attempt occured when trying to getImages(). Path requested: '.$path, 'info', 'app.extensions.EGallery');
			return $_numImages;
		}
		$path = preg_replace('~[^a-z0-9-_ ()\./]~i', '', $path);

		$_cache=(isset(Yii::app()->cache))?Yii::app()->cache->get('EGallery_'.$this->path.'_'.$path.'_numImages'):false;
		if($_cache!==false):
			return $_cache;
		else:
			$_realpath = $this->_realpath.DIRECTORY_SEPARATOR.$path;

			if (!file_exists($_realpath))
			{
				Yii::log('Invalid path specified for getImages(): '.$path, 'info', 'app.extensions.EGallery');
				return $_numImages;
			}

			$_numImages = 0;
			$images = new DirectoryIterator($_realpath);
			if(Yii::app()->getUrlManager()->getUrlFormat() == 'path' && !strstr($this->path,str_ireplace('index.php','',$_SERVER['PHP_SELF'])))
			{
				$this->path = str_ireplace('index.php','',$_SERVER['PHP_SELF']).$this->path;
			}
			foreach ($images as $image) {
				if ($image->isFile() && $image->isReadable() && preg_match("/\.(jpe?g|gif|png)$/i",$image->getFilename())) {
					$mime = getimagesize($image->getPathname());
					$mime = $mime['mime'];

					if(in_array($mime,$this->mimeTypes))
					{
						$_numImages++;
					}
				}
			}

			if(isset(Yii::app()->cache))
			{
				Yii::app()->cache->set('EGallery_'.$this->path.'_'.$path.'_numImages', $_numImages);
			}
			
			return $_numImages;
		endif;
	}

	/**
	 * Splits the image array based on the current page.
	 *
	 * @param array $_images the original images
	 * @param integer $_pageSize the number of images per page
	 * @return array the split images
	 */
	protected function splitImages(array $_images, $_pageSize)
	{
		if(count($_images) > $_pageSize)
		{
			$page = isset($_GET['page']) ? (int)$_GET['page']:1;

			$offset = $_pageSize * ($page - 1);
			$_images = array_slice($_images, $offset, $_pageSize);
		}

		return $_images;
	}

	/**
	 * Gets the album title and description from "description.txt". Title defaults
	 * to the album name.
	 *
	 * @param string $path the album requested
	 * @return array the details
	 */
	protected function getDetails($path)
	{
		$_details = array();
		if(strstr($path, '../'))
		{
			Yii::log('Possible hacking attempt occured when trying to getDetails(). Path requested: '.$path, 'info', 'app.extensions.EGallery');
			return $_details;
		}

		$_cache=(isset(Yii::app()->cache))?Yii::app()->cache->get('EGallery_'.$this->path.'_'.$path.'_details'):false;
		if($_cache!==false && json_decode($_cache, true)!==null):
			return json_decode($_cache, true);
		else:
			$_realpath = $this->_realpath.DIRECTORY_SEPARATOR.$path;

			if (!file_exists($_realpath))
			{
				return $_details;
			}

			$file = $_realpath.DIRECTORY_SEPARATOR.'description.txt';
			if(!file_exists($file))
			{
				$_details['name'] = $path;
				$_details['description'] = '';

				return $_details;
			}

			$_details['name'] = $this->readDescription($file, true);
			$_details['description'] = $this->readDescription($file);

			if(isset(Yii::app()->cache))
			{
				Yii::app()->cache->set('EGallery_'.$this->path.'_'.$path.'_details', json_encode($_details));
			}

			return $_details;
		endif;
	}

	/**
	 * Reads the specified file and returns either the {@link http://uk.php.net/htmlentities htmlentities} of title
	 * or the {@link http://daringfireball.net/projects/markdown/ markdown} parsed description.
	 *
	 * @param string $file the path to the file
	 * @param boolean $title whether to just get the title
	 * @return string the text
	 *
	 */
	protected function readDescription($file, $title=false)
	{
		$_cache=(isset(Yii::app()->cache))?Yii::app()->cache->get('EGallery_'.$file.'_'.$title.'_description'):false;
		if($_cache!==false):
			return $_cache;
		else:
			$i = 1;
			$fp = fopen($file, 'r');

			while (!feof($fp))
			{
				$buffer = fgets($fp, 10240);
				if($i == 1)
				{
					if($title)
					{
						return htmlentities($buffer, ENT_QUOTES);
					}
					$buffer = '';
				}
				$i++;
			}

			$parser=new CMarkdownParser;
			$buffer=$parser->safeTransform($buffer);

			if(isset(Yii::app()->cache))
			{
				Yii::app()->cache->set('EGallery_'.$file.'_'.$title.'_description', $buffer);
			}

			return $buffer;
		endif;
	}

	/**
	 * @return string the dynamic CSS needed for {@link EGallery}
	 */
	protected function generateCSS($folder)
	{
		$contents = '/*
 * This file is automatically generated. You should edit gallery.css.php instead.
 */

';

		if (is_file($folder.DIRECTORY_SEPARATOR.'gallery.css.php')) {
			ob_start();
			include $folder.DIRECTORY_SEPARATOR.'gallery.css.php';
			$contents .= ob_get_contents();
			ob_end_clean();
		}

		if($contents != file_get_contents($folder.DIRECTORY_SEPARATOR.'gallery.css') && is_writable($folder.DIRECTORY_SEPARATOR.'gallery.css'))
		{
			file_put_contents($folder.DIRECTORY_SEPARATOR.'gallery.css', $contents);
		}

		return $folder.DIRECTORY_SEPARATOR.'gallery.css';
	}
}
?>