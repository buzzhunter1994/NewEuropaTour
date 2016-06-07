<?php

class AttachmentsController extends Controller
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
				'actions'=>array('create','update','delete','index','upload','createthumbs'),
				'users'=>array('@'),
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}
    public function actionUpload($id)
    {
            Yii::import("ext.EAjaxUpload.qqFileUploader");
     
            $folder=Yii::app()->params['webRoot'].'/images/upload/';
            $allowedExtensions = array("jpg");
            $sizeLimit = 10 * 1024 * 1024;
            $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
            $result = $uploader->handleUpload($folder);
            $fileName=$result['filename'];

            if($this->convert($fileName)){
                $model = new Attachments;
    			$model->name = $fileName;
                $model->post_id = $id;
                if($model->save())
                    {
                        $result['id']=$model->id;
                        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
                        echo $return;
                    }
            } else {
                unlink($folder.$fileName);
            }
    }
    
    public function convert($filename)
    {
        $a = array();
        exec("convert images/upload/$filename -resize 128x95^ -gravity center -extent 128x95 -strip -quality 85 images/upload/thumbs/$filename",$a,$return);
        return $return == 0?true:false;
    }
    
   	public function actionCreateThumbs()
	{
        $model= Attachments::model()->findAll();
        $arr = array();
        foreach($model as $t)
        {
            $arr[$t->id] = $t->attributes;
        }
        foreach ($arr as $key=>$post)
        {
            $this->convert($post['name']);
        }
	}
    
	public function actionCreate()
	{
		$model=new Attachments;
		if(isset($_POST['Attachments']))
		{
			$model->attributes=$_POST['Attachments'];
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
		if(isset($_POST['Attachments']))
		{
			$model->attributes=$_POST['Attachments'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
    
	public function actionDelete($id)
	{
        $folder=Yii::app()->params['webRoot'].'/images/upload/';
        $model = $this->loadModel($id);
        if (unlink($folder.$model->name))
            if (unlink($folder.'thumbs/'.$model->name)){    
                $model->delete();
                echo $id;                
            }
	}
    
	public function actionIndex()
	{
		$model=new Attachments('search');
		$model->unsetAttributes();
		if(isset($_GET['Attachments']))
			$model->attributes=$_GET['Attachments'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
    
	public function loadModel($id)
	{
		$model=Attachments::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'Невозможно найти модель.');
		return $model;
	}
    
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='attachments-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}