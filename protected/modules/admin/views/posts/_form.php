<div class="form">
<?php 
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'categories-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->textFieldRow($model,'title',array('size'=>60,'maxlength'=>150)); ?>
    	<?php echo $form->textAreaRow($model,'text', array('id'=>'editor', 'rows'=>'20'));?>
	<?php echo $form->textFieldRow($model,'tags',array('size'=>60,'maxlength'=>150)); ?>
	<?php echo $form->dropDownListRow($model,'is_news',array('0'=>'Нет','1'=>'Да')); ?>

    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit',	'type'=>'primary','label'=>$model->isNewRecord ? 'Создать' : 'Сохранить')); ?>
<?php $this->endWidget(); ?>
</div>
<script src="/js/ckeditor/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'editor' ,
    {
        height : 400
    });
</script>
