<?php
$this->pageTitle='Страны';
$this->breadcrumbs = array(
    'Главная'=> Yii::app()->homeUrl,
    'Туры' => array('/tours'),
    'Страны'
);
?>
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="tour-block">
                <header><h3>Подбор туров</h3></header>
                <form method="GET" name="search_tours" id="search_tours" action="/tours/search/">
                    <input type="hidden" name="sort" id="sort" value="date">
                    <?php $this->widget('application.components.widgets.ToursFilter'); ?>
                    <br />
                    <button class="btn btn-block">показать предложения</button>
                </form>
            </div>
        </div>
        <div class="col-lg-8 col-md-8">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="styled-header">Все страны</h2>
                    <div class="listOfCountries">
                        <ul class="list-with-gap clearfix">
                            <?php
                            foreach ($countries as $country) {
                                $tour_count = $country->toursCount . Yii::t('yii', ' tour| tours', $country->toursCount);
                                print "<li><a href='/country/{$country->short_name}/'><img width='16' height='16' border='0' src='/css/flags/{$country->iso}.png' alt='{$country->name}' title='{$country->name}'>{$country->name} ({$tour_count})</a></li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>