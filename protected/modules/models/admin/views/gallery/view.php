<?php 
Yii::app()->clientScript->registerScript('search', "
$(document).ready(function(){
    $('.fancybox').fancybox();
});
function del(obj,img,thumb){
	if(!confirm('Ви впевнені, що хочете видалити фото?')) return false;
	$.ajax({
		type: 'POST',
		url: '/admin/gallery/deletephoto/',
        data: 'img='+img+'&thumb='+thumb,
		success: function(data){ 
            $(obj).parent().parent().remove();
            console.log(data);
		}
	});
   return false;
}
function rename(id,name){
	if(!confirm('Вы уверени, что хотите изменить название альбома на \''+name+'\'?')) return false;
    $.ajax({
		type: 'POST',
		url: '/admin/gallery/rename/',
        data: 'id='+id+'&newname='+name,
		success: function(data){ 
            alert(data);
		}
	});
   return false;
}
", CClientScript::POS_HEAD);
echo '<a href="/admin/gallery">Назад</a>
<ul class="album">';
foreach($images as $image)
{
    $thumb_image = dirname($image).DIRECTORY_SEPARATOR.'thumbs'.DIRECTORY_SEPARATOR.basename($image);
    echo "
    <li>
        <a href=\"/images/gallery$image\" class=\"fancybox\" title=\"\" target=\"_blank\" data-fancybox-group=\"gallery\">
            <img src=\"/images/gallery$thumb_image\" width=\"144\"/>
        </a>
        <span class=\"title\">
            <img src=\"/css/images/delete.png\" onclick='del(this,\"".$image."\",\"".$thumb_image."\")'>
        </span>
    </li>";
}
echo "</ul><br/>
<input type=\"text\" value=\"$title\" id=\"title\">
 <a href=\"#\" onclick=\"return rename('$id',$('#title').val())\">Изменить название</a>
<br /><br /> Добавить фото: ";
 $this->widget('application.extensions.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadFile',
        'config'=>array(
               'action'=>Yii::app()->createUrl('/admin/gallery/upload/id/'.$id),
               'allowedExtensions'=>array("jpg","jpeg"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>10*1024*1024,
               'multiple'=>true,
               'onComplete'=>"js:
               function(id, fileName, responseJSON){
                console.log( responseJSON.converted);
                  $('.album').append(
                    '<li>'+
                        '<a href=\"/images/gallery/'+responseJSON.img+'\" class=\"fancybox\" title=\"\" target=\"_blank\" data-fancybox-group=\"gallery\">'+
                           ' <img src=\"/images/gallery/'+responseJSON.thumb+'\" width=\"144\">'+
                        '</a>'+
                        '<span class=\"title\">'+
                            '<img src=\"/css/images/delete.png\" onclick=\"del(this,\''+responseJSON.img+'\',\''+responseJSON.thumb+'\')\">'+
                        '</span>'+
                    '</li>');
                
                }",
        )
));
 ?>
