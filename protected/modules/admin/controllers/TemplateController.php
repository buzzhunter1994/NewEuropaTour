<?php

class TemplateController extends Controller
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
				'actions'=>array('index','rewrite'),
				'users'=>array('@'),
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
        $fn = $_SERVER['DOCUMENT_ROOT'].'/protected/views/layouts/main.php';
        Yii::app()->clientScript->registerScriptFile('/js/src-min-noconflict/ace.js', CClientScript::POS_HEAD);
        Yii::app()->clientScript->registerScriptFile('/js/jquery-1.11.0.min.js', CClientScript::POS_HEAD);
		$this->render('index',array('file_main'=>file_get_contents($fn)));
	}
    public function actionRewrite()
	{
	   header('content-type:text/plain');
        $fn = $_SERVER['DOCUMENT_ROOT'].'/protected/views/layouts/main.php';
        if (isset($_POST['content']))
        {
            $content = $_POST['content'];
            $fp = fopen($fn,"w") or die ("Ошибка!");
            fputs($fp,$content);
            if (fclose($fp)){
                echo'Сохранено!';
            }
        }
	}
}