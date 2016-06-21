<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a><h4 class="modal-title"><?=Yii::t('yii', 'Layout and availability of buses')?></h4>
</div>
<div class="modal-body">
<div class="bus-map">
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
                    <div class="busRow rowNum"  id="6M">6</div>
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
        </div>
    </div>
</div>
<script>
    var places_all = <?=$trip->getAllSeats()?>;
    var places_order = <?=$trip->getBusySeats()?>;
    var places_bron = <?=$trip->getReservedSeats()?>;
    var titles = {'booked2':'Место выкуплено','reserve2':'Место забронировано','choice2':'Место выбрано Вами','empty':'Место свободно для бронирования'};
    function set_place(place, type) {
        var id = '#'+place;
        $(id).removeClass('empty');
        $(id).removeClass('booked2');
        $(id).removeClass('reserve2');
        $(id).addClass(type);
        $(id).attr('title',titles[type]);
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
    });
</script>
</div>