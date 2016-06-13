<h1>Управление турами</h1>
<?php 
$this->menu=array(
	array('label'=>'Добавление тура', 'url'=>array('create')),
);
$this->pageTitle = 'Управление турами';
$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'tours-grid',
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
                  'url'      => $this->createUrl('countries/updater'),
                  'placement'  => 'right',
              )
         ),
        array(
            'class' => 'editable.EditableColumn',
            'name' => 'days',
            'editable' => array(
                'type'     => 'text',
                'url'      => $this->createUrl('countries/updater'),
                'placement'  => 'bottom',
            )
        ),
        array(
            'class' => 'editable.EditableColumn',
            'name' => 'route',
            'editable' => array(
                'type'     => 'text',
                'url'      => $this->createUrl('countries/updater'),
                'placement'  => 'bottom',
            )
        ),
        array(
            'class' => 'editable.EditableColumn',
            'name' => 'price',
            'editable' => array(
                'type'     => 'text',
                'url'      => $this->createUrl('countries/updater'),
                'placement'  => 'left',
            )
        ),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{update}{delete}',
        ),
	),
));
?>
