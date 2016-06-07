<?php echo "<?php\n"; ?>
<?php
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('admin/$this->modelClass'),
	'Редактирование',
);\n";
?>

$this->menu=array(
	array('label'=>'Управление <?php echo $this->modelClass; ?>', 'url'=>array('admin/<?php echo $this->modelClass; ?>')),
	array('label'=>'Создание <?php echo $this->modelClass; ?>', 'url'=>array('create')),
);
?>

<h1>Update <?php echo $this->modelClass." <?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>

<?php echo "<?php \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>