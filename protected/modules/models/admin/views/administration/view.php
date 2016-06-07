<h1>Изменение страницы администрации</h1>
    <?php if(Yii::app()->user->hasFlash('contact')): ?>
    
    <div class="flash-success">
    	<?php echo Yii::app()->user->getFlash('contact'); ?>
    </div>
    <?php else: ?>
 <div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admin-form',
	'enableAjaxValidation'=>false,
)); ?>
	<div class="row">
		<?php 
        $this->widget('application.extensions.ckeditor.CKEditor',
            array( 
                'model'=>$model,
                'attribute'=>'text',
                'language'=>'ru',
                'height'=>'900px',
           )
        );
           ?>
		<?php echo $form->error($model,'text'); ?>
	</div>
   	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>
<?php $this->endWidget(); ?>
</div><?php endif; ?>