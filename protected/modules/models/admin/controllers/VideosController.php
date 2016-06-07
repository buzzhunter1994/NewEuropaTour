<?php

class VideosController extends Controller
{
	public $layout='/layouts/column2';
	public function filters()
	{
		return array(
			'accessControl',
			'postOnly + delete',
		);
	}
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('create','update','delete','index'),
				'users'=>array('@'),
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}
	public function actionCreate()
	{
		$model=new Videos;
		if(isset($_POST['Videos']))
		{
			$model->attributes=$_POST['Videos'];
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
		if(isset($_POST['Videos']))
		{
			$model->attributes=$_POST['Videos'];
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
		$model=new Videos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Videos']))
			$model->attributes=$_GET['Videos'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
	public function loadModel($id)
	{
		$model=Videos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'Невозможно найти модель.');
		return $model;
	}
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='videos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
