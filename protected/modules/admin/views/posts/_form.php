<div class="form">

<?php
Yii::app()->clientScript->registerScript('search', "
function del(id){
	if(!confirm('Ви впевнені, що хочете видалити цей елемент?')) return false;
    	$.ajax({
    		type: 'POST',
    		url: '/admin/attachments/delete/id/'+id,
    		success: function(data){    			
                console.log('att'+id);
                $('.att'+id).remove();
    		}
    	});
	   return false;
}
 ", CClientScript::POS_HEAD);
 ?>
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
	<?php echo $form->dropDownListRow($model,'is_news',array('0'=>'Ні','1'=>'Так')); ?>
    <?php if(!$model->isNewRecord){ ?>
    <div class="control-group ">
        <label class="control-label" for="Posts_is_news">Вкладення</label>
        <div class="controls">
            <ul class="album">
            <?php
                if (count($model->attachments)!=0){
                    foreach($model->attachments as $attachment)
                        echo "<li class=\"att$attachment->id\"><a href='#' onclick='return del($attachment->id)' title='Удалить'><img src='/images/upload/thumbs/$attachment->name' /></a></li>";
                }
            ?>
            </ul>
        	<?php $this->widget('application.extensions.EAjaxUpload.EAjaxUpload',
                array(
                        'id'=>'uploadFile',
                        'config'=>array(
                               'action'=>Yii::app()->createUrl("/admin/attachments/upload/id/$post_id"),
                               'allowedExtensions'=>array("jpg","jpeg"),//array("jpg","jpeg","gif","exe","mov" and etc...
                               'sizeLimit'=>10*1024*1024,
                               'multiple'=>true,
                               'onComplete'=>"js:function(id, fileName, responseJSON){ $('.album').append('<li class=\"att'+responseJSON.id+'\"><a href=\"#\" onclick=\"return del('+responseJSON.id+')\" title=\"Удалить\"><img src=\"/images/upload/thumbs/'+responseJSON.filename+'\"></a></li>'); }",
                        )
                )); 
            ?>
        </div>
    </div>
    <?php } ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit',	'type'=>'primary','label'=>$model->isNewRecord ? 'Створити' : 'Зберегти')); ?>
<?php $this->endWidget(); ?>
</div>
<script src="/js/ckeditor/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'editor' ,
    {
        height : 800
    });
</script>
