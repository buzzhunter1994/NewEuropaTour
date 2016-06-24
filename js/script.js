
/* 3 linked selects */
/*usage: select2 plugin, ajax getJSON */

/*==============================================*/
var urls = "/tours/";
var url_list1_param = 'get_countries_and_transport';
var url_list2_param = 'get_tematics_and_transport';
var url_list3_param = 'get_countries_tematics';
var url_list4_param = 'get_tours_cnt';

/*==============================================*/
function do_search_tours() {

    var country = $("#country_id").val();
    var tematic = $("#tematic_id").val();
    var transport = $("#transport_id").val();

    var url;

    if (!country && !tematic && transport) {
        url = '/tours/transport/'+transport+'/';
    } else if (!country && tematic && !transport) {
        url = '/tours/vid/'+tematic+'/';
    } else if (country && !tematic && !transport) {
        url = '/tours/countries/'+country+'/';
    } else if (country && !tematic && transport) {
        url = '/tours/transport/'+transport+'/country/'+country+'/';
    } else if (!country && tematic && transport) {
        url = '/tours/vid/'+tematic+'/transport/'+transport+'/';
    } else if (country && tematic && !transport) {
        url = '/tours/vid/'+tematic+'/'+country+'/';
    } else if (country && tematic && transport) {
        url = '/tours/vid/'+tematic+'/transport/'+transport+'/country/'+country+'/';
    } else {
        url = '/tours/';
    }
    document.location.href = url;
    return false;
}
function modalWindow(url) {
    $.ajax({
        'type': 'get',
        'url': url,
        success: function(data) {
            $('#modalWindow .modal-content').empty().html(data);
            $('#modalWindow').modal('show');
        }
    });
}
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
    $('[data-toggle="modal"]').on('click', function(){
        modalWindow($(this).data('url'));
    })
    init_list1();
    init_list2();
    init_list3();

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