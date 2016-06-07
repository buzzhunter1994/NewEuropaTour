<?php
$this->menu=array(
	array('label'=>'Управление статьями', 'url'=>array('/admin/posts')),
);
?>

<h1>Создание статьи</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>