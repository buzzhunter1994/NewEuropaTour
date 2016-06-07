<?php
$this->menu=array(
	array('label'=>'Управление категориями', 'url'=>array('/admin/categories')),
);
?>
<h1>Создание категории</h1>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>