<?php
class Categories extends CActiveRecord
{
	public function tableName()
	{
		return '{{categories}}';
	}
	public function rules()
	{
		return array(
			array('name', 'required'),
			array('catg, name', 'length', 'max'=>150),
            array('h,parent_id', 'numerical'),
			array('id, catg, name', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
            'category' => array(self::BELONGS_TO,'Categories','parent_id')
		);
	}
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'catg' => 'URL',
			'name' => 'Назва',
			'parent_id' => 'категорія',
			'h' => 'Сховати',
		);
	}
	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
        $criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('catg',$this->catg,true);
		$criteria->compare('name',$this->name,true);
		return new CActiveDataProvider($this, array(
             'criteria'=>$criteria,
                 'pagination'=>array(
                     'pageSize'=>70,
                  ),
                  'sort'=>array(
                      'defaultOrder'=>array(
                       'id'=>"ASC"
                  ))
		));
	}
    public function buildArrayDropDown(){
        $models = self::model()->findAll(array('order'=>'id ASC'));
        return CHtml::listData($models, 'id', 'name');
    }
    public static function all(){
        $models = self::model()->findAll();
        $array = array();
        foreach($models as $var){
            $array[$var->id] = $var->name;
        }
        return $array;        
    }
    
    public function buildArray(){
        $array = array();
        $model = Categories::model()->findAll();
        foreach($model as $key => $value){
            $array[$value->parent_id][$value->id] = array('id'=>$value->id,'parent_id'=>$value->parent_id,'name'=>$value->name);
        }
        return $array;
    }
    
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}