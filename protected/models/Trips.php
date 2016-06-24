<?php
class Trips extends CActiveRecord
{
	const SEAT_RESERVED = 1;
	const SEAT_BUSY = 2;
	private $seats;
	public $description;
	public function tableName()
	{
		return '{{trips}}';
	}
	public function rules()
	{
		return array(
			array('tour_id, seat_1_1, seat_1_2, seat_1_3, seat_1_4, seat_2_1, seat_2_2, seat_2_3, seat_2_4, seat_3_1, seat_3_2, seat_3_3, seat_3_4, seat_4_1, seat_4_2, seat_4_3, seat_4_4, seat_5_1, seat_5_2, seat_6_1, seat_6_2, seat_7_1, seat_7_2, seat_7_3, seat_7_4, seat_8_1, seat_8_2, seat_8_3, seat_8_4, seat_9_1, seat_9_2, seat_9_3, seat_9_4, seat_10_1, seat_10_2, seat_10_3, seat_10_4, seat_11_1, seat_11_2, seat_11_3, seat_11_4, seat_12_1, seat_12_2, seat_12_3, seat_12_4, seat_12_5', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
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
	protected function afterFind()
	{
		parent::afterFind();
		$lang = Yii::app()->language;
		$otherLang = array_filter(Yii::app()->params['languages'], function($k) {
			return $k != Yii::app()->language;
		}, ARRAY_FILTER_USE_KEY);
		$this->description = $this['description_'.$lang]?$this['description_'.$lang]:$this['description_'.key($otherLang)];
	}
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tour_id' => 'Тур',
			'description' => 'Описание',
			'date_start' => 'Дата с',
			'date_arrive' => 'Дата по',
			'price' => 'Цена',
		);
	}

	public function seats(){
		$this->seats['2LW'] = $this->seat_1_1;
		$this->seats['2LI'] = $this->seat_1_2;
		$this->seats['2RI'] = $this->seat_1_3;
		$this->seats['2RW'] = $this->seat_1_4;
		$this->seats['3LW'] = $this->seat_2_1;
		$this->seats['3LI'] = $this->seat_2_2;
		$this->seats['3RI'] = $this->seat_2_3;
		$this->seats['3RW'] = $this->seat_2_4;
		$this->seats['4LW'] = $this->seat_3_1;
		$this->seats['4LI'] = $this->seat_3_2;
		$this->seats['4RI'] = $this->seat_3_3;
		$this->seats['4RW'] = $this->seat_3_4;
		$this->seats['5LW'] = $this->seat_4_1;
		$this->seats['5LI'] = $this->seat_4_2;
		$this->seats['5RI'] = $this->seat_4_3;
		$this->seats['5RW'] = $this->seat_4_4;
		$this->seats['6LW'] = $this->seat_5_1;
		$this->seats['6LI'] = $this->seat_5_2;
		$this->seats['7LW'] = $this->seat_6_1;
		$this->seats['7LI'] = $this->seat_6_2;
		$this->seats['8LW'] = $this->seat_7_1;
		$this->seats['8LI'] = $this->seat_7_2;
		$this->seats['8RI'] = $this->seat_7_3;
		$this->seats['8RW'] = $this->seat_7_4;
		$this->seats['9LW'] = $this->seat_8_1;
		$this->seats['9LI'] = $this->seat_8_2;
		$this->seats['9RI'] = $this->seat_8_3;
		$this->seats['9RW'] = $this->seat_8_4;
		$this->seats['10LW'] = $this->seat_9_1;
		$this->seats['10LI'] = $this->seat_9_2;
		$this->seats['10RI'] = $this->seat_9_3;
		$this->seats['10RW'] = $this->seat_9_4;
		$this->seats['11LW'] = $this->seat_10_1;
		$this->seats['11LI'] = $this->seat_10_2;
		$this->seats['11RI'] = $this->seat_10_3;
		$this->seats['11RW'] = $this->seat_10_4;
		$this->seats['12LW'] = $this->seat_11_1;
		$this->seats['12LI'] = $this->seat_11_2;
		$this->seats['12RI'] = $this->seat_11_3;
		$this->seats['12RW'] = $this->seat_11_4;
		$this->seats['13LW'] = $this->seat_12_1;
		$this->seats['13LI'] = $this->seat_12_2;
		$this->seats['13M'] = $this->seat_12_3;
		$this->seats['13RI'] = $this->seat_12_4;
		$this->seats['13RW'] = $this->seat_12_5;
		return $this->seats;
	}
    public function selfDate(){
        return date("d.m - ", strtotime($this->date_start)) . date("d.m.Y", strtotime($this->date_arrive));
    }
	public function otherDates(){
		return self::model()->findAll(array(
			'condition'=>'id <> :id AND tour_id = :tour_id',
			'params'=>array(':id'=>$this->id, ':tour_id'=>$this->tour_id),
		));
	}
    public function convertedPrice(){
        return Currency::convert($this->price);
    }
	public function free($var)
	{
		return ($var != self::SEAT_RESERVED) && ($var != self::SEAT_BUSY);
	}
	public function reserved($var)
	{
		return $var == self::SEAT_RESERVED;
	}
	public function busy($var)
	{
		return $var == self::SEAT_BUSY;
	}
	public function freeSeatsCount(){
		return count(array_filter(self::seats(), "self::free"));
	}
	public function getAllSeats(){
		return json_encode((array_keys(self::seats())));
	}
	public function getReservedSeats(){
		return json_encode((array_keys(array_filter(self::seats(), "self::reserved"))));
	}
	public function getBusySeats(){
		return json_encode((array_keys(array_filter(self::seats(), "self::busy"))));
	}
	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('tour_id',$this->tour_id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('date_start',$this->date_start,true);
		$criteria->compare('date_arrive',$this->date_arrive,true);
		$criteria->compare('price',$this->price);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}