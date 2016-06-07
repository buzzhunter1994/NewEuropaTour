<?php

$this->menu=array(
	array('label'=>'Управление ключами', 'url'=>array('/admin/storage')),
);
?>

<h1>Создание ключа</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>