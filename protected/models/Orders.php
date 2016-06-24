<?php
class Orders extends CActiveRecord
{
	public function tableName()
	{
		return '{{orders}}';
	}
	public function rules()
	{
        return array(
            array('tour_id, trip_id, users_cnt, fio, email, phone', 'required'),
            array('tour_id, trip_id, users_cnt', 'numerical', 'integerOnly'=>true),
            array('fio, email, fio_1, birthday_1, fio_2, birthday_2, fio_3, birthday_3, fio_4, birthday_4', 'length', 'max'=>255),
            array('ordered_places, msg, message, fio_1, birthday_1, fio_2, birthday_2, fio_3, birthday_3, fio_4, birthday_4', 'safe'),
            array('id, tour_id, trip_id, users_cnt, fio, email, fio_1, birthday_1, fio_2, birthday_2, fio_3, birthday_3, fio_4, birthday_4, ordered_places, msg, message', 'safe', 'on'=>'search'),
        );
	}
	public function relations()
	{
		return array(
			'tour' => array(self::BELONGS_TO, 'Tours', 'tour_id'),
			'trip' => array(self::BELONGS_TO, 'Trips', 'trip_id'),
		);
	}
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tour_id' => 'Tour',
			'trip_id' => 'Trip',
			'users_cnt' => 'Users Cnt',
			'fio' => 'Fio',
			'email' => 'Email',
			'fio_1' => 'Fio 1',
			'birthday_1' => 'Birthday 1',
			'fio_2' => 'Fio 2',
			'birthday_2' => 'Birthday 2',
			'fio_3' => 'Fio 3',
			'birthday_3' => 'Birthday 3',
			'fio_4' => 'Fio 4',
			'birthday_4' => 'Birthday 4',
			'ordered_places' => 'Ordered Places',
			'msg' => 'Msg',
			'message' => 'Message',
		);
	}
	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('tour_id',$this->tour_id);
		$criteria->compare('trip_id',$this->trip_id);
		$criteria->compare('users_cnt',$this->users_cnt);
		$criteria->compare('fio',$this->fio,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('fio_1',$this->fio_1,true);
		$criteria->compare('birthday_1',$this->birthday_1,true);
		$criteria->compare('fio_2',$this->fio_2,true);
		$criteria->compare('birthday_2',$this->birthday_2,true);
		$criteria->compare('fio_3',$this->fio_3,true);
		$criteria->compare('birthday_3',$this->birthday_3,true);
		$criteria->compare('fio_4',$this->fio_4,true);
		$criteria->compare('birthday_4',$this->birthday_4,true);
		$criteria->compare('ordered_places',$this->ordered_places,true);
		$criteria->compare('msg',$this->msg,true);
		$criteria->compare('message',$this->message,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}