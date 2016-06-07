<h1>Управління статтями</h1>
<?php 
$this->menu=array(
	array('label'=>'Створення статті', 'url'=>array('create')),
);
$this->pageTitle = 'Управління статтями';
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
              'header'=>'Заголовок',
              'editable' => array(
                  'type'     => 'text',
                  'url'      => $this->createUrl('posts/updater'),
                  'placement'  => 'right',
              )
         ),
        array(
            'class'=>'DToggleColumn',
            'name'=>'is_news',
            'header'=>'Новина',
            'linkUrl'=>'Yii::app()->controller->createUrl("toggle", array("id"=>$data->id, "attribute"=>"is_news"))',
            'onImageUrl' => Yii::app()->request->baseUrl . '/css/images/yes.png',
            'offImageUrl' => Yii::app()->request->baseUrl . '/css/blank.gif',
            //'confirmation'=>'Изменить статус статьи?',
            'filter'=>array(1=>'Так', 0=>'Ні'),
            'titles'=>array(1=>'Так', 0=>'Ні'),           
        ),  
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{update}{delete}',
        ),
	),
));
?>
