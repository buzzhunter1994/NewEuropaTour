<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="stylesheet" type="text/css" href="/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="/css/main.css" />
	<link rel="stylesheet" type="text/css" href="/css/form.css" />
	<title><?php echo Yii::app()->user->name?Yii::app()->user->name.' | ':''; ?><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="container" id="page">
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
                array('label'=>'Категории', 'url'=>array('/admin/categories'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Статьи', 'url'=>array('/admin/posts'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Видео', 'url'=>array('/admin/videos'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Левое меню', 'url'=>array('/admin/LeftMenu'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Главное меню', 'url'=>array('/admin/mainMenu'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Галерея', 'url'=>array('/admin/gallery'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Администрация', 'url'=>array('/admin/administration'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Шаблон', 'url'=>array('/admin/template'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Хранилище', 'url'=>array('/admin/storage'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Backup', 'url'=>array('/admin/backup'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Выход', 'url'=>array('/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div>
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?>
	<?php endif?>
	<?php echo $content; ?>
	<div class="clear"></div>
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by school 28.<br/>
		All Rights Reserved.
	</div>
</div>
</body>
</html>
