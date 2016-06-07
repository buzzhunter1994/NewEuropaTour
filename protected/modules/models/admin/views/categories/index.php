<?php
$this->menu=array(
	array('label'=>'Создание категорий', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$('#categories-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление категориями</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'categories-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
            'name'=>'id', 
            'htmlOptions'=>array('style'=>'width: 30px')
        ),
        array(
            'name'=>'catg', 
            'htmlOptions'=>array('style'=>'width: 100px')
        ),
		'name',
		array(
			'class'=>'CButtonColumn',
            'template' => '{delete}{update}',
		),
	),
)); ?>
