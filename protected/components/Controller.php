<?php
class Controller extends CController
{
	public $layout = '//layouts/main';
   	public $menu = array();
	public $breadcrumbs = array();
    public function __construct($id,$module=null){
        parent::__construct($id,$module);
        // If there is a post-request, redirect the application to the provided url of the selected language
      /*  if(isset($_POST['language'])) {
            $lang = $_POST['language'];
            $MultilangReturnUrl = $_POST[$lang];
            $this->redirect($MultilangReturnUrl);
        }*/
        // Set the application language if provided by GET, session or cookie
        if(isset($_GET['language'])) {
            Yii::app()->language = $_GET['language'];
            Yii::app()->user->setState('language', $_GET['language']);
            $cookie = new CHttpCookie('language', $_GET['language']);
            $cookie->expire = time() + (60*60*24*365); // (1 year)
            Yii::app()->request->cookies['language'] = $cookie;
            $this->redirect(Yii::app()->request->urlReferrer);
        }
        else if (Yii::app()->user->hasState('language'))
            Yii::app()->language = Yii::app()->user->getState('language');
        else if(isset(Yii::app()->request->cookies['language']))
            Yii::app()->language = Yii::app()->request->cookies['language']->value;
    }
    public function createMultilanguageReturnUrl($lang='ru'){
        if (count($_GET)>0){
            $arr = $_GET;
            $arr['language']= $lang;
        }
        else
            $arr = array('language'=>$lang);
        return $this->createUrl('', $arr);
    }
    public function storage_value($key){
        $model = Storage::model()->find('`key`=:url', array('url' => $key));
        if ($model===null)
            return '';
        else
            return $model->value;
    }
}