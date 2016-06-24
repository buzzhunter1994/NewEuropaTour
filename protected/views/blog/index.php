<?php
$this->pageTitle=Yii::t('yii','Blog');
$this->breadcrumbs = array(
    Yii::t('yii','Main')=> Yii::app()->homeUrl,
    Yii::t('yii','Blog'),
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

            <h2><?=Yii::t('yii','Blog')?></h2>
            <?php
            $this->widget('ext.bootstrap.widgets.TbListView', array(
                'dataProvider'=>$dataProvider,
                'itemView'=>'_view',

                'template'=>"{items}\n{pager}<br/>",
                'pager' => array(
                    //'cssFile'=>'/css/pager.css',
                    'firstPageLabel'=>'<<',
                    'prevPageLabel'=>'<span><</span>',
                    'nextPageLabel'=>'<span>></span>',
                    'lastPageLabel'=>'>>',
                    'nextPageCssClass'=>'_next',
                    'previousPageCssClass'=>'_prev',
                    'maxButtonCount'=>'10',
                    'header'=> false,
                ),
                //'cssFile'=>'/css/list.css',
                'ajaxUpdate'=>false,
            ));
            ?>
        </div>
    </div>

</div>
