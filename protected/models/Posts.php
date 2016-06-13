<?php
class Posts extends CActiveRecord
{
	public function tableName()
	{
		return '{{posts}}';
	}
	public function rules()
	{
		return array(
			array('title, text', 'required'),
			array('catg, is_news', 'numerical', 'integerOnly'=>true),
			array('title, tags', 'length', 'max'=>150),
            array('id, title, catg, tags, photos, url, is_news', 'safe', 'on'=>'upd'),
			array('id, title, text, catg, tags, photos, url,is_news', 'safe', 'on'=>'search'),
		);
	}
	public function relations()
	{
		return array(
            'category' => array(self::BELONGS_TO,'Categories','catg'),
            'attachments' => array(self::HAS_MANY,'Attachments','post_id')
		);
	}
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Заголовок',
			'text' => 'Текст',
			'catg' => 'Категория',
			'tags' => 'Теги',
			'url' => 'Url',
			'is_news' => 'Новость',
		);
	}
	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('catg',$this->catg);
		$criteria->compare('tags',$this->tags,true);
        $criteria->compare('url',$this->tags,true);
		$criteria->compare('is_news',$this->is_news);
		return new CActiveDataProvider($this, array(
             'criteria'=>$criteria,
                 'pagination'=>array(
                     'pageSize'=>10,
                  ),
                  'sort'=>array(
                      'defaultOrder'=>array(
                       'id'=>"DESC"
                  ))
		));
	}
    public function translit_title($string)
    {
        $converter = array(
            'а' => 'a',   'б' => 'b',   'в' => 'v',
            'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
            'и' => 'i',   'й' => 'y',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',
            'ф' => 'f',   'х' => 'h',   'ц' => 'c',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
            'ь' => '',  'ы' => 'y',   'ъ' => '',
            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
    
            'А' => 'A',   'Б' => 'B',   'В' => 'V',
            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
            'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
            'И' => 'I',   'Й' => 'Y',   'К' => 'K',
            'Л' => 'L',   'М' => 'M',   'Н' => 'N',
            'О' => 'O',   'П' => 'P',   'Р' => 'R',
            'С' => 'S',   'Т' => 'T',   'У' => 'U',
            'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
            'Ь' => '',    'Ы' => 'Y',   'Ъ' => '',
            'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
            'і'=>"i",     'ї'=>"i",     'І'=>"I",    'Ї'=>"I"
        );
        return strtr($string, $converter);
    }
    public function str2url($str) {
        $str = $this->translit_title($str);
        $str = mb_strtolower($str);
        $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
        $str = trim($str, "-");
        return $str;
    }
    
    protected function beforeSave()
    {
        if(parent::beforeSave())
        {
            if($this->isNewRecord)
            {
                $this->url=$this->str2url( $this->title );
            }
            return true;
        }
        else
            return false;
    }
    public function buildArrayDropDown(){
        $models = self::model()->findAll(array('order'=>'title ASC'));
        return CHtml::listData($models, 'id', 'title');
    }
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}