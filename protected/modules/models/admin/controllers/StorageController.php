<?php

class StorageController extends Controller
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
		$model=new Storage;
		if(isset($_POST['Storage']))
		{
			$model->attributes=$_POST['Storage'];
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
		if(isset($_POST['Storage']))
		{
			$model->attributes=$_POST['Storage'];
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
  		$model=new Storage('search');
		$model->unsetAttributes();
		if(isset($_GET['Storage']))
			$model->attributes=$_GET['Storage'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
	public function loadModel($id)
	{
		$model=Storage::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'Невозможно найти модель.');
		return $model;
	}
}