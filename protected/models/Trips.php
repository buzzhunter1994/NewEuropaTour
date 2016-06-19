<?php
class Trips extends CActiveRecord
{
	const SEAT_RESERVED = 1;
	const SEAT_BUSY = 2;
	private $seats;
	public function tableName()
	{
		return '{{trips}}';
	}
	public function rules()
	{
		return array(
			array('tour_id, seat_1_1, seat_1_2, seat_1_3, seat_1_4, seat_2_1, seat_2_2, seat_2_3, seat_2_4, seat_3_1, seat_3_2, seat_3_3, seat_3_4, seat_4_1, seat_4_2, seat_4_3, seat_4_4, seat_5_1, seat_5_2, seat_6_1, seat_6_2, seat_7_1, seat_7_2, seat_7_3, seat_7_4, seat_8_1, seat_8_2, seat_8_3, seat_8_4, seat_9_1, seat_9_2, seat_9_3, seat_9_4, seat_10_1, seat_10_2, seat_10_3, seat_10_4, seat_11_1, seat_11_2, seat_11_3, seat_11_4, seat_12_1, seat_12_2, seat_12_3, seat_12_4, seat_12_5', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('name', 'length', 'max'=>10),
			array('description', 'length', 'max'=>255),
			array('date_start, date_arrive', 'safe'),
			array('id, tour_id, name, description, date_start, date_arrive, price, seat_1_1, seat_1_2, seat_1_3, seat_1_4, seat_2_1, seat_2_2, seat_2_3, seat_2_4, seat_3_1, seat_3_2, seat_3_3, seat_3_4, seat_4_1, seat_4_2, seat_4_3, seat_4_4, seat_5_1, seat_5_2, seat_6_1, seat_6_2, seat_7_1, seat_7_2, seat_7_3, seat_7_4, seat_8_1, seat_8_2, seat_8_3, seat_8_4, seat_9_1, seat_9_2, seat_9_3, seat_9_4, seat_10_1, seat_10_2, seat_10_3, seat_10_4, seat_11_1, seat_11_2, seat_11_3, seat_11_4, seat_12_1, seat_12_2, seat_12_3, seat_12_4, seat_12_5', 'safe', 'on'=>'search'),
		);
	}
	public function relations()
	{
		return array(
			'tour' => array(self::BELONGS_TO, 'Tours', 'tour_id'),
		);
	}
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tour_id' => 'Tour',
			'name' => 'Name',
			'description' => 'Description',
			'date_start' => 'Date Start',
			'date_arrive' => 'Date Arrive',
			'price' => 'Price',
			'seat_1_1' => 'Seat 1 1',
			'seat_1_2' => 'Seat 1 2',
			'seat_1_3' => 'Seat 1 3',
			'seat_1_4' => 'Seat 1 4',
			'seat_2_1' => 'Seat 2 1',
			'seat_2_2' => 'Seat 2 2',
			'seat_2_3' => 'Seat 2 3',
			'seat_2_4' => 'Seat 2 4',
			'seat_3_1' => 'Seat 3 1',
			'seat_3_2' => 'Seat 3 2',
			'seat_3_3' => 'Seat 3 3',
			'seat_3_4' => 'Seat 3 4',
			'seat_4_1' => 'Seat 4 1',
			'seat_4_2' => 'Seat 4 2',
			'seat_4_3' => 'Seat 4 3',
			'seat_4_4' => 'Seat 4 4',
			'seat_5_1' => 'Seat 5 1',
			'seat_5_2' => 'Seat 5 2',
			'seat_6_1' => 'Seat 6 1',
			'seat_6_2' => 'Seat 6 2',
			'seat_7_1' => 'Seat 7 1',
			'seat_7_2' => 'Seat 7 2',
			'seat_7_3' => 'Seat 7 3',
			'seat_7_4' => 'Seat 7 4',
			'seat_8_1' => 'Seat 8 1',
			'seat_8_2' => 'Seat 8 2',
			'seat_8_3' => 'Seat 8 3',
			'seat_8_4' => 'Seat 8 4',
			'seat_9_1' => 'Seat 9 1',
			'seat_9_2' => 'Seat 9 2',
			'seat_9_3' => 'Seat 9 3',
			'seat_9_4' => 'Seat 9 4',
			'seat_10_1' => 'Seat 10 1',
			'seat_10_2' => 'Seat 10 2',
			'seat_10_3' => 'Seat 10 3',
			'seat_10_4' => 'Seat 10 4',
			'seat_11_1' => 'Seat 11 1',
			'seat_11_2' => 'Seat 11 2',
			'seat_11_3' => 'Seat 11 3',
			'seat_11_4' => 'Seat 11 4',
			'seat_12_1' => 'Seat 12 1',
			'seat_12_2' => 'Seat 12 2',
			'seat_12_3' => 'Seat 12 3',
			'seat_12_4' => 'Seat 12 4',
			'seat_12_5' => 'Seat 12 5',
		);
	}
	public function selfDate(){
		return date("d.m - ", strtotime($this->date_start)) . date("d.m.Y", strtotime($this->date_arrive));
	}
	public function seats(){
		$this->seats['1_1'] = $this->seat_1_1;
		$this->seats['1_2'] = $this->seat_1_2;
		$this->seats['1_3'] = $this->seat_1_3;
		$this->seats['1_4'] = $this->seat_1_4;
		$this->seats['2_1'] = $this->seat_2_1;
		$this->seats['2_2'] = $this->seat_2_2;
		$this->seats['2_3'] = $this->seat_2_3;
		$this->seats['2_4'] = $this->seat_2_4;
		$this->seats['3_1'] = $this->seat_3_1;
		$this->seats['3_2'] = $this->seat_3_2;
		$this->seats['3_3'] = $this->seat_3_3;
		$this->seats['3_4'] = $this->seat_3_4;
		$this->seats['4_1'] = $this->seat_4_1;
		$this->seats['4_2'] = $this->seat_4_2;
		$this->seats['4_3'] = $this->seat_4_3;
		$this->seats['4_4'] = $this->seat_4_4;
		$this->seats['5_1'] = $this->seat_5_1;
		$this->seats['5_2'] = $this->seat_5_2;
		$this->seats['6_1'] = $this->seat_6_1;
		$this->seats['6_2'] = $this->seat_6_2;
		$this->seats['7_1'] = $this->seat_7_1;
		$this->seats['7_2'] = $this->seat_7_2;
		$this->seats['7_3'] = $this->seat_7_3;
		$this->seats['7_4'] = $this->seat_7_4;
		$this->seats['8_1'] = $this->seat_8_1;
		$this->seats['8_2'] = $this->seat_8_2;
		$this->seats['8_3'] = $this->seat_8_3;
		$this->seats['8_4'] = $this->seat_8_4;
		$this->seats['9_1'] = $this->seat_9_1;
		$this->seats['9_2'] = $this->seat_9_2;
		$this->seats['9_3'] = $this->seat_9_3;
		$this->seats['9_4'] = $this->seat_9_4;
		$this->seats['10_1'] = $this->seat_10_1;
		$this->seats['10_2'] = $this->seat_10_2;
		$this->seats['10_3'] = $this->seat_10_3;
		$this->seats['10_4'] = $this->seat_10_4;
		$this->seats['11_1'] = $this->seat_11_1;
		$this->seats['11_2'] = $this->seat_11_2;
		$this->seats['11_3'] = $this->seat_11_3;
		$this->seats['11_4'] = $this->seat_11_4;
		$this->seats['12_1'] = $this->seat_12_1;
		$this->seats['12_2'] = $this->seat_12_2;
		$this->seats['12_3'] = $this->seat_12_3;
		$this->seats['12_4'] = $this->seat_12_4;
		$this->seats['12_5'] = $this->seat_12_5;
		return $this->seats;
	}
	public function otherDates(){
		return self::model()->findAll(array(
			'condition'=>'id <> :id AND tour_id = :tour_id',
			'params'=>array(':id'=>$this->id, ':tour_id'=>$this->tour_id),
		));
	}
	public function free($var)
	{
		return ($var != self::SEAT_RESERVED) && ($var != self::SEAT_BUSY);
	}
	public function freeSeats(){
		return array_filter(self::seats(), "self::free");
	}
	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('tour_id',$this->tour_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('date_start',$this->date_start,true);
		$criteria->compare('date_arrive',$this->date_arrive,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('seat_1_1',$this->seat_1_1);
		$criteria->compare('seat_1_2',$this->seat_1_2);
		$criteria->compare('seat_1_3',$this->seat_1_3);
		$criteria->compare('seat_1_4',$this->seat_1_4);
		$criteria->compare('seat_2_1',$this->seat_2_1);
		$criteria->compare('seat_2_2',$this->seat_2_2);
		$criteria->compare('seat_2_3',$this->seat_2_3);
		$criteria->compare('seat_2_4',$this->seat_2_4);
		$criteria->compare('seat_3_1',$this->seat_3_1);
		$criteria->compare('seat_3_2',$this->seat_3_2);
		$criteria->compare('seat_3_3',$this->seat_3_3);
		$criteria->compare('seat_3_4',$this->seat_3_4);
		$criteria->compare('seat_4_1',$this->seat_4_1);
		$criteria->compare('seat_4_2',$this->seat_4_2);
		$criteria->compare('seat_4_3',$this->seat_4_3);
		$criteria->compare('seat_4_4',$this->seat_4_4);
		$criteria->compare('seat_5_1',$this->seat_5_1);
		$criteria->compare('seat_5_2',$this->seat_5_2);
		$criteria->compare('seat_6_1',$this->seat_6_1);
		$criteria->compare('seat_6_2',$this->seat_6_2);
		$criteria->compare('seat_7_1',$this->seat_7_1);
		$criteria->compare('seat_7_2',$this->seat_7_2);
		$criteria->compare('seat_7_3',$this->seat_7_3);
		$criteria->compare('seat_7_4',$this->seat_7_4);
		$criteria->compare('seat_8_1',$this->seat_8_1);
		$criteria->compare('seat_8_2',$this->seat_8_2);
		$criteria->compare('seat_8_3',$this->seat_8_3);
		$criteria->compare('seat_8_4',$this->seat_8_4);
		$criteria->compare('seat_9_1',$this->seat_9_1);
		$criteria->compare('seat_9_2',$this->seat_9_2);
		$criteria->compare('seat_9_3',$this->seat_9_3);
		$criteria->compare('seat_9_4',$this->seat_9_4);
		$criteria->compare('seat_10_1',$this->seat_10_1);
		$criteria->compare('seat_10_2',$this->seat_10_2);
		$criteria->compare('seat_10_3',$this->seat_10_3);
		$criteria->compare('seat_10_4',$this->seat_10_4);
		$criteria->compare('seat_11_1',$this->seat_11_1);
		$criteria->compare('seat_11_2',$this->seat_11_2);
		$criteria->compare('seat_11_3',$this->seat_11_3);
		$criteria->compare('seat_11_4',$this->seat_11_4);
		$criteria->compare('seat_12_1',$this->seat_12_1);
		$criteria->compare('seat_12_2',$this->seat_12_2);
		$criteria->compare('seat_12_3',$this->seat_12_3);
		$criteria->compare('seat_12_4',$this->seat_12_4);
		$criteria->compare('seat_12_5',$this->seat_12_5);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}