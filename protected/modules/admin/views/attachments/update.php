<?php
$this->menu=array(
	array('label'=>'Управление вложениями', 'url'=>array('/admin/attachments')),
	array('label'=>'Создание вложения', 'url'=>array('create')),
);
?>

<h1>Управление вложения <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>