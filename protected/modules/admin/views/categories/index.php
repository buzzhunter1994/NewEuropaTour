<h1>Управління категоріями</h1>
<?php
$this->menu=array(
	array('label'=>'Створення категорії', 'url'=>array('create')),
);
$this->pageTitle = 'Управління категоріями';
$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'categories-grid',
    'type'=>'striped bordered condensed hover',
    'template'=>'{pager}{summary}{items}{pager}',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
        array('name'=>'id','htmlOptions'=>array('style'=>'width: 40px')),
        array( 
            'class' => 'editable.EditableColumn',         
            'name' => 'parent_id',
            'header'=>'#',
            'editable' => array(
                'type'     => 'select',
                'url'      => $this->createUrl('categories/updater'),
                'source'   => Categories::buildArrayDropDown()
            )
        ),
        array( 
              'class' => 'editable.EditableColumn',         
              'name' => 'catg',
              'editable' => array(
                  'type'     => 'text',
                  'url'      => $this->createUrl('categories/updater'),
              )
        ),
        array( 
              'class' => 'editable.EditableColumn',        
              'name' => 'name',
              'editable' => array(
                  'type'     => 'text',
                  'url'      => $this->createUrl('categories/updater'),
              )
        ),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{update}{delete}',
        ),
	),
));
?>
