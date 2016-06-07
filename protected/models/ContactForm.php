<?php

class ContactForm extends CFormModel
{
	public $name;
	public $email;
	public $subject;
	public $body;
	public $verifyCode;
	public function rules()
	{
		return array(
			array('name, email, body', 'required'),
			array('email', 'email'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'name'=> Yii::t('yii', 'name'),
			'email'=> Yii::t('yii', 'email'),
			'body'=> Yii::t('yii', 'message'),
		);
	}
}