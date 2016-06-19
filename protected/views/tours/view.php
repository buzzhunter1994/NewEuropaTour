<?php
$this->pageTitle=$tour->country->name .': '. $tour->title .' '. $tour->route;
$this->breadcrumbs = array(
    'Главная'=> Yii::app()->homeUrl,
    'Туры' => array('/tours'),
    $tour->country->name => array('/country/'.$tour->country->short_name),
    $tour->title
);
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
                        <div class="price">
                            <span>от <strong class="woturusl" data-content="19&nbsp;632&nbsp;450&nbsp;руб. (€850)">19&nbsp;632&nbsp;450&nbsp;руб.</strong></span>&lt;
                        </div>
                    </div>
                    <div class="route"><?=$tour->route?></div>
                    <div class="icon iconBus"></div>
                </div>
                <div class="tagsBox clearfix">
                    <div class="part">
                        <em>Тематики тура:</em>
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
                            $freeSeats = count($trip->freeSeats());
                            $selfDate = $trip->selfDate();
                            $seats_count = $freeSeats . Yii::t('yii', ' seat| seats', $freeSeats);
                        ?>
                        <tr>
                            <td></td>
                            <td><span class="hidden-label">Дата заезда:</span><?=$selfDate?></td>
                            <td class="space"><span class="hidden-label">Места:</span><a href="#" class="places dashed-green" title="Показать наличие мест"><?=$seats_count?></a></td>
                            <td class="desc"><span class="hidden-label">Описание:</span>
                                <?=$trip->description?>
                            </td>
                            <td class="price"><span class="hidden-label">Цена:</span>
                                <span class="turusl" data-content="<?=$trip->price?>"><?=$trip->price?></span>
                            </td>
                            <td class="printhide"><a class="btn butn butnGreen butnSm" href="/tours/order/id/<?=$trip->id?>">Заказать тур</a></td>
                        </tr>
                        <? } ?>

                        </tbody>
                    </table>
                </div>
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
                    <p><strong>Купить тур сейчас можно не выходя из дома с картой (webpay) и в системе «Расчет»</strong></p>
                    <p>Если Вы не планируете приходить в офис, оставьте соответствующий комментарий в заявке, и мы вышлем все необходимые документы на email.</p>
                    <p><strong>Бронирование места в автобусе:</strong><br>Необходимо внести депозит в размере 1 млн. руб.</p>
                    <p style="text-align:center;"><strong>Подробнее о <a href="/payment/">способах оплаты</a>.</strong></p>
                </div>
                <h4>Курсы валют</h4>
                <div class="contentBox">
                    <p>Актуальные курсы валют в расчетах:<br>Евро:<strong class="red">23 097</strong> руб. <br>Доллар:<strong class="red">20 418</strong> руб.</p>
                </div>
            </div>
        </div>
    </div>
</div>