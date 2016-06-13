<?php
$this->pageTitle = $country->title;
$this->breadcrumbs = array(
    'Главная'=> Yii::app()->homeUrl,
    'Туры' => array('/tours'),
    'Страны' => array('/countries'),
    $country->name
);
?>
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="tour-block">
                <h3>Подбор туров</h3>
                <form method="GET" name="search_tours" id="search_tours" action="/tours/search/">
                    <input type="hidden" name="sort" id="sort" value="date">
                    <?php $this->widget('application.components.widgets.ToursFilter'); ?>
                    <br />
                    <button class="btn btn-block">показать предложения</button>
                </form>
            </div>
        </div>
        <div class="col-lg-8 col-md-8">
            <div class="row">
                <div class="col-sm-12">
                    <div class="countryDesc searchTourResults clearfix">
                        <h2 class="styled-header"><?=$country->name?></h2>
                        <img src="/images/herbs/<?=$country->short_name?>.gif" border="0" align="right" alt="<?=$country->name?>">

                        <?=$country->description?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <?php
                        foreach ($country->tours as $tour) {
                            print <<<HTML
                            <div class="sampleTour">
                                <div class="descriptionCol">
                                    <div class="caption">
                                        <div class="h1">
                                            <a href="/tours/c1430b56.html">{$tour->title}</a>
                                            &nbsp;<small>{$tour->days}</small>
                                        </div>
                                    </div>
                                    <div class="route">{$tour->route}</div>
                                    <div class="icon iconBus"></div>
                                </div>
                                <div class="tagsBox clearfix">
                                    <div class="part">
                                        <em>Тематика тура:</em>
                                            <span class="label label-tag">{$tour->theme->name}</span>
                                    </div>
                                </div>
                            </div>
HTML;
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>