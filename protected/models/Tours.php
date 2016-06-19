<?php
class Tours extends CActiveRecord
{
	public function tableName()
	{
		return '{{tours}}';
	}
	public function rules()
	{
		return array(
			array('country_id, theme_id', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('code', 'length', 'max'=>10),
			array('title, days', 'length', 'max'=>255),
			array('description, route, program', 'safe'),
			array('id, country_id, theme_id, code, price, title, description, route, days, program', 'safe', 'on'=>'search'),
		);
	}
	public function relations()
	{
		return array(
			'country' => array(self::BELONGS_TO, 'Countries', 'country_id'),
			'theme' => array(self::BELONGS_TO, 'TourThemes', 'theme_id'),
			'trips' => array(self::HAS_MANY, 'Trips', 'tour_id'),
		);
	}
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'country_id' => 'Country',
			'theme_id' => 'Theme',
			'code' => 'Code',
			'price' => 'Price',
			'title' => 'Title',
			'description' => 'Description',
			'route' => 'Route',
			'days' => 'Days',
			'program' => 'Program',
		);
	}
	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('theme_id',$this->theme_id);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('route',$this->route,true);
		$criteria->compare('days',$this->days,true);
		$criteria->compare('program',$this->program,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}