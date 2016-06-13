<?php
class Reviews extends CActiveRecord
{
	public function tableName()
	{
		return '{{reviews}}';
	}
	public function rules()
	{
		return array(
			array('check', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('city, email', 'length', 'max'=>50),
			array('message', 'safe'),
			array('id, name, message, city, email, check', 'safe', 'on'=>'search'),
		);
	}
	public function relations()
	{
		return array(
			'reviewsComments' => array(self::HAS_MANY, 'ReviewsComments', 'review_id'),
		);
	}
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'message' => 'Message',
			'city' => 'City',
			'email' => 'Email',
			'check' => 'Check',
		);
	}
	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('check',$this->check);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}