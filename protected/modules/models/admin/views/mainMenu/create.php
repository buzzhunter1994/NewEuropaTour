<?php

$this->menu=array(
	array('label'=>'Управление пунктами главного меню', 'url'=>array('/admin/MainMenu')),
);
?>

<h1>Создание пункта главного меню</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>