<?php
class ToursController extends Controller
{
	public $layout='//layouts/main';
	public function actionView($id)
	{
		$tour=Tours::model()->findByPk($id);
		$this->render('view', array('tour'=>$tour));
	}
	public function actionIndex()
	{
		$countries = Countries::model()->findAll();
		$tourThemes = TourThemes::model()->findAll();
		$this->render('index', array('countries' => $countries, 'tourThemes' => $tourThemes));
	}
}