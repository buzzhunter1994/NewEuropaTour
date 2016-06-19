
/* 3 linked selects */
/*usage: select2 plugin, ajax getJSON */

/*==============================================*/
var urls = "/tours/";
var url_list1_param = 'get_countries_and_transport';
var url_list2_param = 'get_tematics_and_transport';
var url_list3_param = 'get_countries_tematics';
var url_list4_param = 'get_tours_cnt';
/*==============================================*/

function formatState(state) {
    var originalOption = state.element;
    if (!state.id) { return state.text; }
    var $state = $(
        '<span><img src="/css/flags/' + $(originalOption).data('iso') + '.png" class="img-flag" /> ' + state.text + '</span>'
    );
    return $state;
};
function init_list1() {
    $('#country_id').select2({
        width: '100%',
        templateResult: formatState,
        templateSelection: formatState,
        escapeMarkup: function(m) { return m; },
        allowClear: true
    });
}

function init_list2() {
    $('#tematic_id').select2({
        width: '100%',
        allowClear: true,
        minimumResultsForSearch: -1
    });
}


function init_list3() {
    $('#transport_id').select2({
        width: '100%',
        allowClear: true,
        minimumResultsForSearch: -1
    });
}

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

function empty_list(obj) {
    obj.empty();
    obj.select2('destroy');
    obj.append("<option value=''></option>");
}

function _list1_change(selected_value) {

    var selected_tematic = $('#tematic_id').select2("val");
    var selected_transport = $('#transport_id').select2("val");
    var date_from = $('#date_from').val();
    var date_to = $('#date_to').val();

    var request = $.getJSON(urls, {"rm": url_list2_param, "country": selected_value, "tematic": selected_tematic, "transport": selected_transport, "date_from": date_from, "date_to": date_to} );

    request.done(function(data) {


        empty_list($('#tematic_id'));
        empty_list($('#transport_id'));

        var data_tematics = data[0];
        var data_transport = data[1];
        var tour_cnt = data[2];

        $.each(data_tematics, function(index, obj) {
            $('#tematic_id').append("<option value='"+obj.code+"'>"+obj.name+"</option>");
        });
        $.each(data_transport, function(index, obj) {
            $('#transport_id').append("<option value='"+obj.code+"'>"+obj.name+"</option>");
        });

        init_list2();
        init_list3();

        $('#tematic_id').select2("val",selected_tematic);
        $('#transport_id').select2("val",selected_transport);
        $('#tour_cnt').html(tour_cnt);
        $('#offer').html(word_forms(tour_cnt));
    });

    request.fail(function(jqXHR, textStatus) {
        console.log( "Request failed: " + textStatus );
    });
}

function _list2_change(selected_value) {

    var selected_country = $('#country_id').select2("val");
    var selected_transport = $('#transport_id').select2("val");
    var date_from = $('#date_from').val();
    var date_to = $('#date_to').val();

    var request = $.getJSON(urls, {"rm": url_list1_param, "tematic": selected_value, "country": selected_country, "transport": selected_transport, "date_from": date_from, "date_to": date_to} );

    request.done(function(data) {

        empty_list($('#country_id'));
        empty_list($('#transport_id'));

        var data_countries = data[0];
        var data_transport = data[1];
        var tour_cnt = data[2];

        $.each(data_countries, function(index, obj) {
            $('#country_id').append('<option data-iso="'+obj.code2+'" value="'+obj.code+'">'+obj.name+'</option>');

        });

        $.each(data_transport, function(index, obj) {
            $('#transport_id').append("<option value='"+obj.code+"'>"+obj.name+"</option>");
        });

        init_list1();
        init_list3();

        $('#country_id').select2("val",selected_country);
        $('#transport_id').select2("val",selected_transport);
        $('#tour_cnt').html(tour_cnt);
        $('#offer').html(word_forms(tour_cnt));
    });

    request.fail(function(jqXHR, textStatus) {
        console.log( "Request failed: " + textStatus );
    });
}

function _list3_change(selected_value) {
    var selected_country = $('#country_id').select2("val");
    var selected_tematic = $('#tematic_id').select2("val");
    var date_from = $('#date_from').val();
    var date_to = $('#date_to').val();

    var request = $.getJSON(urls, {"rm": url_list3_param, "transport": selected_value, "tematic": selected_tematic, "country": selected_country, "date_from": date_from, "date_to": date_to} );

    request.done(function(data) {

        empty_list($('#country_id'));
        empty_list($('#tematic_id'));

        var data_countries = data[0];
        var data_tematic = data[1];
        var tour_cnt = data[2];

        $.each(data_countries, function(index, obj) {
            $('#country_id').append('<option data-iso="'+obj.code2+'" value="'+obj.code+'">'+obj.name+'</option>');

        });

        $.each(data_tematic, function(index, obj) {
            $('#tematic_id').append("<option value='"+obj.code+"'>"+obj.name+"</option>");
        });

        init_list1();
        init_list2();

        $('#country_id').select2("val",selected_country);
        $('#tematic_id').select2("val",selected_tematic);
        $('#tour_cnt').html(tour_cnt);
        $('#offer').html(word_forms(tour_cnt));
    });

    request.fail(function(jqXHR, textStatus) {
        console.log( "Request failed: " + textStatus );
    });
}


function _dates_change() {
    var selected_country = $('#country_id').select2("val");
    var selected_tematic = $('#tematic_id').select2("val");
    var selected_transport = $('#transport_id').select2("val");
    var date_from = $('#date_from').val();
    var date_to = $('#date_to').val();

    var request = $.getJSON(urls, {"rm": url_list4_param, "transport": selected_transport, "tematic": selected_tematic, "country": selected_country, "date_from": date_from, "date_to": date_to} );

    request.done(function(data) {
        var tour_cnt = data;
        $('#tour_cnt').html(tour_cnt);
        $('#offer').html(word_forms(tour_cnt));
    });

    request.fail(function(jqXHR, textStatus) {
        console.log( "Request failed: " + textStatus );
    });
}
function del_user_str() {
    var cnt = $('#users_cnt').val();
    cnt--;
    $('#users_cnt').val(cnt);
    if (cnt<2) $('.icon-trash').hide();
    var matches = $(this).attr('id').match(/(\d)$/);
    if (matches) {
        var num = matches[0];
        $('#user'+num).hide();
        $('#fio_'+num).val('');
        $('#fiolat_'+num).val('');
        $('#birthday_'+num).val('');
        $('#passport_'+num).val('');
        $('#passportdate1_'+num).val('');
        $('#passportdate2_'+num).val('');
        $('#visa_'+num).attr('checked',false);
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
$(document).ready(function(){
    $("#main_menu_button").click(function() {
        $(this).next().stop().toggleClass('active');
    });
    $(".main-menu .dropdown > a").click(function(e) {
        e.preventDefault();
        $(this).parent().stop().toggleClass('active');
    });

    $(" .main-menu .dropdown ").hover(
        function() {
            $(this).stop().addClass('active');
        },
        function() {
            $(this).stop().removeClass('active');
        }
    );
    $('#slider').bxSlider({
        pager: false,
        maxSlides: 1,
        auto: true,
        easing: 'ease'
    });
    init_list1();
    init_list2();
    init_list3();
    $('#users_cnt').change(change_users_cnt);
    $('.icon-trash').click(del_user_str);
    $('.dateSelection').hide();
    $('#dateSelectionBut').click(show_other_dates);
    $('#users_lt5 .birthday').inputmask("dd.mm.yyyy",{"placeholder" : "дд.мм.гггг", "clearIncomplete": true, yearrange: { minyear: 1916, maxyear: 2016 } });
    $('#users_lt5 .pass1').inputmask("dd.mm.yyyy",{"placeholder" : "дд.мм.гггг", "clearIncomplete": true, yearrange: { minyear: 1960, maxyear: 2016 } });
    $('#users_lt5 .pass2').inputmask("dd.mm.yyyy",{"placeholder" : "дд.мм.гггг", "clearIncomplete": true, yearrange: { minyear: 2016, maxyear: 2100 } });

    /* $('#country_id').on("change", function(e) {
         _list1_change(e.val);
     });


     $('#tematic_id').on("change", function(e) {
         _list2_change(e.val);
     });

     $('#transport_id').on("change", function(e) {
         _list3_change(e.val);
     });


     $('#date_from, #date_to').on('change', function(ev){
         _dates_change();
     });*/
});