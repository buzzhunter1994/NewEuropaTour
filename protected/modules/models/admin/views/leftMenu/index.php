<?php
$this->menu=array(
	array('label'=>'Создание пункта меню', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$('#left-menu-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление пунктами левого меню</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'left-menu-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
            'name'=>'id', 
            'htmlOptions'=>array('style'=>'width: 30px')
        ),
        array(
            'name'=>'parent_id', 
            'filter'=>LeftMenu::buildArrayDropDown(),
            'htmlOptions'=>array('style'=>'width: 30px'),
            'header'=>'Родитель',
        ),
 
         array(        
            'name'=>'url', 
            'value' => '$data->url ? CHtml::link($data->url, $data->url,array("target"=>"_blank")) : ""',
            'type' => 'html',
            'header'=>'Ссылка',
            'filter'=>'',
        ),
		array(
            'name'=>'title',
            'header'=>'Заголовок'
        ),
        array(
            'name'=>'order_by', 
            'header'=>'Сортировка',
            'htmlOptions'=>array('style'=>'width: 55px')
        ),

         array(
            'class'=>'DToggleColumn',
            // атрибут модели
            'name'=>'blank',
            // заголовок столбца
            'header'=>'Цель',
            // ссылка для переключения состояния
            // если не указать, то автоматически сгенерируется такая же ссылка по умолчанию
            'linkUrl'=>'Yii::app()->controller->createUrl("toggle", array("id"=>$data->id, "attribute"=>"blank"))',
            'onImageUrl' => Yii::app()->request->baseUrl . '/css/images/yes.png',
            'offImageUrl' => Yii::app()->request->baseUrl . '/css/blank.gif',
            // запрос подтвердждения (если нужен)
            'confirmation'=>'Изменить статус ссылки?',
            // фильтр
            'filter'=>array(1=>'Новое окно', 0=>'Текущее окно'),
            // alt для иконок (так как отличается от стандартного)
            'titles'=>array(1=>'Новое окно', 0=>'Текущее окно'),           
            'htmlOptions'=>array('style'=>'width:30px'),
        ),  
		array(
			'class'=>'CButtonColumn',
            'template' => '{delete}{update}',
		),
	),
)); ?>
