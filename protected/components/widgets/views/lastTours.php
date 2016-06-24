<? foreach ($tours as $tour) {?>
    <div class="col-sm-6 col-md-3 col-lg-3">
        <div class="tour-thumb">
            <img src="<?=$tour->pic?>" class="img-responsive img-circle" alt="Responsive image">
            <h3 class="styled-header"><?=$tour->title?></h3>
            <p class="descriptionTour"><?=$tour->description?></p>
            <a class="btn-yellow btn-block" href="/tours/<?=$tour->id?>" role="button"><?=Yii::t('yii', 'details');?></a>
        </div>
    </div>
<? }