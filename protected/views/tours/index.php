<?php
$this->pageTitle='Туры';
$this->breadcrumbs = array(
    'Главная'=> Yii::app()->homeUrl,
    'Туры',
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
                <div class="col-xxs-12 col-xs-6 col-sm-6">
                    <div class="menuBlock pageMenuBlock">
                        <a href="/tours/bus/"><img src="/images/busTour.jpg" alt=""></a>
                        <h4><a href="/tours/bus/">Автобусом в Европу</a></h4>
                        <ul>
                            <li><a href="/tours/bus/graf/"><i class="icon-viArrow"></i><span>График туров</span></a></li>
                            <li><a href="/tourist/info/"><i class="icon-viArrow"></i><span>Информация об отправке</span></a></li>
                            <li><a href="/tours/vid/sea/bus/"><i class="icon-viArrow"></i><span>Отдых на море</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xxs-12 col-xs-6 col-sm-6">
                    <div class="menuBlock pageMenuBlock">
                        <a href="/ukraine/uatours/"><img src="/images/Ukraine.jpg" alt=""></a>
                        <h4><a href="/ukraine/uatours/">Украина</a></h4>
                        <ul>
                            <li><a href="/ukraine/uatours/"><i class="icon-viArrow"></i><span>Туры по Украине</span></a></li>
                            <li><a href="/ukraine/ex/"><i class="icon-viArrow"></i><span>Экскурсии</span></a></li>
                            <li><a href="/ukraine/accomod/hotels/"><i class="icon-viArrow"></i><span>Гостиницы</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-7">
                    <h2 class="styled-header">Туры по странам</h2>
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
                <div class="col-md-12 col-lg-5">
                    <h2 class="styled-header">Туры по тематике</h2>
                    <div class="listOfCountries">
                        <ul>
                            <?php
                            foreach ($tourThemes as $tourTheme) {
                                $tour_count = $tourTheme->toursCount . Yii::t('yii', ' tour| tours', $tourTheme->toursCount);
                                print "<li><a href='/tours/theme/{$tourTheme->theme}/'>{$tourTheme->name} ({$tour_count})</a></li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>