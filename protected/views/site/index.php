<?php
$this->pageTitle=Yii::t('yii','Main');
?>
<?php if(Yii::app()->user->hasFlash('order')): ?>
    <div class="container">
        <br />
        <br />
        <div class="alert alert-success">
            <?php echo Yii::app()->user->getFlash('order'); ?>
        </div>
    </div>
<?php endif; ?>
<div class="block">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-8">
				<header>
					<h2 class="caption-red styled-header">NewEuroTour рекомендует</h2>
				</header>
				<div class="row">
                    <?php $this->widget('application.components.widgets.RecommendTours'); ?>
				</div>
			</div>
			<div class="col-lg-3 col-md-4">
				<div class="subscribe-block">
                    <header><h3><?=Yii::t('yii','Subscribe to Newsletter')?></h3></header>
                    <input type="text" placeholder="<?=Yii::t('yii','email')?>">
                    <input type="text" placeholder="<?=Yii::t('yii','name')?>">
                    <input type="text" placeholder="<?=Yii::t('yii','city')?>">
                    <button class="btn btn-block"><?=Yii::t('yii','Subscribe')?></button>
				</div>

                <div class="hidden-sm hidden-xs">
                    <br /><br />
                    <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-small-header="false" data-height="400" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/facebook"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div></div>
                </div>
			</div>
		</div>
	</div>
</div>
<div class="container">
    <header>
        <h2>Сезон 2016</h2>
    </header>
    <div class="row">
        <?php $this->widget('application.components.widgets.LastTours'); ?>
    </div>
</div>

<div class="block block-grey">
	<div class="container">
		<header>
			<h2 class="styled-header">Наши новости</h2>
		</header>	
		<div class="row">
			<div class="col-sm-6 col-md-3 col-lg-3 blog-item">
				<span class="date">24.05.2016</span>
				<h3>Праздник середины лета в Швеции!</h3>
				<p>В этом году Мидсоммар, или Праздник середины лета, шведы будут отмечать 23 июня. Предлагаем и вам повеселиться на этом шведском празднике, отправившись с нами в тур по Скандинавии S2 Скандинавия комфорт 18 июня.</p>
			</div>
			<div class="col-sm-6 col-md-3 col-lg-3 blog-item">
				<span class="date">24.05.2016</span>
				<h3>Праздник середины лета в Швеции!</h3>
				<p>В этом году Мидсоммар, или Праздник середины лета, шведы будут отмечать 23 июня. Предлагаем и вам повеселиться на этом шведском празднике, отправившись с нами в тур по Скандинавии S2 Скандинавия комфорт 18 июня.</p>
			</div>
			<div class="col-sm-6 col-md-3 col-lg-3 blog-item">
				<span class="date">24.05.2016</span>
				<h3>Праздник середины лета в Швеции!</h3>
				<p>В этом году Мидсоммар, или Праздник середины лета, шведы будут отмечать 23 июня. Предлагаем и вам повеселиться на этом шведском празднике, отправившись с нами в тур по Скандинавии S2 Скандинавия комфорт 18 июня.</p>
			</div>
			<div class="col-sm-6 col-md-3 col-lg-3 blog-item">
				<span class="date">24.05.2016</span>
				<h3>Праздник середины лета в Швеции!</h3>
				<p>В этом году Мидсоммар, или Праздник середины лета, шведы будут отмечать 23 июня. Предлагаем и вам повеселиться на этом шведском празднике, отправившись с нами в тур по Скандинавии S2 Скандинавия комфорт 18 июня.</p>
			</div>
		</div>
	</div>
</div>
<div class="block block-grey">
	<div class="container">
		<header>
			<h2 class="styled-header">Интересное в нашем блоге</h2>
		</header>
		<div class="row">
			<div class="col-sm-6 col-md-3 col-lg-3 blog-item">
				<span class="date">24.05.2016</span>
				<h3>Праздник середины лета в Швеции!</h3>
				<img src="http://dummyimage.com/250x115/3069b3/fff.png" class="img-responsive" alt="Responsive image">
				<p>В этом году Мидсоммар, или Праздник середины лета, шведы будут отмечать 23 июня. Предлагаем и вам повеселиться на этом шведском празднике, отправившись с нами в тур по Скандинавии S2 Скандинавия комфорт 18 июня.</p>
			</div>
            <div class="col-sm-6 col-md-3 col-lg-3 blog-item">
				<span class="date">24.05.2016</span>
				<h3>Праздник середины лета в Швеции!</h3>
				<img src="http://dummyimage.com/250x115/3069b3/fff.png" class="img-responsive" alt="Responsive image">
				<p>В этом году Мидсоммар, или Праздник середины лета, шведы будут отмечать 23 июня. Предлагаем и вам повеселиться на этом шведском празднике, отправившись с нами в тур по Скандинавии S2 Скандинавия комфорт 18 июня.</p>
			</div>
            <div class="col-sm-6 col-md-3 col-lg-3 blog-item">
				<span class="date">24.05.2016</span>
				<h3>Праздник середины лета в Швеции!</h3>
				<img src="http://dummyimage.com/250x115/3069b3/fff.png" class="img-responsive" alt="Responsive image">
				<p>В этом году Мидсоммар, или Праздник середины лета, шведы будут отмечать 23 июня. Предлагаем и вам повеселиться на этом шведском празднике, отправившись с нами в тур по Скандинавии S2 Скандинавия комфорт 18 июня.</p>
			</div>
            <div class="col-sm-6 col-md-3 col-lg-3 blog-item">
				<span class="date">24.05.2016</span>
				<h3>Праздник середины лета в Швеции!</h3>
				<img src="http://dummyimage.com/250x115/3069b3/fff.png" class="img-responsive" alt="Responsive image">
				<p>В этом году Мидсоммар, или Праздник середины лета, шведы будут отмечать 23 июня. Предлагаем и вам повеселиться на этом шведском празднике, отправившись с нами в тур по Скандинавии S2 Скандинавия комфорт 18 июня.</p>
			</div>
		</div>
	</div>
</div>
<div class="seo-text">
    <div class="container">
        <header>
            <h2>Приглашаем в путешествие вместе с компанией «NEWEUROTOUR»!</h2>
        </header>
        <article>
            <p>Бюро путешествий «NewEuroTour» подарит вам отдых, о котором вы всегда мечтали! Весь комплекс услуг: горящие путевки, морские круизы, корпоративный отдых, размещение в гостиницах Минска, авиатуры, раннее бронирование. Мы организовываем туристические поездки в любой уголок мира!</p>
            <p>Проведите недельку на солнечном побережье Турции, окунитесь в атмосферу средневековой Чехии, устройте семейный отдых в Европе или прокатитесь по Беларуси. С нами возможно всё!</p>
            <p>Компания «NewEuroTour» — один из крупнейших туристических операторов Беларуси, ежегодный объём составляет более 10 тысяч туродней. Мы предлагаем комплексные решения: возьмём на себя все этапы организации свадебного путешествия, подберем подходящий вариант семейного отдыха, поможем разработать маршрут для активного путешествия, решим вопрос «здесь и сейчас», предложив вам дешево горячие туры в любую страну.</p>
            <p>Благодаря налаженной работе с ведущими туроператорами по всему миру, мы можем организовать максимально дешевые туры. Какой туризм вас интересует: хотите ли вы устроить семейный отдых, интересуют горячие путевки или просто нужно быстро оформить визу — мы решим любой вопрос!</p>
            <p>Если вы ищите магазин горячих путевок в Минске — вы пришли по адресу. У нас вы найдёте горячие туры в любой уголок мира: в Кубу, Турцию, Италию, Черногорию, Таиланд, Египет, Грецию и др.</p>
        </article>
    </div>
</div>

<? Yii::app()->clientScript->registerScript('javascript', "
    var maxheight = 0;
    $(\".descriptionTour\").each(function() {
        if($(this).height() > maxheight) { maxheight = $(this).height(); }
    });
    $(\".descriptionTour\").height(maxheight);

", CClientScript::POS_READY);