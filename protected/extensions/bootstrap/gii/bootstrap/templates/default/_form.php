<?php 
echo "<?php 
\$form=\$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'".$this->class2id($this->modelClass)."-form',
	'enableAjaxValidation'=>false,
));\n"; 
echo "echo \$form->errorSummary(\$model);\n?>\n"; ?>
    <fieldset>
        <legend><?php echo "<?php echo \$model->isNewRecord ? 'Создание ' : 'Редактирование '; ?>";?></legend>
<?php
echo "      <?php \n";
foreach($this->tableSchema->columns as $column)
{
	if($column->autoIncrement)
		continue;
    echo "          echo ".$this->generateActiveRow($this->modelClass,$column).";\n";
}
echo "      ?>\n";
?>
    </fieldset>
	<div class="form-actions">
		<?php echo "<?php \$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>\$model->isNewRecord ? 'Создать' : 'Сохранить',
		)); ?>\n"; ?>
	</div>
<?php echo "<?php \$this->endWidget(); ?>\n"; ?>
