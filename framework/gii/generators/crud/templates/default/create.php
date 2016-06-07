<?php echo "<?php\n"; 
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Создание',
);\n";
?>

$this->menu=array(
	array('label'=>'Управление <?php echo $this->modelClass; ?>', 'url'=>array('/admin/<?php echo $this->modelClass; ?>')),
);
?>

<h1>Создание <?php echo $this->modelClass; ?></h1>

<?php echo "<?php \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
