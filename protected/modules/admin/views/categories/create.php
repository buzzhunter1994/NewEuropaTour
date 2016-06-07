<h1>Створення категорії</h1>
<?php
$this->menu=array(
	array('label'=>'Управління категоріями', 'url'=>array('/admin/categories')),
);
$this->pageTitle = 'Створення категорії';
$this->renderPartial('_form', array('model'=>$model)); ?>