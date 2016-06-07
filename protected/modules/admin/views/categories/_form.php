<?php 
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'categories-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
));
echo $form->errorSummary($model);
echo $form->textFieldRow($model,'catg',array('size'=>60,'maxlength'=>150));
echo $form->dropDownListRow($model,'parent_id',array_merge(array('0'=>'- Без категорії -'),Categories::buildArrayDropDown()));
echo $form->dropDownListRow($model,'h',array('0'=>'Ні','1'=>'Так'));
echo $form->textFieldRow($model,'name',array('size'=>60,'maxlength'=>150));
$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit',	'type'=>'primary','label'=>$model->isNewRecord ? 'Створити' : 'Зберегти'));
$this->endWidget();