<?php
$this->menu=array(
	array('label'=>'Управление странами', 'url'=>array('/admin/countries')),
	array('label'=>'Добавление страны', 'url'=>array('create')),
);
?>

<h1>Редактирование "<?php echo $model->name; ?>"</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>