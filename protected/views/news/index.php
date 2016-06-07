<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-4">
            <div class="tour-block">
                <header><h3>Подбор туров</h3></header>
                <form method="GET" name="search_tours" id="search_tours" action="/tours/search/">
                    <input type="hidden" name="sort" id="sort" value="date">
                    <select id="country_id" name="country" data-form="select2" data-placeholder="Страна">
                        <option></option>
                        <optgroup label="ТОП стран">
                            <option data-iso="me" value="mne">Черногория
                            <option data-iso="it" value="ita">Италия
                            <option data-iso="fr" value="fra">Франция
                            <option data-iso="es" value="esp">Испания
                            <option data-iso="nl" value="nld">Нидерланды
                            <option data-iso="tr" value="tur">Турция
                            <option data-iso="il" value="isr">Израиль
                            <option data-iso="cz" value="cze">Чехия
                            <option data-iso="gb" value="gbr">Великобритания
                                <optgroup label="Все страны">
                                    <option data-iso="at" value="aut">Австрия
                                    <option data-iso="am" value="arm">Армения
                                    <option data-iso="bg" value="bgr">Болгария
                                    <option data-iso="br" value="bra">Бразилия
                                    <option data-iso="gb" value="gbr">Великобритания
                                    <option data-iso="hu" value="hun">Венгрия
                                    <option data-iso="de" value="deu">Германия
                                    <option data-iso="gr" value="grc">Греция
                                    <option data-iso="ge" value="geo">Грузия
                                    <option data-iso="il" value="isr">Израиль
                                    <option data-iso="ie" value="irl">Ирландия
                                    <option data-iso="es" value="esp">Испания
                                    <option data-iso="it" value="ita">Италия
                                    <option data-iso="cy" value="cyp">Кипр
                                    <option data-iso="lv" value="lva">Латвия
                                    <option data-iso="lt" value="ltu">Литва
                                    <option data-iso="nl" value="nld">Нидерланды
                                    <option data-iso="pe" value="per">Перу
                                    <option data-iso="pl" value="pol">Польша
                                    <option data-iso="pt" value="prt">Португалия
                                    <option data-iso="ru" value="rus">Россия
                                    <option data-iso="se" value="swe">Скандинавские страны
                                    <option data-iso="sk" value="svk">Словакия
                                    <option data-iso="tr" value="tur">Турция
                                    <option data-iso="fr" value="fra">Франция
                                    <option data-iso="me" value="mne">Черногория
                                    <option data-iso="cz" value="cze">Чехия
                                    <option data-iso="ch" value="che">Швейцария
                                </optgroup>
                    </select>
                    <select id="tematic_id" name="tematic" data-form="select2" data-placeholder="Тематика">
                        <option></option>
                        <option value="france">Истинная Франция
                        <option value="europe">Туры по европейским столицам
                        <option value="sea">Отдых на море из Минска
                        <option value="week-end">Отдых выходного дня
                        <option value="octoberfest">Октоберфест
                        <option value="spa">SPA и лечение
                        <option value="individual">Индивидуальные туры
                        <option value="exotic">Экзотические страны
                    </select>
                    <select id="transport_id" name="transport" data-form="select2" data-placeholder="Тип транспорта">
                        <option></option>
                        <option value="avia">Авиатур
                        <option value="bus">Автобусный тур
                    </select>
                    <br />
                    <button class="btn btn-block">показать предложения</button>
               </form>
            </div>
        </div>
        <div class="col-lg-9 col-md-8 ">

            <h2>Новости</h2>
            <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$dataProvider,
                'itemView'=>'_view',
                'template'=>"{items}\n{pager}<br/>",
                'pager' => array(
                    'cssFile'=>'/css/pager.css',
                    'firstPageLabel'=>'<<',
                    'prevPageLabel'=>'<span><</span>',
                    'nextPageLabel'=>'<span>></span>',
                    'lastPageLabel'=>'>>',
                    'nextPageCssClass'=>'_next',
                    'previousPageCssClass'=>'_prev',
                    'maxButtonCount'=>'10',
                ),
                'cssFile'=>'/css/list.css',
                'ajaxUpdate'=>false,
            ));
            ?>
        </div>
    </div>

</div>
