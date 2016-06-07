<?php
$this->menu=array(
	array('label'=>'Создание пункта меню', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$('#main-menu-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление пунктами главного меню</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'main-menu-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
            'name'=>'id', 
            'htmlOptions'=>array('style'=>'width: 30px')
        ),
          array(        
            'name'=>'url',           //CHtml::link($data->url, $data->url, array('target'=>'_blank'))
            'value' => '$data->url ? CHtml::link($data->url, $data->url, array(\'target\'=>\'_blank\')) : ""',
            'type' => 'html',
            'filter'=>'',
        ),
		'name',
        array(
            'name'=>'order', 
            'htmlOptions'=>array('style'=>'width: 55px')
        ),
		array(
			'class'=>'CButtonColumn',
            'template' => '{delete}{update}',
		),
	),
)); ?>
