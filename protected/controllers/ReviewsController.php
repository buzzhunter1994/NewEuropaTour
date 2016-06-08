<?php
class ReviewsController extends Controller
{
	public $layout='//layouts/main';
	public function actionView()
	{
		$this->render('view');
	}
	public function actionIndex()
	{

        $model=new ReviewsForm;
        if(isset($_POST['ReviewsForm']))
        {
            $model->attributes=$_POST['ReviewsForm'];
            if($model->validate())
            {
                Yii::app()->user->setFlash('reviews','Спасибо за сообщение.');
                $this->refresh();
            }
        }
        $this->render('index',array('model'=>$model));
	}
}