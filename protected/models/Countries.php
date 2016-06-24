<?php
class Countries extends CActiveRecord
{
	public $name;
	public $title;
	public $description;

	public function tableName()
	{
		return '{{countries}}';
	}
	public function rules()
	{
		return array(
			array('name, short_name, iso, top, title', 'required'),
			array('top', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>32),
			array('short_name', 'length', 'max'=>5),
			array('iso', 'length', 'max'=>3),
			array('id, name, short_name, iso, top', 'safe', 'on'=>'search'),
		);
	}
	public function relations()
	{
		return array(
			'tours' => array(self::HAS_MANY, 'Tours', 'country_id'),
			'toursCount' => array(self::STAT, 'Tours', 'country_id')
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
		$this->title = $this['title_'.$lang]?$this['title_'.$lang]:$this['title_'.key($otherLang)];
		$this->description = $this['description_'.$lang]?$this['description_'.$lang]:$this['description_'.key($otherLang)];
	}
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'short_name' => 'Short Name',
			'iso' => 'Iso',
			'top' => 'Top',
		);
	}
	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('short_name',$this->short_name,true);
		$criteria->compare('iso',$this->iso,true);
		$criteria->compare('top',$this->top);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>30,
			),
			'sort'=>array(
				'defaultOrder'=>array(
					'id'=>""
				))
		));
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}