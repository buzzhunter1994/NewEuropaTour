<div class="middle_form">
<h1>Авторизація</h1>
<?php 
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'login-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
)); ?> 
	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->textFieldRow($model,'username',array('size'=>60,'maxlength'=>150)); ?>
	<?php echo $form->passwordFieldRow($model,'password',array('size'=>60,'maxlength'=>150)); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit',	'type'=>'primary','label'=>'Вхід')); ?>
    <?php $this->endWidget(); ?>
</div>