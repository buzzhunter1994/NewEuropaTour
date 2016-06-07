<?php

class LeftMenuController extends Controller
{
	public $layout='/layouts/column2';
	public function filters()
	{
		return array(
			'accessControl',
			'postOnly + delete, toggle',
		);
	}
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('create','update','delete','index','toggle'),
				'users'=>array('@'),
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}
	public function actionCreate()
	{
		$model=new LeftMenu;
		if(isset($_POST['LeftMenu']))
		{
			$model->attributes=$_POST['LeftMenu'];
			if($model->save())
				$this->redirect(array('index'));
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		if(isset($_POST['LeftMenu']))
		{
			$model->attributes=$_POST['LeftMenu'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
	public function actionIndex()
	{
		$model=new LeftMenu('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LeftMenu']))
			$model->attributes=$_GET['LeftMenu'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
    public function actionToggle($id, $attribute)
    {   
        if (!in_array($attribute, array('blank')))
            throw new CHttpException(400, 'Некорректный запрос');
 
        $model = $this->loadModel($id);
        $model->$attribute = $model->$attribute ? 0 : 1;
        $model->save();
 
        if (!Yii::app()->request->isAjaxRequest)
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
	public function loadModel($id)
	{
		$model=LeftMenu::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'Невозможно найти модель.');
		return $model;
	}
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='left-menu-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
