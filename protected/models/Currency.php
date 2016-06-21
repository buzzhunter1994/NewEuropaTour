<?php
class Currency extends CActiveRecord
{
	public function tableName()
	{
		return '{{currency}}';
	}
	public function rules()
	{
		return array(
			array('nominal', 'numerical', 'integerOnly'=>true),
			array('value', 'numerical'),
			array('name', 'length', 'max'=>50),
			array('id, name, nominal, value', 'safe', 'on'=>'search'),
		);
	}
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'nominal' => 'Nominal',
			'value' => 'Value',
		);
	}
    public static function format($sum){
        $currency['from'] = self::model()->find(array(
            'condition'=>'`default` = 1',
        ));
        $sum = number_format($sum, 0, ',', ' ');
        return $currency['from']->preffix. $sum .$currency['from']->affix;
    }
    public static function convert($sum)
    {
        $currency['from'] = self::model()->find(array(
            'condition'=>'`default` = 1',
        ));
        $currency['to'] = self::model()->find(array(
            'condition'=>'name = :name',
            'params'=>array(':name' => Yii::app()->language),
        ));
        if ($currency['from']==$currency['to'])
                $value = $sum;
            else
                $value = ($sum * $currency['to']->value);
        $value = number_format($value, 0, ',', ' ');
        return $currency['to']->preffix. $value .$currency['to']->affix;
    }
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}