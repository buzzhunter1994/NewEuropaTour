<?php
$this->menu=array(
	array('label'=>'Управление странами', 'url'=>array('/admin/countries')),
);
?>

<h1>Добавление страны</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>