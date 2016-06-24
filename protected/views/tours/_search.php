<?
$tourTheme = Yii::t('yii', 'Tour thematics');
$tourType = "";
switch($data->type){
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
                    <a href="/tours/{$data->id}">{$data->title}</a>
                    &nbsp;<small>{$data->days}</small>
                </div>
            </div>
            <div class="route">{$data->route}</div>
            $tourType
        </div>
        <div class="tagsBox clearfix">
            <div class="part">
                <em>{$tourTheme}:</em>
                <span class="label label-tag">{$data->theme->name}</span>
            </div>
        </div>
    </div>
HTML;
