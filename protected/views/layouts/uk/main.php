<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="<?php echo $this->storage_value('keywords') ?>" />
    <meta name="description" content="<?php echo $this->storage_value('description') ?>" />
    <?php
    Yii::app()->bootstrap->register();
    Yii::app()->clientScript->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css');
    Yii::app()->clientScript->registerCssFile('/css/jquery.bxslider.css');
    Yii::app()->clientScript->registerCssFile('/css/site.css');
    ?>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
<div class="wrap">
    <header>
        <div class="container">
            <div class="row p_r">
                <div class="col-md-8 col-lg-8">
                    <div class="logo">
                        <a href="/"><img src="/css/logo.png" class="hidden-xs"></a>
                        <a href="/"><img src="/css/mini-logo.png" class="mini visible-xs"></a>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 contacts">
                    <span>+375-17 <strong>306 46 56</strong></span>
                    <span>+375-17 <strong>227 18 22</strong></span>
                    <span>+375-17 <strong>335 26 82</strong></span>
                    <span>пр. Незалежності, 44</span>
                </div>
                <?php $this->widget('application.components.widgets.LanguageSelector'); ?>
            </div>
            <div class="row">
                <nav class="main-menu-wrap">
                    <div class="col-lg-8 col-md-8 col-xs-12">
                        <button id="main_menu_button"></button>
                        <ul class="main-menu">
                            <li><a href="/tours">Каталог турів</a></li>
                            <li><a href="/blog">Блог</a></li>
                            <li class="dropdown"><a href="#">Туристам <span class="caret"></span></a>
                                <ul>
                                    <li><a href="/tourist_info">Інформація з відправлення</a></li>
                                    <li><a href="/payment">Способи оплати</a></li>
                                    <li><a href="/rules">Правила</a></li>
                                    <li><a href="/discount">Скидки та сертифікати</a></li>
                                </ul>
                            </li>
                            <li><a href="/agency">Агенствам</a></li>
                            <li class="dropdown"><a href="#">Про Компанію <span class="caret"></span></a>
                                <ul>
                                    <li><a href="/news">Новини</a></li>
                                    <li><a href="/reviews">Відгуки</a></li>
                                    <li><a href="/about">Про нас</a></li>
                                    <li><a href="/site/contact">Контакти</a></li>
                                </ul>
                            </li>
                            <li><a href="/faq">Питання-Відповіді</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-4 hidden-xs hidden-sm">
                        <form action="/search" method="GET" class="search-form">
                            <input name="q" type="text" class="search-box" placeholder="Пошук по сайту" /><span></span>
                        </form>
                    </div>
                </nav>
            </div>
            <?php
            $controller = Yii::app()->controller;
            if ($controller->id == 'site' && $controller->action->id=='index')
            {
            ?>
            <div class="row">
                <div class="col-lg-9 col-md-8 hidden-xs hidden-sm">
                    <div id="slider">
                        <div>
                            <a href="#"><img src="http://i.ytimg.com/vi/TRWRX3_AuzA/maxresdefault.jpg" alt="" /></a>
                            <div class="caption">
                                <div class="title">
                                    <a href="#">Франція - країна романтичних пейзажів і безцінних творів мистецтва!</a>
                                </div>Повний каталог екскурсійних автобусних турів до Франції 2016.
                            </div>
                        </div>
                        <div>
                            <a href="#"><img src="http://wallpaperstrend.com/wp-content/uploads/Architecture/Architecture01/hd-wallpaper-hd.jpeg" alt="" /></a>
                            <div class="caption">
                                <div class="title">
                                    <a href="#">Франція - країна романтичних пейзажів і безцінних творів мистецтва!</a>
                                </div>Повний каталог екскурсійних автобусних турів до Франції 2016.
                            </div>
                        </div>
                    </div>
                    <div class="sliderHot"><span>Горячие предложения</span></div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="tour-search">
                        <h3>Швидкий підбір турів</h3>
                        <form method="GET" name="search_tours" id="search_tours" action="/tours/search/" class="tour-search-form">

                            <?php $this->widget('application.components.widgets.ToursFilter'); ?>
                            <br />
                            <a href="javascript:void(0);" class="search-tour-btn" onclick="return do_search_tours();"><?=Yii::t('yii','show offers')?></a>
                        </form>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </header>
    <?php if ($this->breadcrumbs) { ?>
        <div class="container">
            <?php
            $this->widget('zii.widgets.CBreadcrumbs', array(
                'links'=> $this->breadcrumbs,
            ));
            ?>
        </div>
    <?php } ?>
    <?php echo $content; ?>
    <div class="hFooter"></div>
</div>
<footer class="footer">
    <div class="container">
        <p class="pull-left footer-text">&copy; <?= date('Y') ?> ООО "NEWEUROTOUR".<br />Всі права захищені. Свідоцтво про державну реєстрацію № 800001036 від 28.01.2014.</p>
        <p class="pull-right">
            <a class="soc-icon tw-icon" href="#"></a>
            <a class="soc-icon vk-icon" href="#"></a>
            <a class="soc-icon fb-icon" href="#"></a>
            <a class="soc-icon inst-icon" href="#"></a>
            <a class="soc-icon ok-icon" href="#"></a>
        </p>
    </div>
</footer>
<div id="fb-root"></div>
<div class="modal fade" id="modalWindow">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        </div>
    </div>
</div>
<script src="/js/jquery.bxslider.min.js"></script>
<script src="/js/jquery.inputmask.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
<script src="/js/script.js"></script>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.6";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>