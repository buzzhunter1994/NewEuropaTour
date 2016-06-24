<? foreach ($tours as $tour) {?>

<div class="rec-item col-lg-6 col-md-6">
    <h3><span class="m_flag"><img width='16' height='16' border='0' src='/css/flags/<?=$tour->country->iso?>.png' alt='<?=$tour->country->name?>' title='<?=$tour->country->name?>'></span><a href="/tours/<?=$tour->id?>"> <?=$tour->code?$tour->code.':':''?> <?=$tour->title?><? if($tour->price) {?>, <span class="price" data-toggle="tooltip" data-placement="top" title="<?=Currency::convert($tour->price)?> (<?=Currency::format($tour->price)?>)"><?=Currency::convert($tour->price)?></span><?}?></a></h3>
    <p><?=$tour->description?></p>
    <?
    if ($nearestDate = $tour->nearestDate()){
        print "<span class=\"desc\">".Yii::t('yii', 'Nearest trip').": <span class=\"date\">".date("d.m.Y", strtotime($nearestDate->date_start))."</span></span>";
    }
    ?>
</div>
<? }