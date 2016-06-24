<?php
$this->pageTitle='Замовлення туру';
$this->breadcrumbs = array(
    Yii::t('yii','Main')=> Yii::app()->homeUrl,
    'Замовлення туру',
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
    <form action="/tours/order/confirm/" method="post" id="fwork" onsubmit="return submit_input_data();">
        <input type="hidden" name="tour_id" id="tour_id" value="<?=$tour->id?>">
        <input type="hidden" name="trip_id" id="trip_id" value="<?=$trip->id?>">
        <input type="hidden" name="ordered_places" id="ordered_places" value="">

        <div class="sampleTour">
        <div class="descriptionCol">
            <div class="caption">
                <div class="h-title">
                    <a href="/tours/<?=$tour->id?>"><span class="red"><?=$tour->code?> </span><?=$tour->title?></a>
                </div>
                <div class="price">
                    <span data-toggle="tooltip" data-placement="top" title="<?=Currency::convert($trip->price)?> (<?=Currency::format($trip->price)?>)"><strong><?=Currency::convert($trip->price)?></strong></span>
                </div>
            </div>
            <div class="route" style="margin:0;"><?=$tour->route?></div>
            <?=$tourType?>
            <div class="date clearfix">
                <em><?=$tour->days?></em>
            </div>
            <div class="date clearfix">
                <?
                if ($trip->freeSeatsCount() == 0)
                    $labelColor = 'dateRed';
                elseif ($trip->freeSeatsCount() < 20)
                    $labelColor = 'dateYellow';
                else
                    $labelColor = 'dateGreen';
                $otherDates = $trip->otherDates();
                ?>
                <em>Дата заїзду:</em> <span class="label label-date <?=$labelColor?>"><?=$trip->selfDate()?></span>
                <? if ($otherDates) {?><div class="dateSelectionBut" id="dateSelectionBut">Обрати іншу</div><? } ?>
            </div>
            <div class="dateSelection">
                <?php
                    foreach($trip->otherDates() as $tripDate){
                        $freeSeats = $tripDate->freeSeatsCount();
                        $selfDate = $tripDate->selfDate();
                        if ($tripDate->freeSeatsCount() < 20)
                            $lastFree = 'dateYellow';
                        else
                            $lastFree = 'dateGreen';
                        if ($tripDate->freeSeatsCount()>0) print "<a href='/tours/order/id/{$tripDate->id}' class='label label-date {$lastFree}' data-toggle='tooltip' title='Свободных мест: $freeSeats'>$selfDate</a>";
                    }
                ?>
            </div>
            <div class="date busPlaces clearfix">
                <em>Вільних місць в автобусі:</em><em><?=$trip->freeSeatsCount()?></em>
            </div>
        </div>
    </div>
    <div class="passportForm">
        <div class="caption clearfix">
            <div class="selectCol">
                <select id="users_cnt" name="users_cnt">
                    <option value="1" selected>1 турист</option>
                    <option value="2" >2 туриста</option>
                    <option value="3" >3 туриста</option>
                    <option value="4" >4 туриста</option>
                    <option value="5" >5 и більше туристів</option>
                </select>
            </div>
            <h4>введіть Данні туристa</h4>
            <div class="msg">
                <span class="alerter">&lt; ! &gt;</span> Усі поля обов'язкові для заповнення
            </div>
        </div>

        <table class="passportTbl" id="users_lt5">
            <tr>
                <th>П.І.Б.</th>
                <th>Дата нарождения</th>
                <th></th>
            </tr>

            <tr id="user1">
                <td class="form td_fio"><input name="fio_1" id="fio_1" type="text" placeholder="Прізвище Ім'я По батькові" value=""></td>
                <td class="form td_birthday"><input name="birthday_1" id="birthday_1" class="birthday" type="text" placeholder="дд.мм.рррр" value=""></td>
                <td class="form td_icon"><i class="icon-trash" id="icon-trash-1" style="display:none;"></i></td>
            </tr>

            <tr id="user2" style="display:none;">
                <td class="form td_fio"><input name="fio_2" id="fio_2" type="text" placeholder="Прізвище Ім'я По батькові" value=""></td>
                <td class="form td_birthday"><input name="birthday_2" id="birthday_2" class="birthday" type="text" placeholder="дд.мм.рррр" value=""></td>
                <td class="form td_icon"><i class="icon-trash" id="icon-trash-2" style="display:none;"></i></td>
            </tr>

            <tr id="user3" style="display:none;">
                <td class="form td_fio"><input name="fio_3" id="fio_3" type="text" placeholder="Прізвище Ім'я По батькові" value=""></td>
                <td class="form td_birthday"><input name="birthday_3" id="birthday_3" class="birthday" type="text" placeholder="дд.мм.рррр" value=""></td>
                <td class="form td_icon"><i class="icon-trash" id="icon-trash-3" style="display:none;"></i></td>
            </tr>

            <tr id="user4" style="display:none;">
                <td class="form td_fio"><input name="fio_4" id="fio_4" type="text" placeholder="Прізвище Ім'я По батькові" value=""></td>
                <td class="form td_birthday"><input name="birthday_4" id="birthday_4" class="birthday" type="text" placeholder="дд.мм.рррр" value=""></td>
                <td class="form td_icon"><i class="icon-trash" id="icon-trash-4" style="display:none;"></i></td>
            </tr>

        </table>

        <div class="groupContent" id="users_gt5" style="display:none;">
            <div class="importantNotice">
                <p class="cnt">
                    Для замовлення групового туру необхідно відправити заявку менеджеру із зазначенням кількості осіб і їх даними: ПІБ, дата народження.
                </p>
            </div>
            <textarea name="msg" id="msg"  rows="8" cols="60" placeholder="Ваше повідомлення..."></textarea>
        </div>

    </div>
    <div class="bus-map">
        <h4>Выберіть місця в автобусі</h4>
        <!-- empty, booked, reserve, choice-->
        <div class="busWrapper">
            <div class="bus-scroll">
                <div class="bus clearfix">
                    <div class="busCol " id="row-13">
                        <div class="busRow rowSeat" id="13LW"></div>
                        <div class="busRow rowSeat" id="13LI"></div>
                        <div class="busRow  rowSeat"  id="13M"></div>
                        <div class="busRow rowSeat" id="13RI"></div>
                        <div class="busRow rowSeat" id="13RW"></div>
                    </div>

                    <div class="busCol " id="row-12">
                        <div class="busRow rowSeat" id="12LW"></div>
                        <div class="busRow rowSeat" id="12LI"></div>
                        <div class="busRow  rowNum"  id="12M">12</div>
                        <div class="busRow rowSeat" id="12RI"></div>
                        <div class="busRow rowSeat" id="12RW"></div>
                    </div>

                    <div class="busCol " id="row-11">
                        <div class="busRow rowSeat" id="11LW"></div>
                        <div class="busRow rowSeat" id="11LI"></div>
                        <div class="busRow  rowNum"  id="11M">11</div>
                        <div class="busRow rowSeat" id="11RI"></div>
                        <div class="busRow rowSeat" id="11RW"></div>
                    </div>

                    <div class="busCol " id="row-10">
                        <div class="busRow rowSeat" id="10LW"></div>
                        <div class="busRow rowSeat" id="10LI"></div>
                        <div class="busRow  rowNum"  id="10M">10</div>
                        <div class="busRow rowSeat" id="10RI"></div>
                        <div class="busRow rowSeat" id="10RW"></div>
                    </div>

                    <div class="busCol " id="row-9">
                        <div class="busRow rowSeat" id="9LW"></div>
                        <div class="busRow rowSeat" id="9LI"></div>
                        <div class="busRow  rowNum"  id="9M">9</div>
                        <div class="busRow rowSeat" id="9RI"></div>
                        <div class="busRow rowSeat" id="9RW"></div>
                    </div>

                    <div class="busCol " id="row-8">
                        <div class="busRow rowSeat" id="8LW"></div>
                        <div class="busRow rowSeat" id="8LI"></div>
                        <div class="busRow  rowNum"  id="8M">8</div>

                        <div class="busRow rowSeat" id="8RI"></div>
                        <div class="busRow rowSeat" id="8RW"></div>
                    </div>

                    <div class="busCol exitCol" id="row-7">
                        <div class="busRow rowSeat" id="7LW"></div>
                        <div class="busRow rowSeat" id="7LI"></div>
                        <div class="busRow  rowNum"  id="7M">7</div>
                    </div>

                    <div class="busCol " id="row-6">
                        <div class="busRow rowSeat" id="6LW"></div>
                        <div class="busRow rowSeat" id="6LI"></div>
                        <div class="busRow  rowNum"  id="6M">6</div>
                        <div class="busRow rowBar" id="bar-6"></div>
                    </div>

                    <div class="busCol " id="row-5">
                        <div class="busRow rowSeat" id="5LW"></div>
                        <div class="busRow rowSeat" id="5LI"></div>
                        <div class="busRow rowTV rowNum"  id="5M">5</div>
                        <div class="busRow rowSeat" id="5RI"></div>
                        <div class="busRow rowSeat" id="5RW"></div>
                    </div>

                    <div class="busCol " id="row-4">
                        <div class="busRow rowSeat" id="4LW"></div>
                        <div class="busRow rowSeat" id="4LI"></div>
                        <div class="busRow  rowNum"  id="4M">4</div>
                        <div class="busRow rowSeat" id="4RI"></div>
                        <div class="busRow rowSeat" id="4RW"></div>
                    </div>

                    <div class="busCol " id="row-3">
                        <div class="busRow rowSeat" id="3LW"></div>
                        <div class="busRow rowSeat" id="3LI"></div>
                        <div class="busRow  rowNum"  id="3M">3</div>
                        <div class="busRow rowSeat" id="3RI"></div>
                        <div class="busRow rowSeat" id="3RW"></div>
                    </div>

                    <div class="busCol " id="row-2">
                        <div class="busRow rowSeat" id="2LW"></div>
                        <div class="busRow rowSeat" id="2LI"></div>
                        <div class="busRow  rowNum"  id="2M">2</div>
                        <div class="busRow rowSeat" id="2RI"></div>
                        <div class="busRow rowSeat" id="2RW"></div>
                    </div>

                    <div class="busCol " id="row-1">
                        <div class="busRow rowSeat" id="1LW"></div>
                        <div class="busRow rowSeat" id="1LI"></div>
                        <div class="busRow  rowNum"  id="1M">1</div>
                        <div class="busRow rowSeat" id="1RI"></div>
                        <div class="busRow rowSeat" id="1RW"></div>
                    </div>

                    <div class="busCol busFront exitCol"></div>
                </div>
            </div>
        </div>
        <div class="busLegend">
            <div class="legendContent clearfix">
                <h4>Легенда:</h4>
                <div class="legendItem">
                    <div class="busRow rowSeat"></div> - <?=Yii::t('yii', 'employeeReserved')?>
                </div>
                <div class="legendItem">
                    <div class="busRow rowSeat empty"></div> - <?=Yii::t('yii', 'empty')?>
                </div>
                <div class="legendItem">
                    <div class="busRow rowSeat reserve2"></div> - <?=Yii::t('yii', 'reserved')?>
                </div>
                <div class="legendItem">
                    <div class="busRow rowSeat booked2"></div> - <?=Yii::t('yii', 'booked')?>
                </div>
                <div class="legendItem">
                    <div class="busRow rowSeat empty"><i class="icon-user"></i></div> - <?=Yii::t('yii', 'choice')?>
                </div>
            </div>
        </div>
        <div class="msg">
            <p>
                Компанія залишає за собою право пересаджувати клієнтів в залежності від конкретного типу автобуса, кількості і розташування місць, дверей, туалету, мінікухні і ін. Особливостей модуляції внутрішнього оснащення кожного конкретного автобуса.
            </p>
        </div>
    </div>
    <div class="row" id="messageBlock">
        <div class="col-sm-12">
            <div class="passportForm">
                <div class="groupContent">
                    <textarea name="message" id="message" rows="4" cols="60" placeholder="Тут Ви можете залишити повідомлення менеджеру..."></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 t-a_c">
            <button class="button button-rounded button-default button-big" id="orderButton">ВІДПРАВИТИ ЗАМОВЛЕННЯ</button>
        </div>
    </div>
</div>
<? Yii::app()->clientScript->registerScript('javascript', "
    var places_all = ". $trip->getAllSeats() .";
    var places_order = ". $trip->getBusySeats() .";
    var places_bron = ". $trip->getReservedSeats() .";
    var titles = {'booked2':'".Yii::t('yii', 'booked place')."','reserve2':'".Yii::t('yii', 'reserved place')."','choice2':'".Yii::t('yii', 'choice place')."','empty':'".Yii::t('yii', 'empty place')."'};

    function change_users_cnt() {
        var cnt = $(this).val();
        if (cnt==5) {
            $('#users_lt5').hide();
            $('#accomodation').hide();
            $('#places').hide();
            $('#users_gt5').show();
            $('#messageBlock').hide();
        } else if (cnt>0 && cnt<5) {
            $('#users_lt5').show();
            $('#accomodation').show();
            $('#places').show();
            $('#users_gt5').hide();
            $('#messageBlock').show();
            for (var i=1; i<5; i++){
                $('#user'+i).hide();
            }
            for (var i=1; i<=cnt; i++){
                $('#user'+i).show();
            }
        } else {
            for (var i=1; i<5; i++){
                $('#user'+i).hide();
            }
        }
        if (cnt>1 && cnt<5) {
            $('.icon-trash').show();
        } else {
            $('.icon-trash').hide();
        }
    }
    function del_user_str() {
        var cnt = $('#users_cnt').val();
        cnt--;
        $('#users_cnt').val(cnt);
        if (cnt<2) $('.icon-trash').hide();
        var matches = $(this).attr('id').match(/(\\d)$/);
        if (matches) {
            var num = matches[0];
            $('#user'+num).hide();
            $('#fio_'+num).val('');
            $('#birthday_'+num).val('');
        }
    }
    function show_other_dates() {
        if($('.dateSelection').is(':visible')){
            $('.dateSelection').slideUp(100);
            $(this).removeClass('active');
        }
        else{
            $('.dateSelection').slideDown(100);
            $(this).addClass('active');
        }
    }


    function set_places_status(str, status) {
       if (str.length>0) {
           var places = str.split(',');
           for (var i=0; i<places.length; i++) {
               set_place(places[i], status);
            }
         }
    }

    function orderplace(place) {
       var id = '#'+place;
       if ( $(id).hasClass('choice2')) {
           set_place(place, 'empty');
       }   else if ($(id).hasClass('empty')) {
           if (allow_set_choice()) {
               set_place(place, 'choice2');
           }
       }
    }

    function allow_set_choice() {
       var choice_cnt = $('.choice2').size();
       var cnt = $('#users_cnt').val();
       return (choice_cnt>=0 && cnt>=0 && choice_cnt<cnt);
    }


    function set_status_input(obj) {
        var flag;
        if (obj.val()=='') {
            obj.removeClass('correct');
            obj.addClass('incorrect');
            flag = false;
        } else {
            obj.removeClass('incorrect');
            obj.addClass('correct');
            flag = true;
        }
        return flag;
    }
    function set_place(place, type) {
       var id = '#'+place;
       $(id).removeClass('empty');
       $(id).removeClass('booked2');
       $(id).removeClass('reserve2');
       $(id).removeClass('choice2');
       if (type == 'choice2') {
           set_place_user(place);
       } else {
           remove_place_user(place);
       }
       $(id).addClass(type);
       $(id).attr('title',titles[type]);
    }
    function set_place_user(place) {
        var id = '#'+place;
        $(id).append('<i class=\"icon-user\"></i>');
    }
    function remove_place_user(place) {
       var id = '#'+place;
       $(id).empty();
    }
    function collect_choices() {
       var arr = [];
       $('.bus .choice2').each(function(index) {
           arr.push($(this).attr('id'));
       });
       return arr;
    }
    function draw_bus() {
       $.each(places_all, function( index, value ) {
           set_place(value, 'empty');
       });
       $.each(places_order, function( index, value ) {
           set_place(value, 'booked2');
       });
       $.each(places_bron, function( index, value ) {
           set_place(value, 'reserve2');
       });
    }
   $(document).ready( function(){
        draw_bus();
        $('.empty').click(function() {
              orderplace($(this).attr('id'));
        });
        $('#users_cnt').change(change_users_cnt);
        $('.icon-trash').click(del_user_str);
        $('.dateSelection').hide();
        $('#dateSelectionBut').click(show_other_dates);
        $('#users_lt5 .birthday').inputmask(\"dd.mm.yyyy\",{\"placeholder\" : \"дд.мм.рррр\", \"clearIncomplete\": true, yearrange: { minyear: 1916, maxyear: 2015 } });

         var ordered_places = $('#ordered_places').val();
         set_places_status(ordered_places, 'choice2');
         $('#users_lt5 input[type=text]').focusout(function() {
             set_status_input($(this));
         });
         $('#users_lt5 input[type=text]').keyup(function() {
             set_status_input($(this));
         });
   });
", CClientScript::POS_END);
