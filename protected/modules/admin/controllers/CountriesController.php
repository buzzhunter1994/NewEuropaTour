<?php

class CountriesController extends Controller
{
	public function filters()
	{
		return array(
			'accessControl',
			'postOnly + delete, toggle',
		);
	}
    public function actionUpdater()
    {
        $es = new EditableSaver('Countries');
        $es->update();
    }
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('create','update','delete','index','toggle','updater'),
				'users'=>array('@'),
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}
	public function actionCreate()
	{
		$model=new Countries;
		if(isset($_POST['Countries']))
		{
			$model->attributes=$_POST['Countries'];
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
		if(isset($_POST['Countries']))
		{
			$model->attributes=$_POST['Countries'];
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
		$model=new Countries('search');
		$model->unsetAttributes();
		if(isset($_GET['Countries']))
			$model->attributes=$_GET['Countries'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
    public function actionToggle($id, $attribute)
    {   
        if (!in_array($attribute, array('top')))
            throw new CHttpException(400, 'Некорректный запрос');
 
        $model = $this->loadModel($id);
        $model->$attribute = $model->$attribute ? 0 : 1;
        $model->save();
 
        if (!Yii::app()->request->isAjaxRequest)
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
	public function loadModel($id)
	{
		$model=Countries::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'Невозможно найти модель.');
		return $model;
	}
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='posts-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
