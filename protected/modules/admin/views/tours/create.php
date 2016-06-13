<?php
$this->menu=array(
	array('label'=>'Управление турами', 'url'=>array('/admin/tours')),
);
?>

<h1>Добавление тура</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>