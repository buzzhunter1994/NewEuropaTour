<?php
$this->pageTitle=Yii::t('yii','News');
$this->breadcrumbs = array(
    Yii::t('yii','Main')=> Yii::app()->homeUrl,
    Yii::t('yii','News'),
);
?>
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-4">
            <div class="tour-block">
                <header><h3><?=Yii::t('yii','Selection tours')?></h3></header>
                <form method="GET" name="search_tours" id="search_tours" action="/tours/search/">
                    <?php $this->widget('application.components.widgets.ToursFilter'); ?>
                    <br />
                    <button class="btn btn-block"><?=Yii::t('yii','show offers')?></button>
               </form>
            </div>
        </div>
        <div class="col-lg-9 col-md-8 ">
            <h2><?=Yii::t('yii','News')?></h2>
            <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$dataProvider,
                'itemView'=>'_view',
                'template'=>"{items}\n{pager}<br/>",
                'pager' => array(
                    'cssFile'=>'/css/pager.css',
                    'firstPageLabel'=>'<<',
                    'prevPageLabel'=>'<span><</span>',
                    'nextPageLabel'=>'<span>></span>',
                    'lastPageLabel'=>'>>',
                    'nextPageCssClass'=>'_next',
                    'previousPageCssClass'=>'_prev',
                    'maxButtonCount'=>'10',
                ),
                'cssFile'=>'/css/list.css',
                'ajaxUpdate'=>false,
            ));
            ?>
        </div>
    </div>

</div>
