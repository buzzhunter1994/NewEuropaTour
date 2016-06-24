<?php

class ReviewsForm extends CFormModel
{
	public $name;
	public $city;
	public $email;
	public $message;
    public $verifyCode;

	public function rules()
	{
		return array(
			array('name, message, email', 'required'),
			array('email', 'email'),
            array('verifyCode','captcha'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'name'=> Yii::t('yii', 'name'),
			'city'=> Yii::t('yii', 'city'),
			'email'=> Yii::t('yii', 'email'),
			'message'=> Yii::t('yii', 'message'),
			'verifyCode'=> Yii::t('yii', 'Verify code'),
		);
	}
}