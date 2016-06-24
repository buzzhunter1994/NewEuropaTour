<?php
$this->pageTitle=Yii::t('yii','Countries');
$this->breadcrumbs = array(
    Yii::t('yii','Main')=> Yii::app()->homeUrl,
    Yii::t('yii','Tours') => array('/tours'),
    Yii::t('yii','Countries')
);
?>
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="tour-block">
                <header><h3><?=Yii::t('yii', 'Selection tours')?></h3></header>
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
                    <h2 class="styled-header"><?=Yii::t('yii', 'All countries')?></h2>
                    <div class="listOfCountries">
                        <ul class="list-with-gap clearfix">
                            <?php
                            foreach ($countries as $country) {
                                $tour_count = $country->toursCount . Yii::t('yii', ' tour| tours', $country->toursCount);
                                print "<li><a href='/tours/countries/{$country->short_name}/'><img width='16' height='16' border='0' src='/css/flags/{$country->iso}.png' alt='{$country->name}' title='{$country->name}'>{$country->name} ({$tour_count})</a></li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>