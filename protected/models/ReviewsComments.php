<?php
class ReviewsComments extends CActiveRecord
{
	public function tableName()
	{
		return '{{reviews_comments}}';
	}
	public function rules()
	{
		return array(
			array('review_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('message', 'safe'),
			array('id, name, message, review_id', 'safe', 'on'=>'search'),
		);
	}
	public function relations()
	{
		return array(
			'review' => array(self::BELONGS_TO, 'Reviews', 'review_id'),
		);
	}
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'message' => 'Message',
			'review_id' => 'Review',
		);
	}
	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('review_id',$this->review_id);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}