<?php
$this->menu=array(
	array('label'=>'Добавление учителя', 'url'=>array('create')),
);

?>

<h1>Управление Users</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
            'name'=>'id', 
            'htmlOptions'=>array('style'=>'width: 30px')
        ),
		'name',
		'pos',
		array(
			'class'=>'CButtonColumn',
            		'template' => '{delete}{update}',
		),
	),
)); ?>
