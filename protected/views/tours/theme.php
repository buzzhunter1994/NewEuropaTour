<?php
$this->pageTitle = $country->title;
$this->breadcrumbs = array(
    Yii::t('yii','Main')=> Yii::app()->homeUrl,
    Yii::t('yii','Tours') => array('/tours'),
    'Виды туров'
);
?>
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="tour-block">
                <h3><?=Yii::t('yii', 'Selection tours')?></h3>
                <form method="GET" name="search_tours" id="search_tours" action="/tours/search/">
                    <?php $this->widget('application.components.widgets.ToursFilter'); ?>
                    <br />
                    <button class="btn btn-block" onclick="return do_search_tours();"><?=Yii::t('yii', 'show offers')?></button>
                </form>
            </div>
        </div>
        <div class="col-lg-8 col-md-8">
            <div class="row">
                <div class="col-sm-12">
                    <div class="countryDesc searchTourResults clearfix">
                        <h2 class="styled-header"><?=$theme->name?></h2>
                        <?=$theme->description?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <?php
                        foreach ($tours as $tour) {
                            $tourTheme = Yii::t('yii', 'Tour thematics');
                            $tourType = "";
                            switch($tour->type){
                                case 'bus':
                                    $tourType = '<div class="icon iconBus"></div>';
                                    break;
                                case 'avia':
                                    $tourType = '<div class="icon iconAir"></div>';
                                    break;
                                case 'train':
                                    $tourType = '<div class="icon iconTrain"></div>';
                                    break;
                                case 'liner':
                                    $tourType = '<div class="icon iconLiner"></div>';
                                    break;
                            }
                            print <<<HTML
                            <div class="sampleTour">
                                <div class="descriptionCol">
                                    <div class="caption">
                                        <div class="h1">
                                            <a href="/tours/{$tour->id}">{$tour->title}</a>
                                            &nbsp;<small>{$tour->days}</small>
                                        </div>
                                    </div>
                                    <div class="route">{$tour->route}</div>
                                    $tourType
                                </div>
                                <div class="tagsBox clearfix">
                                    <div class="part">
                                        <em>{$tourTheme}:</em>
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