<!DOCTYPE html>
<!--[if lt IE 7]><html lang="ru" class="lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html lang="ru" class="lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html lang="ru" class="lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="ru">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title><?php echo CHtml::encode($this->pageTitle)?CHtml::encode($this->pageTitle).' | ':''; ?><?php echo Yii::app()->user->name?Yii::app()->user->name:''; ?></title>
	<meta name="description" content="" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="favicon.png" />
	<link rel="stylesheet" href="/themes/custom/libs/bootstrap/bootstrap.min.css" />
    <?php Yii::app()->bootstrap->register(); ?>
	<link rel="stylesheet" href="/themes/custom/libs/font-awesome-4.2.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="/themes/custom/libs/fancybox/jquery.fancybox.css" />
	<link rel="stylesheet" href="/themes/custom/libs/owl-carousel/owl.carousel.css" />
	<link rel="stylesheet" href="/themes/custom/css/fonts.css" />
	<link rel="stylesheet" href="/themes/custom/css/main.css" />
	<link rel="stylesheet" href="/themes/custom/css/media.css" />
</head>
<body>
<?php if(!Yii::app()->user->isGuest){ /*hidden-md hidden-lg hidden-sm */?>
<button id="main_menu_button" class="button offcanvas"><i class="fa fa-bars"></i></button>
    <header class="top_header">
        <nav class="main_menu">
            <ul>
                <li><a href="/admin/categories">Категорії</a></li>
                <li><a href="/admin/posts">Статті</a></li>
                <li><a href="/admin/default/logout">Вихід</a></li>
            </ul>                     
        </nav>		
        <?php                                           
        if($this->menu){
            echo '<nav class="menu">';
    		$this->widget('zii.widgets.CMenu', array('items'=>$this->menu,'htmlOptions'=>array('class'=>'operations')));
            echo '</nav>';
        }
        ?>
    </header><?php } ?>
    <section>
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
    </section>
	<!--[if lt IE 9]>
	<script src="/themes/custom/libs/html5shiv/es5-shim.min.js"></script>
	<script src="/themes/custom/libs/html5shiv/html5shiv.min.js"></script>
	<script src="/themes/custom/libs/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="/themes/custom/libs/respond/respond.min.js"></script>
	<![endif]-->
	<script src="/themes/custom/libs/jquery/jquery-1.11.1.min.js"></script>
	<script src="/themes/custom/libs/jquery/jquery-migrate-git.js"></script>
    <script src="/themes/custom/libs/jquery/jquery.ba-bbq.min.js"></script>	
	<script src="/themes/custom/libs/jquery-mousewheel/jquery.mousewheel.min.js"></script>
	<script src="/themes/custom/libs/fancybox/jquery.fancybox.pack.js"></script>
	<script src="/themes/custom/libs/waypoints/waypoints-1.6.2.min.js"></script>
	<script src="/themes/custom/libs/scrollto/jquery.scrollTo.min.js"></script>
	<script src="/themes/custom/libs/owl-carousel/owl.carousel.min.js"></script>
	<script src="/themes/custom/libs/landing-nav/navigation.js"></script>
	<script src="/themes/custom/libs/bootstrap/bootstrap.js"></script>
	<script src="/themes/custom/js/common.js"></script>
	<!-- Yandex.Metrika counter --><!-- /Yandex.Metrika counter -->
	<!-- Google Analytics counter --><!-- /Google Analytics counter -->
</body>
</html>