<?php
class Storage extends CActiveRecord
{
	public function tableName()
	{
		return '{{storage}}';
	}
	public function rules()
	{
		return array(
			array('key, value', 'required'),
			array('key', 'length', 'max'=>255),
			array('key', 'unique'),
			array('id, key, value', 'safe', 'on'=>'search'),
		);
	}
	public function relations()
	{
		return array(
		);
	}
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'key' => 'Ключ',
			'value' => 'Значение',
		);
	}
	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('key',$this->key,true);
		$criteria->compare('value',$this->value,true);
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