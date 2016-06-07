<?php

class PostrenameController extends Controller
{
	public $layout='/layouts/column2';

	public function actionIndex()
	{
		$model= Posts::model()->findAll();
        $arr = array();
        foreach($model as $t)
        {
            $arr[$t->id] = $t->attributes;
        }
/*        foreach ($arr as $key=>$post)
        {
            $mdl = Posts::model()->findByPk($key);
            $mdl->url = $this->str2url($mdl->title);
            $mdl->save();
        }
*/
		$this->render('index',array(
			'model'=>$arr,
		));
	}
}
