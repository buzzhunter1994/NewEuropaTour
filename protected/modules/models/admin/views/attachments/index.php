<?php
$this->menu=array(
	array('label'=>'Создание вложения', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$('#attachments-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление вложениями</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'attachments-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
            'name'=>'id', 
            'htmlOptions'=>array('style'=>'width: 30px')
        ),
        array(        
            'name'=>'name', 
            'value' => '$data->name ? CHtml::link(CHtml::image("/images/upload/thumbs/" . $data->name,"",array("width"=>"50")), Yii::app()->controller->createUrl("update", array("id" => $data->id))) : ""',
            'type' => 'html',
            'filter'=>'',
        ),
        array(
            'name'=>'post_id', 
            'htmlOptions'=>array('style'=>'width: 500px'),
            'value' => '$data->post->title',
            'filter'=>Posts::buildArrayDropDown(),
        ),
		array(
			'class'=>'CButtonColumn',
            'template' => '{delete}{update}',
		),
	),
)); ?>
