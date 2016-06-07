<?php
$this->menu=array(
	array('label'=>'Управление учителями', 'url'=>array('/admin/users')),
);
?>

<h1>Добавление учителя</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>