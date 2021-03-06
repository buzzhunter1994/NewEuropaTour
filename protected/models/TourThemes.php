<?php
class TourThemes extends CActiveRecord
{
	public $name;
	public $description;

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
	protected function afterFind()
	{
		parent::afterFind();
		$lang = Yii::app()->language;
		$otherLang = array_filter(Yii::app()->params['languages'], function($k) {
			return $k != Yii::app()->language;
		}, ARRAY_FILTER_USE_KEY);
		$this->name = $this['name_'.$lang]?$this['name_'.$lang]:$this['name_'.key($otherLang)];
		$this->description = $this['description_'.$lang]?$this['description_'.$lang]:$this['description_'.key($otherLang)];
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