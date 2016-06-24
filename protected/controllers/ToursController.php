<?php
class ToursController extends Controller
{
	public $layout='//layouts/main';
    public function actionIndex()
    {
        $countries = Countries::model()->findAll();
        $tourThemes = TourThemes::model()->findAll();
        $this->render('index', array('countries' => $countries, 'tourThemes' => $tourThemes));
    }
    public function actionView($id)
    {
        $tour=Tours::model()->findByPk($id);
        $this->render('view', array('tour'=>$tour));
    }
    public function actionBus($id)
    {
        $trip = Trips::model()->findByPk($id);
        $this->renderPartial('bus', array('trip'=>$trip));
    }
    public function actionOrder($id)
    {
        $trip = Trips::model()->findByPk($id);
        $this->render('order', array('trip'=>$trip, 'tour'=>$trip->tour));
    }
    public function actionConfirm()
    {
        $form = Yii::app()->request->getPost('OrderForm');
        //if (!isset($form['tour_id'])) $this->redirect('/');
        $trip = Trips::model()->findByPk($form['tour_id']);
        if($form['action']=='confirm')
        {
            $order = new Orders;
            $order->attributes=$form;
            if($order->validate() && $order->save())
            {
                Yii::app()->user->setFlash('order',Yii::t('yii', 'Your order was successfully sent.'));
                $this->redirect('/');
            }
        }
        $this->render('confirm', array('form'=>$form, 'trip'=>$trip));
    }
    public function actionCountries()
    {
        $countries=Countries::model()->findAll();
        $this->render('countries_index', array('countries'=> $countries));
    }
    public function actionCountry($country){
        $criteria = new CDbCriteria();
        $criteria->compare('short_name', $country);
        $country_model = Countries::model()->find($criteria);
        $tours=new CActiveDataProvider('Tours', array(
            'criteria'=>array(
                'condition' => 'country_id=:country_id',
                'params' => array(':country_id'=> $country_model->id),
                'order'=>'id DESC',
            ),
            'pagination'=>array(
                'pageSize'=>5,
            ),
        ));
        $this->render('countries_view', array('country'=>$country_model, 'tours'=>$tours));
    }
	public function actionTheme($tematic)
	{
		$themeModel = TourThemes::model()->find(array(
			'condition' => 'theme=:theme',
			'params' => array(':theme'=>$tematic)
		));
		$tours = Tours::model()->findAll(array(
			'condition' => 'theme_id=:theme_id',
			'params' => array(':theme_id' => $themeModel->id)
		));
		$this->render('theme', array('theme' => $themeModel,'tours'=>$tours));
	}
	public function actionThemeCountry($tematic, $country)
	{
		$themeModel = TourThemes::model()->find(array(
			'condition' => 'theme=:theme',
			'params' => array(':theme'=>$tematic)
		));
		$countryModel = Countries::model()->find(array(
			'condition' => 'short_name=:country',
			'params' => array(':country'=>$country)
		));
		$tours=new CActiveDataProvider('Tours', array(
			'criteria'=>array(
				'condition' => 'theme_id=:theme_id AND country_id=:country_id',
				'params' => array(':theme_id' => $themeModel->id, ':country_id'=> $countryModel->id),
				'order'=>'id DESC',
			),
			'pagination'=>array(
				'pageSize'=>5,
			),
		));
		$this->render('search', array('tours'=>$tours));
	}
	public function actionThemeTransportCountry($tematic, $transport, $country)
	{
		$themeModel = TourThemes::model()->find(array(
			'condition' => 'theme=:theme',
			'params' => array(':theme'=>$tematic)
		));
		$countryModel = Countries::model()->find(array(
			'condition' => 'short_name=:country',
			'params' => array(':country'=>$country)
		));
		$tours=new CActiveDataProvider('Tours', array(
			'criteria'=>array(
				'condition' => 'theme_id=:theme_id AND country_id=:country_id AND `type`=:transport',
				'params' => array(':theme_id' => $themeModel->id, ':country_id'=> $countryModel->id, ':transport'=>$transport),
				'order'=>'id DESC',
			),
			'pagination'=>array(
				'pageSize'=>5,
			),
		));
		$this->render('search', array('tours'=>$tours));
	}
    public function actionThemeTransport($tematic, $transport)
    {
        $themeModel = TourThemes::model()->find(array(
            'condition' => 'theme=:theme',
            'params' => array(':theme'=>$tematic)
        ));
        $tours=new CActiveDataProvider('Tours', array(
            'criteria'=>array(
                'condition' => 'theme_id=:theme_id AND `type`=:transport',
                'params' => array(':theme_id' => $themeModel->id, ':transport'=>$transport),
                'order'=>'id DESC',
            ),
            'pagination'=>array(
                'pageSize'=>5,
            ),
        ));
        $this->render('search', array('tours'=>$tours));
    }
    public function actionTransport($transport)
    {
        $tours=new CActiveDataProvider('Tours', array(
            'criteria'=>array(
                'condition' => '`type`=:transport',
                'params' => array(':transport'=>$transport),
                'order'=>'id DESC',
            ),
            'pagination'=>array(
                'pageSize'=>5,
            ),
        ));
        $this->render('search', array('tours'=>$tours));
    }
	public function actionTransportCountry($transport, $country)
	{
		$countryModel = Countries::model()->find(array(
			'condition' => 'short_name=:country',
			'params' => array(':country'=>$country)
		));
		$tours=new CActiveDataProvider('Tours', array(
			'criteria'=>array(
				'condition' => 'country_id=:country_id AND `type`=:transport',
				'params' => array(':country_id'=> $countryModel->id, ':transport'=>$transport),
				'order'=>'id DESC',
			),
			'pagination'=>array(
				'pageSize'=>5,
			),
		));
		$this->render('search', array('tours'=>$tours));
	}
	public function actionSearch()
	{
		$country = Yii::app()->request->getParam('country');
		$theme = Yii::app()->request->getParam('tematic');
		$type = Yii::app()->request->getParam('transport');

		$countryModel = Countries::model()->find(array(
			'condition' => 'short_name=:country',
			'params' => array(':country'=>$country)
		));
		$themeModel = TourThemes::model()->find(array(
			'condition' => 'theme=:theme',
			'params' => array(':theme'=>$theme)
		));
		$tours=new CActiveDataProvider('Tours', array(
			'criteria'=>array(
				'condition' => 'theme_id=:theme_id OR country_id=:country_id OR type=:type',
				'params' => array(':theme_id' => $themeModel->id, ':country_id'=> $countryModel->id, ':type'=> $type),
				'order'=>'id DESC',
			),
			'pagination'=>array(
				'pageSize'=>5,
			),
		));
		$this->render('search', array('tours'=>$tours));
	}
}