<?
$this->pageTitle='Заказ тура';
$this->breadcrumbs = array(
    Yii::t('yii','Main')=> Yii::app()->homeUrl,
    'Подтверждение заказа тура',
);
$tourType = "";
switch($trip->tour->type){
    case 'bus':
        $tourType = '<div class="icon iconBus"></div>';
        break;
    case 'air':
        $tourType = '<div class="icon iconAir"></div>';
        break;
    case 'train':
        $tourType = '<div class="icon iconTrain"></div>';
        break;
    case 'liner':
        $tourType = '<div class="icon iconLiner"></div>';
        break;
}
$touristData = '';
$touristCount = $form['users_cnt'];
if ($touristCount < 5){
    for($i=1;$i<$touristCount+1;$i++){
        $touristData .= '<div class="info clearfix"><p>'.$form['fio_'.$i].'</p><p>'.$form['birthday_'.$i].'</p></div>';
    }
} else {
    $touristData .= '<div class="info clearfix"><p>'.$form['msg'].'</p></div>';
}
$touristCount = $touristCount<5?$touristCount:'5 и более';
$orderedPlaces = $form['ordered_places']?$form['ordered_places']:'не выбрано (будет определено менеджером по туру)';
$form['action'] = 'confirm';
?>
<form action="/tours/confirm" method="post" id="fwork">
    <input type="hidden" name="OrderForm[action]" value="confirm">
    <input type="hidden" name="OrderForm[ordered_places]" value="<?=$orderedPlaces?>">
    <input type="hidden" name="OrderForm[users_cnt]" value="<?=$form['users_cnt']?>">
    <input type="hidden" name="OrderForm[tour_id]" value="<?=$trip->tour->id?>">
    <input type="hidden" name="OrderForm[trip_id]" value="<?=$trip->id?>">
    <input type="hidden" name="OrderForm[fio]" value="<?=$form['fio']?>">
    <input type="hidden" name="OrderForm[email]" value="<?=$form['email']?>">
    <input type="hidden" name="OrderForm[phone]" value="<?=$form['phone']?>">
    <input type="hidden" name="OrderForm[fio_1]" value="<?=$form['fio_1']?>">
    <input type="hidden" name="OrderForm[birthday_1]" value="<?=$form['birthday_1']?>">
    <input type="hidden" name="OrderForm[fio_2]" value="<?=$form['fio_2']?>">
    <input type="hidden" name="OrderForm[birthday_2]" value="<?=$form['birthday_2']?>">
    <input type="hidden" name="OrderForm[fio_3]" value="<?=$form['fio_3']?>">
    <input type="hidden" name="OrderForm[birthday_3]" value="<?=$form['birthday_3']?>">
    <input type="hidden" name="OrderForm[fio_4]" value="<?=$form['fio_4']?>">
    <input type="hidden" name="OrderForm[birthday_4]" value="<?=$form['birthday_4']?>">
    <input type="hidden" name="YII_CSRF_TOKEN" value="<?=Yii::app()->request->csrfToken?>">
</form>

<div class="container">
    <div class="sampleTour">
        <div class="descriptionCol">
            <div class="caption">
                <h1>
                    <span class="red"><?=$trip->tour->code?> </span><?=$trip->tour->title?>
                </h1>
            </div>
            <div class="route">
                <?=$trip->tour->route?>
            </div>
            <?=$tourType?>
        </div>
        <div class="confirmDetails">
            <div class="itemRow">
                <div class="itemRowCaption clearfix">
                    <span>ФИО:</span><?=$form['fio']?>
                </div>
            </div>
            <div class="itemRow">
                <div class="itemRowCaption clearfix">
                    <span>E-mail:</span><?=$form['email']?>
                </div>
            </div>
            <div class="itemRow">
                <div class="itemRowCaption clearfix">
                    <span>Контактный номер:</span><?=$form['phone']?>
                </div>
            </div>
            <div class="itemRow">
                <div class="itemRowCaption clearfix">
                    <span>Дата заезда:</span><?=$trip->selfDate()?>
                </div>
            </div>
            <div class="itemRow">
                <div class="itemRowCaption clearfix">
                    <span>Описание:</span><?=$trip->tour->days?>
                </div>
            </div>
            <div class="itemRow">
                <div class="itemRowCaption clearfix">
                    <span>Кол-во туристов:</span><?=$touristCount?>
                </div>
                <div class="touristsData">
                    <strong>Данные по туристам:</strong>
                    <?=$touristData?>
                </div>
            </div>
            <div class="itemRow">
                <div class="itemRowCaption clearfix">
                    <span>Выбранные места в автобусе:</span><?=$orderedPlaces?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 t-a_c">
            <button class="button button-rounded button-default button-big" onclick="do_confirm_order()" id="orderButton">ОТПРАВИТЬ ЗАКАЗ</button>
        </div>
    </div>
</div>
<? Yii::app()->clientScript->registerScript('javascript', "
    function do_confirm_order(){
        $('#fwork').submit();
    }

", CClientScript::POS_END);