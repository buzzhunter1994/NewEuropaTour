<?php $this->breadcrumbs = array(
    'Главная'=>array('/'),
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
                <div class="col-sm-6">
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
                <div class="col-sm-6">
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
        </div>
    </div>
</div>