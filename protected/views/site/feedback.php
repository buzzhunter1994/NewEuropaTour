<div class="container">
	<h2><?php echo Yii::t('yii', 'feedback') ?></h2>
	<div class="row">
	<div class="col-sm-5">
    <?php if(Yii::app()->user->hasFlash('contact')): ?>
    
    <div class="flash-success">
    	<?php echo Yii::app()->user->getFlash('contact'); ?>
    </div>
    <?php else: ?>


        <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id'=>'contact-form',
            'type'=>'horizontal',
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
        )); ?>

        <?php echo $form->errorSummary($model); ?>

        <?php echo $form->textFieldRow($model,'name'); ?>

        <?php echo $form->textFieldRow($model,'email'); ?>

        <?php echo $form->textAreaRow($model,'body',array('rows'=>5)); ?>

        <div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton',array(
                'buttonType'=>'submit',
                'type'=>'primary',
                'label'=> Yii::t('yii', 'send'),
            )); ?>
        </div>

        <?php $this->endWidget(); ?>
    <?php

        /*$form=$this->beginWidget('CActiveForm', array(
    	'id'=>'contact-form',
    	'enableClientValidation'=>true,
    	'clientOptions'=>array(
    		'validateOnSubmit'=>true,
    	),
        'htmlOptions' => array('class'=>'form_feed')
    )); ?>

	<?php echo $form->errorSummary($model); ?>

	<div>
        <?php echo CHtml::textField('ContactForm[name]','',array('placeholder'=>'Имя','id'=>'ContactForm_name')); ?>
	</div>

	<div>
        <?php echo CHtml::textField('ContactForm[email]','',array('placeholder'=>'Email','id'=>'ContactForm_email')); ?>
	</div>

	<div>
        <?php echo CHtml::textArea('ContactForm[body]','',array('placeholder'=>'Сообщение','id'=>'ContactForm_body','rows'=>'12')); ?>
	</div>

	<div>
		<?php echo CHtml::submitButton('Отправить',array('class'=>'formsbm')); ?>
	</div>

<?php $this->endWidget();*/ ?>

<?php endif; ?>
	</div>
	</div>
</div>