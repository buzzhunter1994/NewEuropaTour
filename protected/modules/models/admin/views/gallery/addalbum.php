<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
    	'id'=>'addalbum-form',
    	'enableClientValidation'=>false,
    	'clientOptions'=>array(
    		'validateOnSubmit'=>true,
    	)
    )); ?>
	<?php echo $form->errorSummary($model); ?>
	<div>
        <?php echo CHtml::textField('AddAlbumForm[name]','',array('placeholder'=>'Название альбома')); ?>
	</div>
	<div>
		<?php echo CHtml::submitButton('Создать'); ?>
	</div>
    <?php $this->endWidget(); ?>
</div>