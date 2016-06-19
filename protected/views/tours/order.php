<?php
$this->pageTitle='Заказ тура';
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
                <em>Дата заезда:</em> <span class="label label-date dateGreen"><?=$trip->selfDate()?></span>
                <div class="dateSelectionBut" id="dateSelectionBut">Выбрать другую</div>
            </div>
            <div class="dateSelection">
                <?php
                    foreach($trip->otherDates() as $tripDate){
                        $freeSeats = count($tripDate->freeSeats());
                        $selfDate = $tripDate->selfDate();
                        print "<a href='/tours/order/id/{$tripDate->id}' class='label label-date dateGreen' title='Свободных мест: $freeSeats'>$selfDate</a>";
                    }
                ?>
            </div>
            <div class="date busPlaces clearfix">
                <em>Свободных мест в автобусе:</em><em><?=count($trip->freeSeats())?></em>
            </div>
        </div>
    </div>
    <div class="passportForm">
        <div class="caption clearfix">
            <div class="selectCol">
                <select id="users_cnt" name="users_cnt">
                    <option value="1" selected>1 турист</option><option value="2" >2 туриста</option><option value="3" >3 туриста</option><option value="4" >4 туриста</option><option value="5" >5 и более туристов</option>
                </select>
            </div>
            <h4>введите Данные туристa</h4>
            <div class="msg">
                <span class="alerter">&lt; ! &gt;</span> Все поля обязательны для заполнения
            </div>
        </div>

        <table class="passportTbl" id="users_lt5">
            <tr>
                <th>Ф.И.О. (рус.)</th>
                <th>Фамилия Имя (лат.)</th>
                <th>Дата рождения</th>
                <th>Серия и номер паспорта</th>
                <th>Дата выдачи паспорта</th>
                <th>Срок действия паспорта</th>
                <th>Виза</th>
                <th></th>
            </tr>

            <tr id="user1">
                <td class="form td_fio"><input name="fio_1" id="fio_1" type="text" placeholder="Фамилия Имя Отчество" value=""></td>
                <td class="form td_fio"><input name="fiolat_1" id="fiolat_1" type="text" placeholder="Латинскими буквами как в паспорте" value=""></td>
                <td class="form td_birthday"><input name="birthday_1" id="birthday_1" class="birthday" type="text" placeholder="дд.мм.гггг" value=""></td>
                <td class="form td_passport"><input name="passport_1" id="passport_1" type="text" placeholder="Серия и номер паспорта" value=""></td>
                <td class="form td_birthday"><input name="passportdate1_1" id="passportdate1_1" class="pass1" type="text" placeholder="дд.мм.гггг" value=""></td>
                <td class="form td_birthday"><input name="passportdate2_1" id="passportdate2_1" class="pass2" type="text" placeholder="дд.мм.гггг" value=""></td>
                <td class="form td_visa"><input name="visa_1" type="checkbox" id="visa_1" value="1" ><label for="visa_1">виза нужна</label></td>
                <td class="form td_icon"><i class="icon-trash" id="icon-trash-1" style="display:none;"></i></td>
            </tr>

            <tr id="user2" style="display:none;">
                <td class="form td_fio"><input name="fio_2" id="fio_2" type="text" placeholder="Фамилия Имя Отчество" value=""></td>
                <td class="form td_fio"><input name="fiolat_2" id="fiolat_2" type="text" placeholder="Латинскими буквами как в паспорте" value=""></td>
                <td class="form td_birthday"><input name="birthday_2" id="birthday_2" class="birthday" type="text" placeholder="дд.мм.гггг" value=""></td>
                <td class="form td_passport"><input name="passport_2" id="passport_2" type="text" placeholder="Серия и номер паспорта" value=""></td>
                <td class="form td_birthday"><input name="passportdate1_2" id="passportdate1_2" class="pass1" type="text" placeholder="дд.мм.гггг" value=""></td>
                <td class="form td_birthday"><input name="passportdate2_2" id="passportdate2_2" class="pass2" type="text" placeholder="дд.мм.гггг" value=""></td>
                <td class="form td_visa"><input name="visa_2" type="checkbox" id="visa_2" value="1" ><label for="visa_2">виза нужна</label></td>
                <td class="form td_icon"><i class="icon-trash" id="icon-trash-2" style="display:none;"></i></td>
            </tr>

            <tr id="user3" style="display:none;">
                <td class="form td_fio"><input name="fio_3" id="fio_3" type="text" placeholder="Фамилия Имя Отчество" value=""></td>
                <td class="form td_fio"><input name="fiolat_3" id="fiolat_3" type="text" placeholder="Латинскими буквами как в паспорте" value=""></td>
                <td class="form td_birthday"><input name="birthday_3" id="birthday_3" class="birthday" type="text" placeholder="дд.мм.гггг" value=""></td>
                <td class="form td_passport"><input name="passport_3" id="passport_3" type="text" placeholder="Серия и номер паспорта" value=""></td>
                <td class="form td_birthday"><input name="passportdate1_3" id="passportdate1_3" class="pass1" type="text" placeholder="дд.мм.гггг" value=""></td>
                <td class="form td_birthday"><input name="passportdate2_3" id="passportdate2_3" class="pass2" type="text" placeholder="дд.мм.гггг" value=""></td>
                <td class="form td_visa"><input name="visa_3" type="checkbox" id="visa_3" value="1" ><label for="visa_3">виза нужна</label></td>
                <td class="form td_icon"><i class="icon-trash" id="icon-trash-3" style="display:none;"></i></td>
            </tr>

            <tr id="user4" style="display:none;">
                <td class="form td_fio"><input name="fio_4" id="fio_4" type="text" placeholder="Фамилия Имя Отчество" value=""></td>
                <td class="form td_fio"><input name="fiolat_4" id="fiolat_4" type="text" placeholder="Латинскими буквами как в паспорте" value=""></td>
                <td class="form td_birthday"><input name="birthday_4" id="birthday_4" class="birthday" type="text" placeholder="дд.мм.гггг" value=""></td>
                <td class="form td_passport"><input name="passport_4" id="passport_4" type="text" placeholder="Серия и номер паспорта" value=""></td>
                <td class="form td_birthday"><input name="passportdate1_4" id="passportdate1_4" class="pass1" type="text" placeholder="дд.мм.гггг" value=""></td>
                <td class="form td_birthday"><input name="passportdate2_4" id="passportdate2_4" class="pass2" type="text" placeholder="дд.мм.гггг" value=""></td>
                <td class="form td_visa"><input name="visa_4" type="checkbox" id="visa_4" value="1" ><label for="visa_4">виза нужна</label></td>
                <td class="form td_icon"><i class="icon-trash" id="icon-trash-4" style="display:none;"></i></td>
            </tr>

        </table>

        <div class="groupContent" id="users_gt5" style="display:none;">
            <div class="importantNotice">
                <p class="cnt">
                    Для заказа группового тура необходимо отправить заявку менеджеру с указанием количества человек и их паспортными данными: номер паспорта, дата рождения, ФИО латинскими буквами, как в паспорте, требуется виза или нет.
                </p>
            </div>
            <textarea name="msg" id="msg"  rows="8" cols="60" placeholder="Ваше сообщение..."></textarea>
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