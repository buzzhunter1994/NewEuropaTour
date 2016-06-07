<?php
class Attachments extends CActiveRecord
{
	public function tableName()
	{
		return '{{attachments}}';
	}
	public function rules()
	{
		return array(
			array('name, post_id', 'required'),
			array('post_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>64),
			array('post_id', 'safe', 'on'=>'update'),
           	array('id, name, post_id', 'safe', 'on'=>'search'),
		);
	}
	public function relations()
	{
		return array(
            'post' => array(self::BELONGS_TO,'Posts','post_id'),
		);
	}
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Вкладення',
			'post_id' => 'Стаття',
		);
	}
	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('post_id',$this->post_id);
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
