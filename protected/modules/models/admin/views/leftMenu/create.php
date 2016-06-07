<?php

$this->menu=array(
	array('label'=>'Управление пунктами левого меню', 'url'=>array('/admin/LeftMenu')),
);
?>

<h1>Создание пункта левого меню</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>