<?php
class CountriesController extends Controller
{
	public $layout='//layouts/main';
	public function actionView($name)
	{
		$criteria = new CDbCriteria();
		$criteria->compare('short_name', $name);
		$country = Countries::model()->find($criteria);
		$this->render('view', array('country'=>$country));
	}
	public function actionIndex()
	{
		$countries=Countries::model()->findAll();
		$this->render('index', array('countries'=> $countries));
	}
}