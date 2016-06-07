<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'storage-form',
	'enableAjaxValidation'=>false,
)); ?>
	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'key'); ?>
		<?php echo $form->textField($model,'key',array('size'=>68,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'key'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'value'); ?>
		<?php echo $form->textArea($model,'value',array('rows'=>15,'cols'=>70)); ?>
		<?php echo $form->error($model,'value'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>
<?php $this->endWidget(); ?>
</div>