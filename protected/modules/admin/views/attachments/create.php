<?php
$this->menu=array(
	array('label'=>'Управление вложениями', 'url'=>array('/admin/attachments')),
);
?>

<h1>Создание вложения</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>