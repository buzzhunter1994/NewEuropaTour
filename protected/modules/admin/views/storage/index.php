<?php
$this->menu=array(
	array('label'=>'Создание ключа', 'url'=>array('create')),
);
//Yii::app()->clientScript->registerCssFile('/css/styles.css');

?>

<h1>Хранилище данных (Ключ => значение)</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'storage-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'pager' => array(
        'cssFile'=>'/css/pager.css',
        'firstPageLabel'=>'<<',
        'prevPageLabel'=>'<span>Следующая</span>',
        'nextPageLabel'=>'<span>Предыдущая</span>',
        'lastPageLabel'=>'>>',
        'nextPageCssClass'=>'_next',
        'previousPageCssClass'=>'_prev',
        'maxButtonCount'=>'10',           
    ), 
    
   //'cssFile'=>'/css/list.css',
       // 'ajaxUpdate'=>false,
	'columns'=>array(
        array(
            'name' => 'key',            
            'htmlOptions'=>array('style'=>'width: 170px')
        ),
        array(
            'name'=>'value', 
            'value' => 'strlen(CHtml::encode($data->value))>=71?substr(CHtml::encode($data->value),0,70)."...":CHtml::encode($data->value)'
        ),
		array(
			'class'=>'CButtonColumn',
            'template' => '{update}{delete}',
            'htmlOptions'=>array('style'=>'text-align: center;')
		),
	),
)); ?>