<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля с <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pos'); ?>
		<?php echo $form->textField($model,'pos',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'pos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stag'); ?>
		<?php echo $form->textField($model,'stag'); ?>
		<?php echo $form->error($model,'stag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'info'); ?>
		<?php 
        $this->widget('application.extensions.ckeditor.CKEditor',
            array( 
                'model'=>$model,
                'attribute'=>'info',
                'language'=>'ru'
           )
        );
           ?>
		<?php echo $form->error($model,'info'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ck'); ?>
		<?php echo $form->dropDownList($model,'ck',CComm::buildArrayDropDown());?>
		<?php echo $form->error($model,'ck'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'kerivnyk'); ?>
		<?php echo $form->dropDownList($model,'kerivnyk',array('0'=>"Нет",'1'=>"Да"))?>
		<?php echo $form->error($model,'kerivnyk'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>
<?php $this->endWidget(); ?>
</div>