<?php
class User extends CActiveRecord
{
	public function tableName()
	{
		return '{{users}}';
	}
	public function rules()
	{
		return array(
			array('login, password, name', 'required'),
			array('login, password, name', 'length', 'max'=>100),
			array('id, login, password, name', 'safe', 'on'=>'search'),
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
			'login' => 'Логін',
			'password' => 'Пароль',
			'name' => 'Ім\'я',
		);
	}
	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('password',$this->password,true);
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
