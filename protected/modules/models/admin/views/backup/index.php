<?php 
$this->menu=array(
	array('label'=>'Создание backup', 'url'=>array('create')),
);
if(Yii::app()->user->hasFlash('flash')){
    $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array(
            'flash'=>array('block'=>true, 'closeText'=>'&times;'),
        ),
    ));
}
Yii::app()->clientScript->registerCssFile('\css\styles.css');
if (!empty($backups))
{
echo '
<div class="grid-view">
    <table class="items">
        <thead>
            <tr>
                <th>Название бэкапа</th>
                <th class="button-column">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
'; 
    foreach($backups as $backup) 
    echo "<tr class='even'>
            <td><b>$backup</b></td>
            <td width='65'>
                <a href=\"\\backup\\$backup\" title=\"Загрузить\"><img src=\"\\css\\images\\save.png\"></a>
                &nbsp;
                <a href=\"\\admin\\backup\\restore\\$backup\" title=\"Восстановить\"><img src=\"\\css\\images\\restore.png\"></a>
                &nbsp;
                <a href=\"\\admin\\backup\\delete\\$backup\" title=\"Удалить\"><img src=\"\\css\\images\\delete.png\"></a>
            </td>
        </tr>";
    echo '</tbody></table></div>';
} 
else echo '<div class="alert in alert-block">Бэкапы отсутствуют</div>';
?>