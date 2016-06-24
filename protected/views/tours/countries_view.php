<?php
$this->pageTitle = $country->title;
$this->breadcrumbs = array(
    Yii::t('yii','Main')=> Yii::app()->homeUrl,
    Yii::t('yii','Tours') => array('/tours'),
    Yii::t('yii','Countries') => array('/tours/countries'),
    $country->name
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
                    <div class="countryDesc searchTourResults clearfix">
                        <h2 class="styled-header"><?=$country->name?></h2>
                        <img src="/images/herbs/<?=$country->short_name?>.gif" border="0" align="right" alt="<?=$country->name?>">

                        <?=$country->description?>
                    </div>
                </div>
            </div>
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