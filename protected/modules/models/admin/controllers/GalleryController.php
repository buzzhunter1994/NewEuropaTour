<?php

class GalleryController extends Controller
{
    public function filters()
	{
		return array(
			'accessControl',
            'postOnly + deletePhoto',
            'postOnly + deleteAlbum',
            'postOnly + rename',
		);
	}
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('index','viewAlbum','rename','upload','deletePhoto','deleteAlbum','addAlbum'),
				'users'=>array('@'),
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
	   Yii::app()->clientScript->registerScript('jquery', CClientScript::POS_HEAD);
        $dir = Yii::app()->params['webRoot']."/images/gallery/";
        $scan_dir = scandir($dir);
        $files = array();
        $albums = array();
        foreach($scan_dir as $album){
            if (is_dir($dir.DIRECTORY_SEPARATOR.$album))
                if(($album!='.')&&($album!='..'))
                    {
                        $thumbs = scandir($dir.$album.DIRECTORY_SEPARATOR);
                        foreach($thumbs as $item){
                            $oneFile = $dir.$album.DIRECTORY_SEPARATOR.$item;
                            if(is_file($oneFile))
                                if(strtolower(end(explode('.',$oneFile)))=='jpg'){
                                    $thumb = $item;
                                    break;
                                }
                        }
                        is_file($dir.$album.DIRECTORY_SEPARATOR.$thumb)==1?$thumb = '/images/gallery/'.$album.'/thumbs/'.$thumb:$thumb='/images/folder.png';
                        $albums[$album] = 
                        array(
                            'title' => file_get_contents($dir.$album.'/description.txt'),
                            'thumb'=> $thumb
                        );
                    }
        }

        $this->render('index',array('files'=>$albums ));
	}
    function removeBOM($str="") {
        if(substr($str, 0, 3) == pack('CCC', 0xef, 0xbb, 0xbf)) {
            $str = substr($str, 3);
        }
        return $str;
    }
    public function actionViewAlbum($id)
    {
        Yii::app()->clientScript->registerCssFile('/css/jquery.fancybox.css');
        Yii::app()->clientScript->registerScriptFile('/js/jquery.fancybox.js', CClientScript::POS_HEAD);
        $dir = Yii::app()->params['webRoot']."/images/gallery/";
        $images = array();
        $scan_dir = scandir($dir.$id);
        foreach($scan_dir as $file){
            $oneFile = $dir.$id.DIRECTORY_SEPARATOR.$file;
            if(is_file($oneFile))
                if(strtolower(end(explode('.',$oneFile)))=='jpg')
                    array_push($images,DIRECTORY_SEPARATOR.$id.DIRECTORY_SEPARATOR.$file);
        }
        $this->render('view',
            array(
                'images'=>$images,
                'id'=>$id,
                'title' => $this->removeBOM( file_get_contents($dir.$id.'/description.txt') ),
            ));
    }
    
    public function actionUpload($id)
    {
            Yii::import("ext.EAjaxUpload.qqFileUploader");
     
            $folder=Yii::app()->params['webRoot'].'/images/gallery/'.$id.'/';
            $allowedExtensions = array("jpg");
            $sizeLimit = 10 * 1024 * 1024;
            $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
            $result = $uploader->handleUpload($folder);
            $fileName=$result['filename'];
            $result['img'] = "$id/".$fileName;
            $result['thumb'] = "$id/thumbs/".$fileName;
            $result['converted'] = $this->convert($result['img'],$result['thumb']);
            $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
            echo $return;
    }
    
    public function actionAddAlbum()
    {
  		$model=new AddAlbumForm;
        $dir = Yii::app()->params['webRoot']."/images/gallery/";        
        $dir = strtr($dir,array("/protected/config/../.."=>""));
		if(isset($_POST['AddAlbumForm']))
		{
			$model->attributes=$_POST['AddAlbumForm'];
			if($model->validate())
			{
                $dirname = $dir.md5(microtime() . rand(0, 9999));
				if (@mkdir($dirname, 0755, true))
				{
				    @mkdir($dirname.'/thumbs/', 0755, true);
				    $handle = fopen($dirname.'/description.txt','w+');
                    fwrite($handle,$this->removeBOM($model->name));
                    if(fclose($handle)){
                        Yii::app()->user->setFlash('flash','Альбом успешно создан!');
				        $this->redirect(array('index'));
                    }
				}			
			}
		}
		$this->render('addalbum',array('model'=>$model));
    }


    public function actionRename()
    {
        $dir = Yii::app()->params['webRoot']."/images/gallery/";        
        $dir = strtr($dir,array("/protected/config/../.."=>""));

        echo 'Старое название альбома: \''.$this->removeBOM(file_get_contents($dir.$_POST['id'].'/description.txt'))."';";
        echo "\r\nновое: '".$this->removeBOM($_POST['newname'])."'";
        $handle = fopen($dir.$_POST['id'].'/description.txt','w+');
        fwrite($handle,$this->removeBOM($_POST['newname']));
        fclose($handle);
    }  
          
    public function actionDeletePhoto()
    {
        $dir = Yii::app()->params['webRoot']."/images/gallery/";
        $dir = strtr($dir,array("/protected/config/../.."=>""));
        if (unlink($dir.$_POST['img'])){
            echo Yii::app()->baseUrl.$_POST['img']." (deleted)\r\n";
            if (unlink($dir.$_POST['thumb']))
                echo Yii::app()->baseUrl.$_POST['thumb']." (deleted)\r\n";
            else 
                echo Yii::app()->baseUrl.$_POST['thumb']." (error deleting)\r\n";
        } else echo Yii::app()->baseUrl.$_POST['img']." (error deleting)\r\n"; 

    }
    public function actionDeleteAlbum()
    {
        $a = array();
        $dir = $_SERVER['DOCUMENT_ROOT']."/images/gallery/";
        $dir .= $_POST['name'];
        exec('rm -Rf '.$dir,$a,$return);
        if (!$return) echo true; else echo "'".$_POST['name']."' (error deleting)\r\n"; 
    }
    
    public function convert($filename,$thumb)
    {
        $a = array();
        exec("convert images/gallery/$filename -resize 450x298^ -gravity center -extent 450x298 -strip -quality 85 images/gallery/$thumb",$a,$return);
        return $return == 0?"\r\nConverted - Orig:($filename) Thumb:($thumb)":"Error";
    }
}