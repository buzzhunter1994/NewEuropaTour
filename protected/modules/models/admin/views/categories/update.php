<?php
$this->menu=array(
	array('label'=>'Управление категориями', 'url'=>array('/admin/categories')),
	array('label'=>'Создание категории', 'url'=>array('create')),
);
?>

<h1>Редактирование категории "<?php echo $model->name; ?>"</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>