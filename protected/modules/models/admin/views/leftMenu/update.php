<?php
$this->menu=array(
	array('label'=>'Управление пунктами левого меню', 'url'=>array('/admin/LeftMenu')),
	array('label'=>'Создание пункта меню', 'url'=>array('/admin/LeftMenu/create')),
);
?>

<h1>Редактирование пункта меню <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>