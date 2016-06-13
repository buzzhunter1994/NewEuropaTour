<h1>Управление странами</h1>
<?php 
$this->menu=array(
	array('label'=>'Добавление страны', 'url'=>array('create')),
);
$this->pageTitle = 'Управление странами';
$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'countries-grid',
    'type'=>'striped bordered condensed hover',
    'template'=>'{pager}{summary}{items}{pager}',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		array('name'=>'id','htmlOptions'=>array('style'=>'width: 40px')),
        array( 
              'class' => 'editable.EditableColumn',
              'name' => 'name',
              'editable' => array(
                  'type'     => 'text',
                  'url'      => $this->createUrl('countries/updater'),
                  'placement'  => 'right',
              )
         ),
        array(
            'class' => 'editable.EditableColumn',
            'name' => 'title',
            'editable' => array(
                'type'     => 'text',
                'url'      => $this->createUrl('countries/updater'),
                'placement'  => 'bottom',
            )
        ),

        array(
            'class'=>'DToggleColumn',
            'name'=>'top',
            'linkUrl'=>'Yii::app()->controller->createUrl("toggle", array("id"=>$data->id, "attribute"=>"top"))',
            'onImageUrl' => Yii::app()->request->baseUrl . '/css/images/yes.png',
            'offImageUrl' => Yii::app()->request->baseUrl . '/css/blank.gif',
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
