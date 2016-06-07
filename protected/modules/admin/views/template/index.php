<script>
    function save(){
        $.ajax({
            'url':'/admin/template/rewrite',
            'type':'POST',
            'data':{'content':editor.getValue()},
            'success':function(data){
                alert(data);
            }
        })
    }
</script>
<h1>Редактирование шаблона</h1>
<textarea style="width: 100%; height: 600px;"><?php echo $file_main ?></textarea>


<br />
<button type="button" class="button button_big" onclick="save()">Сохранить</button>