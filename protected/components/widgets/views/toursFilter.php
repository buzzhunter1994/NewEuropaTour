<?
$_country = Yii::app()->request->getParam('country');
$_theme = Yii::app()->request->getParam('tematic');
$_type = Yii::app()->request->getParam('transport');
?>
<select id="country_id" name="country" data-form="select2" data-placeholder="<?=Yii::t('yii', 'Country')?>">
    <option></option>
    <optgroup label="<?=Yii::t('yii', 'TOP countries')?>">
            <?php
            foreach ($topCountries as $country) {
                print "<option data-iso='{$country->iso}'  value='{$country->short_name}'>{$country->name}";
            }
            ?>
            <optgroup label="<?=Yii::t('yii', 'All countries')?>">
                <?php
                foreach ($countries as $country) {
                    $selected = $country->short_name == $_country?' selected':'';
                    print "<option data-iso='{$country->iso}'  value='{$country->short_name}'$selected>{$country->name}";
                }
                ?>
            </optgroup>
</select>
<select id="tematic_id" name="tematic" data-form="select2" data-placeholder="<?=Yii::t('yii', 'Thematics')?>">
    <option></option>
    <?php
    foreach ($themes as $theme) {
        $selected = $theme->theme == $_theme?' selected':'';
        print "<option value='{$theme->theme}'$selected>{$theme->name}";
    }
    ?>
</select>
<select id="transport_id" name="transport" data-form="select2" data-placeholder="<?=Yii::t('yii', 'Transport type')?>">
    <option></option>
    <option value="avia" <?=$_type=='avia'?'selected':''?>><?=Yii::t('yii', 'Aviatour')?>
    <option value="bus" <?=$_type=='bus'?'selected':''?>><?=Yii::t('yii', 'Bus tour')?>
</select>