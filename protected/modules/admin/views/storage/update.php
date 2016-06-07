<?php
$this->menu=array(
	array('label'=>'Управление ключами', 'url'=>array('/admin/storage')),
	array('label'=>'Создание ключа', 'url'=>array('/admin/storage/create')),
);
?>

<h1>Редактирование ключа "<?php echo $model->key; ?>"</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>