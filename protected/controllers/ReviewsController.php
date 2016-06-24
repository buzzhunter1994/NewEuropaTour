<?php
class ReviewsController extends Controller
{
    public function actions(){
        return array(
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'height' => 50,
                'width' => 130,
                'backColor'=>0xFFFFFF,
                'maxLength' => 4,
                'minLength' => 4,
                'foreColor'=>0x333333,
                'offset' => 10,
                'transparent'=>true,
                'testLimit' => 5,
            ),
        );
    }
    public function actionIndex()
    {
        $dataProvider=new CActiveDataProvider('Reviews', array(
                'criteria'=>array(
                    'condition'=>'`check` = 1',
                    'order'=>'id DESC',
                ),
                'countCriteria'=>array(
                    'condition'=>'`check` = 1',
                ),
                'pagination'=>array(
                    'pageSize'=>10,
                )
            )
        );
        $model=new ReviewsForm;
        if(isset($_POST['ReviewsForm']))
        {
            $model->attributes=$_POST['ReviewsForm'];
            if($model->validate())
            {
                $m_review = new Reviews;
                $m_review->name = $model->name;
                $m_review->email = $model->email;
                $m_review->city = $model->city;
                $m_review->message = $model->message;
                $m_review->date = date('Y-m-d H:i:s');
                $m_review->check = 0;

                if($m_review->save())
                {
                    Yii::app()->user->setFlash('reviews',Yii::t('yii', 'Your message was successfully sent.'));
                    $this->refresh();
                }
            }
        }
        $this->render('index',array(
            'model'=>$model,
            'dataProvider'=>$dataProvider,
        ));
    }
}