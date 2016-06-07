<?php

class AddAlbumForm extends CFormModel
{
	public $name;
 
	public function rules()
	{
		return array(
			array('name', 'required'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'name'=>'Название альбома',
		);
	}
}