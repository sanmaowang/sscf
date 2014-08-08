<?php
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>"Sea Star Children's Foundation",
	'language'=>'zh_cn',
	'timeZone'=>'Asia/Chongqing',
	'theme'=>'bootstrap', 

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.helpers.*',
		'application.extensions.yii-mail.*',
		'application.modules.srbac.controllers.SBaseController', 
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'1',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths'=>array('bootstrap.gii'),
		),
		// srbac
		'srbac'=>array(
			'userclass'=>'User',
			'userid'=>'id',
			'username'=>'username',
			'delimeter'=>'@',
			'debug'=>true,
			'pageSize'=>10,
			'superUser' =>'Admin',
			'css'=>'srbac.css',
			'layout'=>'application.views.layouts.main',
			'notAuthorizedView'=> 'srbac.views.authitem.unauthorized',
			'alwaysAllowed'=>array('SiteLogin','SiteLogout','SiteIndex','SiteError'),
			'userActions'=>array('Show','View','List'),
			'listBoxNumberOfLines' => 15,
			'imagesPath' => 'srbac.images',
			'imagesPack'=>'noia',
			'iconText'=>true,
			'header'=>'srbac.views.authitem.header',
			'footer'=>'srbac.views.authitem.footer',
			'showHeader'=>true,
			'showFooter'=>true,
			'alwaysAllowedPath'=>'srbac.components',
		),
	),

	// application components
	'components'=>array(
		'authManager'=>array(
			'class'=>'application.modules.srbac.components.SDbAuthManager', 
			//'class'=>'CDbAuthManager', 
			'connectionID'=>'db', 
			'itemTable'=>'tb_auth_item', 
			'itemChildTable'=>'tb_auth_item_child', 
			'assignmentTable'=>'tb_auth_assignment', 
		),
		'user'=>array(
			// enable cookie-based authentication
			'class'=>'HUser',
			'loginUrl'=>array('site/login'),
			'allowAutoLogin'=>true,
		),
		'bootstrap'=>array('class'=>'bootstrap.components.Bootstrap'),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString'=>'mysql:host=127.0.0.1;dbname=db_sscf',
			'emulatePrepare'=>true,
			'username'=>'root',
			'password'=>'',
			'charset'=>'utf8',
		),
		'image'=>array(
	      'class'=>'application.extensions.image.CImageComponent',
	      // GD or ImageMagick
	      'driver'=>'GD',
	      // ImageMagick setup path
	      'params'=>array('directory'=>'/opt/local/bin'),
	    ),
		// 'memcache'=>array(
  //       'class'=>'system.caching.CMemCache',
  //       'servers'=>array(
  //           array('host'=>'127.0.0.1', 'port'=>11211, 'weight'=>60),
  //       ),
  //   ),
		/*
	  'mail' => array(
        'class' => 'application.extensions.yii-mail.YiiMail',  
        'transportType'=>'smtp',
        'transportOptions'=>array(
	        'host'=>'smtpcloud.sohu.com',
	        'username'=>'postmaster@hpomail.sendcloud.org',
	        'password'=>'ULqMEink',
	        'port'=>'25',
        ),
        'viewPath' => 'application.views.mail',
    ),
    */
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning, info',
				),
				array(
					'class'=>'ext.log.CampaignOperationDbLogRoute',
					'levels'=>'info',
					'categories'=>'campaign.operation.*',
					'connectionID'=>'db',
					'logTableName'=>'tb_campaign_operation_log', 
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
