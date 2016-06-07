<?php
$this->menu=array(
	array('label'=>'Управление статьями', 'url'=>array('/admin/posts')),
	array('label'=>'Создание статьи', 'url'=>array('create')),
);
?>

<h1>Редактирование статьи "<?php echo $model->title; ?>"</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'post_id'=>$post_id)); ?>