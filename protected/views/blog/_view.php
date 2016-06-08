<div class="news-item">
	<h3><?php echo CHtml::encode($data->title);?></h3>
	<div class="news-item-inner">
        <?php echo $data->text;?>
    </div>
    <a href="/post/<?php echo CHtml::encode($data->url);?>" class="detail-link"><span></span><?php echo Yii::t('yii', 'details');?></a>
</div>