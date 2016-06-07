<div class="language-select">
    <?php
    foreach($languages as $key=>$lang) {
        if ($key != $currentLang) {
            echo CHtml::link(
                '<img src="/css/' . $key . '.png" title="' . $lang . '" style="padding: 1px;" width=32 height=32>',
                $this->getOwner()->createMultilanguageReturnUrl($key));
        } else {
            echo '<img src="/css/' . $key . '.png" title="' . $lang . '" style="padding: 1px;" width=32 height=32>';
        }
    }
    ?>
</div>