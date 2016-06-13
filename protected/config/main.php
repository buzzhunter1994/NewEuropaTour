<?php
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
Yii::setPathOfAlias('editable', dirname(__FILE__).'/../extensions/x-editable');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'NewEuropaTour',
    'language' => 'ru',
	'preload'=>array('log'),
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.sortable.*',         
        'editable.*',
	),
	'modules'=>array(
        'admin',
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'rtyuehe',
			'ipFilters'=>array('*.*.*.*','::1'),
		),
	),
	'components'=>array(
        'editable' => array(
            'class'     => 'editable.EditableConfig',
            'form'      => 'bootstrap',        //form style: 'bootstrap', 'jqueryui', 'plain' 
            'mode'      => 'popup',            //mode: 'popup' or 'inline'  
            'defaults'  => array(              //default settings for all editable elements
               'emptytext' => 'пусто'
            )
        ),
        'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),
		'request'=>array(
			'enableCookieValidation'=>true,
			'enableCsrfValidation'=>true,
		),
		'user'=>array(
			'allowAutoLogin'=>true,
            'loginUrl'=>array('admin/default/login'),
		),	
		'urlManager'=>array(
            'showScriptName' => false,
			'urlFormat'=>'path',
			'rules'=>array(
				'/country/<name:.*>' =>'countries/view',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				'/post/<url:.*>' =>'news/view',


                '/search' =>'site/search',
				'/about' =>'site/page/view/about',
				'/agency' =>'site/page/view/agency',
				'/faq' =>'site/page/view/faq',
				'/rules' =>'site/page/view/rules',
				'/discount' =>'site/page/view/discount',
				'/tourist_info' =>'site/page/view/tourist_info',
				'/payment' =>'site/page/view/payment',
				'' => 'site/index',
			),
		),
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=neweuropatour',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
            'tablePrefix' => 't_'
		),		
		'errorHandler'=>array(
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
	),
	'params'=>array(
		'languages'=>array('uk'=>'Українська', 'ru'=>'Русский'),
        'isAjax'=> isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest',
		'adminEmail'=>'mc-shura@yandex.ua',
        'webRoot' => dirname(dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..')
	),
);