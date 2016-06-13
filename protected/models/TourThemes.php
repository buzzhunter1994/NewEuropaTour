<?php
class TourThemes extends CActiveRecord
{
	public function tableName()
	{
		return '{{tour_themes}}';
	}
	public function rules()
	{
		return array(
			array('theme, name', 'length', 'max'=>50),
			array('id, theme, name', 'safe', 'on'=>'search'),
		);
	}
	public function relations()
	{
		return array(
			'tours' => array(self::HAS_MANY, 'Tours', 'theme_id'),
			'toursCount' => array(self::STAT, 'Tours', 'theme_id')
		);
	}
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'theme' => 'Theme',
			'name' => 'Name',
		);
	}
	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('theme',$this->theme,true);
		$criteria->compare('name',$this->name,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}