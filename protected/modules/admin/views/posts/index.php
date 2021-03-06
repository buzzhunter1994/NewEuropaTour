<h1>Управление статьями</h1>
<?php 
$this->menu=array(
	array('label'=>'Создание статьи', 'url'=>array('create')),
);
$this->pageTitle = 'Управление статтями';
$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'posts-grid',
    'type'=>'striped bordered condensed hover',
    'template'=>'{pager}{summary}{items}{pager}',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		array('name'=>'id','htmlOptions'=>array('style'=>'width: 40px')),
        array( 
              'class' => 'editable.EditableColumn',
              'name' => 'title',
              'editable' => array(
                  'type'     => 'text',
                  'url'      => $this->createUrl('posts/updater'),
                  'placement'  => 'right',
              )
         ),
        array(
            'class'=>'DToggleColumn',
            'name'=>'is_news',
            'linkUrl'=>'Yii::app()->controller->createUrl("toggle", array("id"=>$data->id, "attribute"=>"is_news"))',
            'onImageUrl' => Yii::app()->request->baseUrl . '/css/images/yes.png',
            'offImageUrl' => Yii::app()->request->baseUrl . '/css/blank.gif',
            //'confirmation'=>'Изменить статус статьи?',
            'filter'=>array(1=>'Да', 0=>'Нет'),
            'titles'=>array(1=>'Да', 0=>'Нет'),           
        ),  
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{update}{delete}',
        ),
	),
));
?>
