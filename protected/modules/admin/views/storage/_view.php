<tr class="even">
    <td valign="top"><?php echo CHtml::encode($data->key) ?></td>
    <td><?php if (strlen(CHtml::encode($data->value))>=115) echo substr(CHtml::encode($data->value),0,115).'...'; else echo CHtml::encode($data->value); ?></td>
    <td width="40">
        <? echo CHtml::link('<img src="\css\images\update.png">',Yii::app()->controller->createUrl("update", array("id" => $data->id)),array('title'=>'Редактировать')) ?>
        &nbsp;
        <? echo CHtml::ajaxLink(
            '<img src="\css\images\delete.png">',
            Yii::app()->controller->createUrl("delete", array("id" => $data->id)),
            array(
                'type' => 'POST',// method
//                'data'=>array('update'=>TRUE),// DATA
                'beforeSend' => "function( request )
                    {
                        if (confirm('Впевнені що хочете це видалити?')) {
                            return true;
                        } else {
                            return false;
                        }
                    }",
                'update' => 'html',// что обновить :)
            ),
array('title'=>'Удалить')) ?>
    </td>
</tr>