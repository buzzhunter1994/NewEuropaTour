<?php
class ToursController extends Controller
{
	public $layout='//layouts/main';
	public function actionView()
	{
		$this->render('view');
	}
	public function actionIndex()
	{
		$this->render('index');
	}
}