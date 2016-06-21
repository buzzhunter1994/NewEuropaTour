<?php
class Bootstrap extends CApplicationComponent
{
	const PLUGIN_AFFIX = 'affix';
	const PLUGIN_ALERT = 'alert';
    const PLUGIN_BUTTON = 'button';
    const PLUGIN_CAROUSEL = 'carousel';
    const PLUGIN_COLLAPSE = 'collapse';
    const PLUGIN_DROPDOWN = 'dropdown';
    const PLUGIN_MODAL = 'modal';
    const PLUGIN_POPOVER = 'popover';
    const PLUGIN_SCROLLSPY = 'scrollspy';
    const PLUGIN_TAB = 'tab';
    const PLUGIN_TOOLTIP = 'tooltip';
    const PLUGIN_TRANSITION = 'transition';
    const PLUGIN_TYPEAHEAD = 'typeahead';

	public $plugins = array();
	public $forceCopyAssets = false;
	protected $_assetsUrl;

	public function registerCoreCss()
	{
		$filename = YII_DEBUG ? 'bootstrap.css' : 'bootstrap.min.css';
		Yii::app()->clientScript->registerCssFile($this->getAssetsUrl().'/css/'.$filename);
	}
	public function registerResponsiveCss()
	{
		$cs = Yii::app()->getClientScript();
		$cs->registerMetaTag('width=device-width, initial-scale=1.0', 'viewport');
	/*	$filename = YII_DEBUG ? 'bootstrap-responsive.css' : 'bootstrap-responsive.min.css';
		$cs->registerCssFile($this->getAssetsUrl().'/css/'.$filename);*/
	}

	public function registerYiiCss()
	{
		Yii::app()->clientScript->registerCssFile($this->getAssetsUrl().'/css/yii.css');
	}

	public function registerAllCss()
	{
		$this->registerCoreCss();
		$this->registerResponsiveCss();
		$this->registerYiiCss();
	}

	public function registerCoreScripts()
	{
		$this->registerJS(Yii::app()->clientScript->coreScriptPosition);
		$this->registerPopover();
	}
    
	protected function registerJS($position = CClientScript::POS_HEAD)
	{
		$cs = Yii::app()->getClientScript();
		$cs->registerCoreScript('jquery');
		$filename = YII_DEBUG ? 'bootstrap.js' : 'bootstrap.min.js';
		$cs->registerScriptFile($this->getAssetsUrl().'/js/'.$filename, $position);
	}

	public function register()
	{
		$this->registerAllCss();
		$this->registerCoreScripts();
	}
	public function registerAffix($selector = null, $options = array())
	{
		$this->registerPlugin(self::PLUGIN_AFFIX, $selector, $options);
	}
	public function registerAlert($selector = null, $options = array())
	{
		$this->registerPlugin(self::PLUGIN_ALERT, $selector, $options);
	}
	public function registerButton($selector = null, $options = array())
	{
		$this->registerPlugin(self::PLUGIN_BUTTON, $selector, $options);
	}
	public function registerCarousel($selector = null, $options = array())
	{
		$this->registerPlugin(self::PLUGIN_CAROUSEL, $selector, $options);
	}
	public function registerCollapse($selector = null, $options = array())
	{
		$this->registerPlugin(self::PLUGIN_COLLAPSE, $selector, $options);
	}
	public function registerDropdown($selector = null, $options = array())
	{
		$this->registerPlugin(self::PLUGIN_DROPDOWN, $selector, $options);
	}
	public function registerModal($selector = null, $options = array())
	{
		$this->registerPlugin(self::PLUGIN_MODAL, $selector, $options);
	}
	public function registerScrollSpy($selector = null, $options = array())
	{
		$this->registerPlugin(self::PLUGIN_SCROLLSPY, $selector, $options);
	}
	public function registerPopover($selector = null, $options = array())
	{
		$this->registerTooltip();
        $this->registerPlugin(self::PLUGIN_POPOVER, '[data-toggle="popover"]', $options);
	}
	public function registerTabs($selector = null, $options = array())
	{
		$this->registerPlugin(self::PLUGIN_TAB, $selector, $options);
	}
	public function registerTooltip($selector = null, $options = array())
	{
		$this->registerPlugin(self::PLUGIN_TOOLTIP, '[data-toggle="tooltip"]', $options);
	}
	public function registerTypeahead($selector = null, $options = array())
	{
		$this->registerPlugin(self::PLUGIN_TYPEAHEAD, $selector, $options);
	}
	protected function registerPlugin($name, $selector = null, $options = array())
	{
		$config = isset($this->plugins[$name]) ? $this->plugins[$name] : array();

		if ($selector === null && isset($config['selector']))
			$selector = $config['selector'];

		if (isset($config['options']))
			$options = !empty($options) ? CMap::mergeArray($options, $config['options']) : $config['options'];

		if ($selector !== null)
		{
			$key = __CLASS__.'.'.md5($name.$selector.serialize($options));
			$options = !empty($options) ? CJavaScript::encode($options) : '';
			Yii::app()->clientScript->registerScript($key, "jQuery('{$selector}').{$name}({$options});");
		}
	}
	protected function getAssetsUrl()
	{
		if (isset($this->_assetsUrl))
			return $this->_assetsUrl;
		else
		{
			$assetsPath = Yii::getPathOfAlias('bootstrap.assets');
			$assetsUrl = Yii::app()->assetManager->publish($assetsPath, true, -1, $this->forceCopyAssets);
			return $this->_assetsUrl = $assetsUrl;
		}
	}
    public function getVersion()
    {
        return '2.0.3';
    }
}