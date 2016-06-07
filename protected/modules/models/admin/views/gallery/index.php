<?php 
Yii::app()->clientScript->registerScript('search', "
function del(obj,id){
	if(!confirm('Вы уверены, что хотите удалить альбом?')) return false;
	$.ajax({
		type: 'POST',
		url: '/admin/gallery/deletealbum/',
        data: 'name='+id,
		success: function(data){ 
            $(obj).parent().parent().remove();
            console.log(data);
		}
	});
   return false;
}
", CClientScript::POS_HEAD);
if(Yii::app()->user->hasFlash('flash'))
    $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array(
            'flash'=>array('block'=>true, 'closeText'=>'&times;'),
        ),
    ));
?>
<ul class="album">
<?php 
foreach($files as $key=>$value)
    echo '<li class="li"><span class="title"><img src="/css/images/delete.png" onclick="del(this,\''.$key.'\')">'.
    CHtml::link($value['title'].'</span>'.
    CHtml::image($value['thumb']),$this->createUrl('gallery/viewAlbum', array('id'=>$key))).
    '</li>'; 
?>
</ul>
<a href="/admin/gallery/addAlbum">Добавить альбом</a>