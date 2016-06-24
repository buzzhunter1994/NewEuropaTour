<?php
class BlogController extends Controller
{
	public $layout='//layouts/main';
	public function actionView($url)
	{
	    $model = Posts::model()->find(array('condition'=>'url=:p','params'=>array(':p'=>$url)));
        if ($model===null)
            throw new CHttpException(404,'Статья отсутствует.');
		$this->render('view',array(
			'model'=> $model
		));
	}
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Posts', array(
	            'criteria'=>array(
	                'condition'=>'is_news=1',
	                'order'=>'id DESC',
	            ),
	            'pagination'=>array(
	                'pageSize'=>3,
	            ),
	        ));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
}