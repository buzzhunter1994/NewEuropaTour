<?php
$this->menu=array(
	array('label'=>'Управление пунктами главного меню', 'url'=>array('/admin/MainMenu')),
	array('label'=>'Создание пункта меню', 'url'=>array('/admin/MainMenu/create')),
);
?>

<h1>Редактирование пункта меню <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>