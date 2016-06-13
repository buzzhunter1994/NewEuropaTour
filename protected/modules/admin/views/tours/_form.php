<div class="form">
<?php 
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'countries-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->textFieldRow($model,'title',array('size'=>60,'maxlength'=>255)); ?>
	<?php echo $form->textFieldRow($model,'days',array('size'=>60,'maxlength'=>255)); ?>
	<?php echo $form->textFieldRow($model,'route',array('size'=>60,'maxlength'=>255)); ?>
	<?php echo $form->textAreaRow($model,'description', array('id'=>'editor', 'rows'=>'20'));?>
	<?php echo $form->textAreaRow($model,'program', array('id'=>'program', 'rows'=>'20'));?>

    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit',	'type'=>'primary','label'=>$model->isNewRecord ? 'Создать' : 'Сохранить')); ?>
<?php $this->endWidget(); ?>
</div>
<script src="/js/ckeditor/ckeditor.js"></script>
<script>
	CKEDITOR.replaceAll(
    {
        height : 400
    });
</script>
