<?php

class ReviewsForm extends CFormModel
{
	public $name;
	public $city;
	public $email;
	public $body;

	public function rules()
	{
		return array(
			array('name, body', 'required'),
			array('email', 'email'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'name'=> Yii::t('yii', 'name'),
			'city'=> Yii::t('yii', 'city'),
			'email'=> Yii::t('yii', 'email'),
			'body'=> Yii::t('yii', 'message'),
		);
	}
}