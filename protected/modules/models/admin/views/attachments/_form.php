<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'attachments-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля с <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); ?>
<?php if ($model->isNewRecord){ ?>
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
<?php } ?>
	<div class="row">
		<?php echo $form->labelEx($model,'post_id'); ?>
        <?php echo $form->dropDownList($model,'post_id',Posts::buildArrayDropDown()); ?>
		<?php echo $form->error($model,'post_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>
<?php $this->endWidget(); ?>
</div>