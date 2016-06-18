<?php
$this->pageTitle='Туры';
$this->breadcrumbs = array(
    'Главная'=> Yii::app()->homeUrl,
    'Заказ тура',
);
?>
<div class="container">
    <form action="/tours/order/confirm/" method="post" id="fwork" onsubmit="return submit_input_data();">
        <input type="hidden" name="tour_id" id="tour_id" value="it3">
        <input type="hidden" name="trip_id" id="trip_id" value="f0744567">
        <input type="hidden" name="tour_bus" id="tour_bus" value="1">
        <input type="hidden" name="ordered_places" id="ordered_places" value="">
        <input type="hidden" name="users_ids" id="users_ids" value="">
        <input type="hidden" name="read_rules" id="read_rules" value="0">

        <div class="sampleTour">
        <div class="descriptionCol">
            <div class="caption">
                <div class="h-title">
                    <a href="/tours/it3.html"><span class="red"><?=$tour->code?> </span><?=$tour->title?></a>
                </div>
            </div>
            <div class="route" style="margin:0;"><?=$tour->route?></div>
            <div class="icon iconBus"></div>
            <div class="date clearfix">
                <em><?=$tour->days?></em>
            </div>
            <div class="date">
                <em>Дата заезда:</em> <span class="label label-date dateGreen">02.10 - 09.10.2016</span>
                <div class="dateSelectionBut" id="dateSelectionBut">Выбрать другую</div>
            </div>
            <div class="dateSelection" style="display: none;">
                <a href="/tours/order/?trip_id=d6b03d31" class="label label-date dateGreen" ref="#tematic" title="Свободных мест: 41">07.08 - 14.08.2016</a>
                <a href="/tours/order/?trip_id=c943b262" class="label label-date dateGreen" ref="#tematic" title="Свободных мест: 42">03.09 - 10.09.2016</a>
                <a href="/tours/order/?trip_id=c92422b7" class="label label-date dateGreen" ref="#tematic" title="Свободных мест: 45">23.09 - 30.09.2016</a>
                <a href="/tours/order/?trip_id=f0744567" class="label label-date dateGreen" ref="#tematic" title="Свободных мест: 45">02.10 - 09.10.2016</a>
                <a href="/tours/order/?trip_id=c27d8e30" class="label label-date dateGreen" ref="#tematic" title="Свободных мест: 45">23.10 - 30.10.2016</a>
                <a href="/tours/order/?trip_id=bb44fb2b" class="label label-date dateGreen" ref="#tematic" title="Свободных мест: 45">06.11 - 13.11.2016</a>
                <a href="/tours/order/?trip_id=d559cf53" class="label label-date dateGreen" ref="#tematic" title="Свободных мест: 45">03.01 - 10.01.2017</a>
            </div>
            <div class="date busPlaces clearfix">
                <em>Свободных мест в автобусе:</em><em>45</em>
            </div>
        </div>
    </div>

    <div class="bus-map">
        <h4>Выберите места в автобусе</h4>
        <style>
            .rowSeat.choice2{background-color:#87da80;cursor:pointer;}
            .rowSeat i{position:relative;top:6px;left:6px}
        </style>

        <!-- empty, booked, reserve, choice-->
        <div class="busWrapper">
            <div class="bus-scroll">
                <div class="bus clearfix">
                    <div class="busCol " id="row-13">
                        <div class="busRow rowSeat empty" id="13LW" title="Место свободно для бронирования"></div>
                        <div class="busRow rowSeat empty" id="13LI" title="Место свободно для бронирования"></div>
                        <div class="busRow  rowSeat empty" id="13M" title="Место свободно для бронирования"></div>

                        <div class="busRow rowSeat empty" id="13RI" title="Место свободно для бронирования"></div>
                        <div class="busRow rowSeat empty" id="13RW" title="Место свободно для бронирования"></div>
                    </div>

                    <div class="busCol " id="row-12">
                        <div class="busRow rowSeat empty" id="12LW" title="Место свободно для бронирования"></div>
                        <div class="busRow rowSeat empty" id="12LI" title="Место свободно для бронирования"></div>
                        <div class="busRow  rowNum" id="12M">12</div>

                        <div class="busRow rowSeat empty" id="12RI" title="Место свободно для бронирования"></div>
                        <div class="busRow rowSeat empty" id="12RW" title="Место свободно для бронирования"></div>
                    </div>

                    <div class="busCol " id="row-11">
                        <div class="busRow rowSeat empty" id="11LW" title="Место свободно для бронирования"></div>
                        <div class="busRow rowSeat empty" id="11LI" title="Место свободно для бронирования"></div>
                        <div class="busRow  rowNum" id="11M">11</div>

                        <div class="busRow rowSeat empty" id="11RI" title="Место свободно для бронирования"></div>
                        <div class="busRow rowSeat empty" id="11RW" title="Место свободно для бронирования"></div>
                    </div>

                    <div class="busCol " id="row-10">
                        <div class="busRow rowSeat empty" id="10LW" title="Место свободно для бронирования"></div>
                        <div class="busRow rowSeat empty" id="10LI" title="Место свободно для бронирования"></div>
                        <div class="busRow  rowNum" id="10M">10</div>

                        <div class="busRow rowSeat empty" id="10RI" title="Место свободно для бронирования"></div>
                        <div class="busRow rowSeat empty" id="10RW" title="Место свободно для бронирования"></div>
                    </div>

                    <div class="busCol " id="row-9">
                        <div class="busRow rowSeat empty" id="9LW" title="Место свободно для бронирования"></div>
                        <div class="busRow rowSeat empty" id="9LI" title="Место свободно для бронирования"></div>
                        <div class="busRow  rowNum" id="9M">9</div>

                        <div class="busRow rowSeat empty" id="9RI" title="Место свободно для бронирования"></div>
                        <div class="busRow rowSeat empty" id="9RW" title="Место свободно для бронирования"></div>
                    </div>

                    <div class="busCol " id="row-8">
                        <div class="busRow rowSeat empty" id="8LW" title="Место свободно для бронирования"></div>
                        <div class="busRow rowSeat empty" id="8LI" title="Место свободно для бронирования"></div>
                        <div class="busRow  rowNum" id="8M">8</div>

                        <div class="busRow rowSeat empty" id="8RI" title="Место свободно для бронирования"></div>
                        <div class="busRow rowSeat empty" id="8RW" title="Место свободно для бронирования"></div>
                    </div>

                    <div class="busCol exitCol" id="row-7">
                        <div class="busRow rowSeat empty" id="7LW" title="Место свободно для бронирования"></div>
                        <div class="busRow rowSeat empty" id="7LI" title="Место свободно для бронирования"></div>
                        <div class="busRow  rowNum" id="7M">7</div>



                    </div>

                    <div class="busCol " id="row-6">
                        <div class="busRow rowSeat empty" id="6LW" title="Место свободно для бронирования"></div>
                        <div class="busRow rowSeat empty" id="6LI" title="Место свободно для бронирования"></div>
                        <div class="busRow  rowNum" id="6M">6</div>
                        <div class="busRow rowBar" id="bar-6"></div>


                    </div>

                    <div class="busCol " id="row-5">
                        <div class="busRow rowSeat empty" id="5LW" title="Место свободно для бронирования"></div>
                        <div class="busRow rowSeat empty" id="5LI" title="Место свободно для бронирования"></div>
                        <div class="busRow rowTV rowNum" id="5M">5</div>

                        <div class="busRow rowSeat empty" id="5RI" title="Место свободно для бронирования"></div>
                        <div class="busRow rowSeat empty" id="5RW" title="Место свободно для бронирования"></div>
                    </div>

                    <div class="busCol " id="row-4">
                        <div class="busRow rowSeat empty" id="4LW" title="Место свободно для бронирования"></div>
                        <div class="busRow rowSeat empty" id="4LI" title="Место свободно для бронирования"></div>
                        <div class="busRow  rowNum" id="4M">4</div>

                        <div class="busRow rowSeat empty" id="4RI" title="Место свободно для бронирования"></div>
                        <div class="busRow rowSeat empty" id="4RW" title="Место свободно для бронирования"></div>
                    </div>

                    <div class="busCol " id="row-3">
                        <div class="busRow rowSeat empty" id="3LW" title="Место свободно для бронирования"></div>
                        <div class="busRow rowSeat empty" id="3LI" title="Место свободно для бронирования"></div>
                        <div class="busRow  rowNum" id="3M">3</div>

                        <div class="busRow rowSeat empty" id="3RI" title="Место свободно для бронирования"></div>
                        <div class="busRow rowSeat empty" id="3RW" title="Место свободно для бронирования"></div>
                    </div>

                    <div class="busCol " id="row-2">
                        <div class="busRow rowSeat empty" id="2LW" title="Место свободно для бронирования"></div>
                        <div class="busRow rowSeat empty" id="2LI" title="Место свободно для бронирования"></div>
                        <div class="busRow  rowNum" id="2M">2</div>

                        <div class="busRow rowSeat empty" id="2RI" title="Место свободно для бронирования"></div>
                        <div class="busRow rowSeat empty" id="2RW" title="Место свободно для бронирования"></div>
                    </div>

                    <div class="busCol " id="row-1">
                        <div class="busRow rowSeat" id="1LW"></div>
                        <div class="busRow rowSeat" id="1LI"></div>
                        <div class="busRow  rowNum" id="1M">1</div>

                        <div class="busRow rowSeat" id="1RI"></div>
                        <div class="busRow rowSeat" id="1RW"></div>
                    </div>

                    <div class="busCol busFront exitCol"></div>
                </div>
            </div>
        </div>
        <div class="busLegend">
            <div class="legendContent clearfix">
                <h5>Легенда:</h5>
                <div class="legendItem">
                    <div class="busRow rowSeat"></div> - Резерв для сотрудников
                </div>
                <div class="legendItem">
                    <div class="busRow rowSeat empty"></div> - Свободные
                </div>
                <div class="legendItem">
                    <div class="busRow rowSeat reserve2"></div> - Бронь
                </div>
                <div class="legendItem">
                    <div class="busRow rowSeat booked2"></div> - Выкупленные
                </div>
                <div class="legendItem">
                    <div class="busRow rowSeat empty"><i class="icon-user"></i></div> - Выбранные Вами
                </div>
            </div>
        </div>
        <div class="msg">
            <p>
                Компания оставляет за собой право пересаживать клиентов в зависимости от конкретного типа автобуса, количества и расположения мест, дверей, туалета, миникухни и др. особенностей модуляции внутреннего оснащения каждого конкретного автобуса.
            </p>
        </div>
    </div>
</div>