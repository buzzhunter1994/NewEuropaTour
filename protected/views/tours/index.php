<?php
$this->pageTitle='Туры';
$this->breadcrumbs = array(
    'Главная'=> Yii::app()->homeUrl,
    'Туры',
);
?>
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-4">
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
        <div class="col-lg-9 col-md-8">
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
                        <a href="/belarus/beltours/"><img src="/images/Belarus.jpg" alt=""></a>
                        <h4><a href="/belarus/beltours/">Украина</a></h4>
                        <ul>
                            <li><a href="/belarus/beltours/"><i class="icon-viArrow"></i><span>Туры по Украине</span></a></li>
                            <li><a href="/belarus/ex/"><i class="icon-viArrow"></i><span>Экскурсии</span></a></li>
                            <li><a href="/belarus/accomod/hotels/"><i class="icon-viArrow"></i><span>Гостиницы</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <h2>Туры по странам</h2>
                    <div class="listOfCountries">
                        <ul class="col-sm-12 col-md-12 col-lg-6">
                            <li><a href="/tours/countries/aut/"><img width="16" height="16" border="0" src="/css/flags/at.png" alt="Австрия" title="Австрия">Австрия (2 тура)</a></li>
                            <li><a href="/tours/countries/arm/"><img width="16" height="16" border="0" src="/css/flags/am.png" alt="Армения" title="Армения">Армения (6 туров)</a></li>
                            <li><a href="/tours/countries/bgr/"><img width="16" height="16" border="0" src="/css/flags/bg.png" alt="Болгария" title="Болгария">Болгария (1 тур)</a></li>
                            <li><a href="/tours/countries/bra/"><img width="16" height="16" border="0" src="/css/flags/br.png" alt="Бразилия" title="Бразилия">Бразилия (1 тур)</a></li>
                            <li><a href="/tours/countries/gbr/"><img width="16" height="16" border="0" src="/css/flags/gb.png" alt="Великобритания" title="Великобритания">Великобритания (7 туров)</a></li>
                            <li><a href="/tours/countries/hun/"><img width="16" height="16" border="0" src="/css/flags/hu.png" alt="Венгрия" title="Венгрия">Венгрия (5 туров)</a></li>
                            <li><a href="/tours/countries/deu/"><img width="16" height="16" border="0" src="/css/flags/de.png" alt="Германия" title="Германия">Германия (4 тура)</a></li>
                            <li><a href="/tours/countries/grc/"><img width="16" height="16" border="0" src="/css/flags/gr.png" alt="Греция" title="Греция">Греция (5 туров)</a></li>
                            <li><a href="/tours/countries/geo/"><img width="16" height="16" border="0" src="/css/flags/ge.png" alt="Грузия" title="Грузия">Грузия (5 туров)</a></li>
                            <li><a href="/tours/countries/isr/"><img width="16" height="16" border="0" src="/css/flags/il.png" alt="Израиль" title="Израиль">Израиль (9 туров)</a></li>
                            <li><a href="/tours/countries/irl/"><img width="16" height="16" border="0" src="/css/flags/ie.png" alt="Ирландия" title="Ирландия">Ирландия (1 тур)</a></li>
                            <li><a href="/tours/countries/esp/"><img width="16" height="16" border="0" src="/css/flags/es.png" alt="Испания" title="Испания">Испания (22 туров)</a></li>
                            <li><a href="/tours/countries/ita/"><img width="16" height="16" border="0" src="/css/flags/it.png" alt="Италия" title="Италия">Италия (21 тур)</a></li>
                            <li><a href="/tours/countries/cyp/"><img width="16" height="16" border="0" src="/css/flags/cy.png" alt="Кипр" title="Кипр">Кипр (1 тур)</a></li>
                        </ul>
                        <ul class="col-sm-12 col-md-12 col-lg-6">
                            <li><a href="/tours/countries/lva/"><img width="16" height="16" border="0" src="/css/flags/lv.png" alt="Латвия" title="Латвия">Латвия (5 туров)</a></li>
                            <li><a href="/tours/countries/ltu/"><img width="16" height="16" border="0" src="/css/flags/lt.png" alt="Литва" title="Литва">Литва (5 туров)</a></li>
                            <li><a href="/tours/countries/nld/"><img width="16" height="16" border="0" src="/css/flags/nl.png" alt="Нидерланды" title="Нидерланды">Нидерланды (3 тура)</a></li>
                            <li><a href="/tours/countries/per/"><img width="16" height="16" border="0" src="/css/flags/pe.png" alt="Перу" title="Перу">Перу (1 тур)</a></li>
                            <li><a href="/tours/countries/pol/"><img width="16" height="16" border="0" src="/css/flags/pl.png" alt="Польша" title="Польша">Польша (1 тур)</a></li>
                            <li><a href="/tours/countries/prt/"><img width="16" height="16" border="0" src="/css/flags/pt.png" alt="Португалия" title="Португалия">Португалия (2 тура)</a></li>
                            <li><a href="/tours/countries/rus/"><img width="16" height="16" border="0" src="/css/flags/ru.png" alt="Россия" title="Россия">Россия (1 тур)</a></li>
                            <li><a href="/tours/countries/swe/"><img width="16" height="16" border="0" src="/css/flags/se.png" alt="Скандинавские страны" title="Скандинавские страны">Скандинавские страны (6 туров)</a></li>
                            <li><a href="/tours/countries/svk/"><img width="16" height="16" border="0" src="/css/flags/sk.png" alt="Словакия" title="Словакия">Словакия (1 тур)</a></li>
                            <li><a href="/tours/countries/tur/"><img width="16" height="16" border="0" src="/css/flags/tr.png" alt="Турция" title="Турция">Турция (2 тура)</a></li>
                            <li><a href="/tours/countries/fra/"><img width="16" height="16" border="0" src="/css/flags/fr.png" alt="Франция" title="Франция">Франция (14 туров)</a></li>
                            <li><a href="/tours/countries/mne/"><img width="16" height="16" border="0" src="/css/flags/me.png" alt="Черногория" title="Черногория">Черногория (11 туров)</a></li>
                            <li><a href="/tours/countries/cze/"><img width="16" height="16" border="0" src="/css/flags/cz.png" alt="Чехия" title="Чехия">Чехия (7 туров)</a></li>
                            <li><a href="/tours/countries/che/"><img width="16" height="16" border="0" src="/css/flags/ch.png" alt="Швейцария" title="Швейцария">Швейцария (6 туров)</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <h2>Туры по тематике</h2>
                    <div class="listOfCountries">
                        <ul class="col-sm-12 col-md-12 col-lg-12 ">
                            <li><a href="/tours/vid/france/">Истинная Франция (3 тура)</a></li>
                            <li><a href="/tours/vid/europe/">Туры по европейским столицам (90 туров)</a></li>
                            <li><a href="/tours/vid/sea/">Отдых на море из Минска (38 туров)</a></li>
                            <li><a href="/tours/vid/week-end/">Отдых выходного дня (10 туров)</a></li>
                            <li><a href="/tours/vid/octoberfest/">Октоберфест (1 тур)</a></li>
                            <li><a href="/tours/vid/spa/">SPA и лечение (11 туров)</a></li>
                            <li><a href="/tours/vid/individual/">Индивидуальные туры (1 тур)</a></li>
                            <li><a href="/tours/vid/exotic/">Экзотические страны (2 тура)</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>