<?php

class AdministrationController extends Controller
{
    public function filters()
	{
		return array(
			'accessControl',
		);
	}
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('index'),
				'users'=>array('@'),
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}
	public function actionIndex()
	{
        $model=Posts::model()->findByPk(61);
        $model->scenario='upd';
        if(isset($_POST['Posts']))
        {
        	$model->attributes=$_POST['Posts'];
        	if($model->save()){
				Yii::app()->user->setFlash('contact','Сохранено.');
				$this->refresh();
            }
        }
        $this->render('view',array('model'=>$model));
	}
}