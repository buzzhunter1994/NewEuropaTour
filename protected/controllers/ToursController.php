<?php
class ToursController extends Controller
{
	public $layout='//layouts/main';
	public function actionView($id)
	{
		$tour=Tours::model()->findByPk($id);
		$this->render('view', array('tour'=>$tour));
	}
	public function actionTheme($id)
	{
		$tour = Tours::model()->findByPk($id);
		$this->render('view', array('tour'=>$tour));
	}
    public function actionOrder($id)
    {
        $trip = Trips::model()->findByPk($id);
        $this->render('order', array('trip'=>$trip, 'tour'=>$trip->tour));
    }
    public function actionBus($id)
    {
        $trip = Trips::model()->findByPk($id);
        $this->renderPartial('bus', array('trip'=>$trip));
    }
	public function actionIndex()
	{
		$countries = Countries::model()->findAll();
		$tourThemes = TourThemes::model()->findAll();
		$this->render('index', array('countries' => $countries, 'tourThemes' => $tourThemes));
	}
}