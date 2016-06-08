<?php
$this->pageTitle = CHtml::encode($model->title) . ' | Блог';
?>
<div class="container">
    <div class="row">
        <div class="full-news-item">
            <h3><?php echo CHtml::encode($model->title);?></h3>
            <div class="news-item-inner">
                    <?php
                    if ($model->text){
                        echo $model->text;
                    } else {
                        echo Yii::t('yii', 'text missing');
                    }
                    ?>
            </div>
        </div>
    </div>
</div>