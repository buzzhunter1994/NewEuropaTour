<?php
$this->pageTitle=$tour->country->name .': '. $tour->title .' '. $tour->route;
$this->breadcrumbs = array(
    Yii::t('yii','Main')=> Yii::app()->homeUrl,
    Yii::t('yii','Tours') => array('/tours'),
    $tour->country->name => array('/tours/countries/'.$tour->country->short_name),
    $tour->title
);
$tourType = "";
switch($tour->type){
case 'bus':
    $tourType = '<div class="icon iconBus"></div>';
    break;
case 'air':
    $tourType = '<div class="icon iconAir"></div>';
    break;
case 'train':
    $tourType = '<div class="icon iconTrain"></div>';
    break;
case 'liner':
    $tourType = '<div class="icon iconLiner"></div>';
    break;
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="sampleTour">
                <div class="descriptionCol">
                    <div class="caption">
                        <h1>
                            <?=$tour->title?>
                            &nbsp;<small><?=$tour->days?></small>
                        </h1>
                        <? if ($tour->price) {?>
                        <div class="price">
                            <span><strong data-content="<?=Currency::convert($tour->price)?> (<?=Currency::format($tour->price)?>)"><?=Currency::convert($tour->price)?></strong></span>&lt;
                        </div>
                        <? } ?>
                    </div>
                    <div class="route"><?=$tour->route?></div>
                    <?=$tourType?>
                    </div>
                <div class="tagsBox clearfix">
                    <div class="part">
                        <em>Тематика тура:</em>
                        <span class="label label-tag"><?=$tour->theme->name?></span>
                    </div>
                    <div class="part">
                        <em>Страна тура:</em>
                        <span class="label-tag-container">
                            <span class="label label-tag"><?=$tour->country->name?></span>
                        </span>
                    </div>
                    <?
                    /*
                    <div class="part">
                        <span class="takeMap"><i class="fa fa-file-text-o"></i><a class="dashed" href="#" id="countryDocsOpen">Документы для открытия визы</a></span> <a href="tourist/multivizy/" class="red">возможность получения мультивизы</a>
                    </div>
                    */
                    ?>
                </div>
                <?
                if ($tour->trips){
                ?>
                <div class="bookingTable fastBookingTable" id="bookingTable">
                    <table class="table table-condensed table-hover">
                        <thead>
                        <tr class="header">
                            <th></th>
                            <th>Даты заездов</th>
                            <th>Наличие мест</th>
                            <th class="desc">Описание</th>
                            <th>Базовая цена</th>
                            <th class="printhide"></th>
                        </tr>
                        </thead>

                        <tbody>

                        <?
                            foreach($tour->trips as $trip)
                            {
                                $freeSeats = $trip->freeSeatsCount();
                                $selfDate = $trip->selfDate();
                                $seats_count = $freeSeats . Yii::t('yii', ' seat| seats', $freeSeats);
                                if ($trip->freeSeatsCount() == 0)
                                    $lastFree = ' class="noFree"';
                                elseif($trip->freeSeatsCount() < 20)
                                    $lastFree = ' class="lastFree"';
                                else
                                    $lastFree = '';
                                ?>
                                <tr<?=$lastFree?>>
                                    <td></td>
                                    <td><span class="hidden-label">Дата заезда:</span><?=$selfDate?></td>
                                    <td class="space"><span class="hidden-label">Места:</span><a href="#" class="places dashed-green" data-toggle="modal" data-url="/tours/bus/id/<?=$trip->id?>" title="Показать наличие мест"><?=$seats_count?></a></td>
                                    <td class="desc"><span class="hidden-label">Описание:</span>
                                        <?=$trip->description?>
                                    </td>
                                    <td class="price"><span class="hidden-label">Цена:</span>
                                        <span data-toggle="tooltip" data-placement="top" title="<?=Currency::convert($trip->price)?> (<?=Currency::format($trip->price)?>)"><?=Currency::convert($trip->price)?></span>
                                    </td>
                                    <td class="printhide"><a class="btn-yellow btn-block" href="/tours/order/id/<?=$trip->id?>">Заказать тур</a></td>
                                </tr>
                                <? }?>
                        </tbody>
                    </table>
                </div>
                <?}
                else
                print "<div class=\"scheduler\"><div class=\"alert alert-warning\"><p>Внимание! На данный момент отсутствуют запланированные заезды для данного тура.</p></div></div>";
                ?>
                <div class="scheduler">
                    <h2>Программа автобусного тура</h2>
                <?=$tour->program?>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="menuBlock lColPayment">
                <h4>Оплата</h4>
                <div class="contentBox">
                    <p>Если Вы не планируете приходить в офис, оставьте соответствующий комментарий в заявке, и мы вышлем все необходимые документы на email.</p>
                    <p style="text-align:center;"><strong>Подробнее о <a href="/payment/">способах оплаты</a>.</strong></p>
                </div>
                <h4>Курсы валют</h4>
                <div class="contentBox">
                    <p>Актуальные курсы валют в расчетах:<br>Доллар: <strong class="red">65,44</strong> руб.</p>
                </div>
            </div>
        </div>
    </div>
</div>