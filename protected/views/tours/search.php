<?php
$this->pageTitle=Yii::t('yii','Tours');
$this->breadcrumbs = array(
    Yii::t('yii','Main')=> Yii::app()->homeUrl,
    Yii::t('yii','Search tours'),
);
?>
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="tour-block">
                <h3><?=Yii::t('yii', 'Selection tours')?></h3>
                <form method="GET" name="search_tours" id="search_tours" action="/tours/search/">

                    <?php $this->widget('application.components.widgets.ToursFilter'); ?>
                    <br />
                    <button class="btn btn-block" onclick="return do_search_tours();"><?=Yii::t('yii', 'show offers')?></button>
                </form>
            </div>
        </div>
        <div class="col-lg-8 col-md-8">
            <div class="row">
                <div class="col-sm-12">
                    <?php
                    $this->widget('ext.bootstrap.widgets.TbListView', array(
                        'dataProvider'=>$tours,
                        'itemView'=>'_search',

                        'template'=>"{items}\n{pager}<br/>",
                        'pager' => array(
                            'firstPageLabel'=>'<<',
                            'prevPageLabel'=>'<span><</span>',
                            'nextPageLabel'=>'<span>></span>',
                            'lastPageLabel'=>'>>',
                            'nextPageCssClass'=>'_next',
                            'previousPageCssClass'=>'_prev',
                            'maxButtonCount'=>'10',
                            'header'=> false,
                        ),
                        'ajaxUpdate'=>false,
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>