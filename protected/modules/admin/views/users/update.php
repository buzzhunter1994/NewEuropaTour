<?php
$this->menu=array(
	array('label'=>'Управление учителями', 'url'=>array('/admin/users')),
	array('label'=>'Добавление учителя', 'url'=>array('/admin/users/create')),
);
?>
<h1>Редактирование "<?php echo $model->name; ?>"</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>