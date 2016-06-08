<?php

class SiteController extends Controller
{
    public function actions()
    {
        return array(
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }
	public function actionIndex()
	{
		$this->render('/site/index',array());
	}
    public function actionSearch($q)
    {
        $this->render('/site/search',array('q'=> $q));
    }
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],'Форма обратной связи',$model->body,$headers);
				Yii::app()->user->setFlash('contact','Спасибо за сообщение.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}
}