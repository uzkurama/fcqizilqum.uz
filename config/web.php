<?php
use \kartik\datecontrol\Module;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'language' => 'uz',
    'sourceLanguage' => 'uz',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\Controller',
            'access' => ['@'],
            'disabledCommands' => ['netmount'],
            'roots' => [
                [
                    'baseUrl'=>'@web',
                    'basePath'=>'@webroot',
                    'path' => '/uploads',
                    'name' => 'Global'
                ],
            ],
        ],
    ],
    'components' => [
        'assetManager' => [
            'bundles' => [
                'class' => 'yii\web\AssetManager',
                    'linkAssets' => true,
                    'forceCopy' => true,
            ],
        ],
        'view' => [
            'class' => 'daxslab\taggedview\View',
        ],
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'sourceLanguage' => 'uz',
                ],
            ],
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'dateFormat'=>'dd-MM-yyyy',
            'datetimeFormat' => 'dd-MM-yyyy HH:mm:ss',
        ],
        'request' => [
            'baseUrl' => '',
            'cookieValidationKey' => 'bykZPOsWZRB3GLrfqGf9bPR76qZp78n4',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'class' => 'webvimark\modules\UserManagement\components\UserConfig',

            // Comment this if you don't want to record user logins
            'on afterLogin' => function($event) {
                    \webvimark\modules\UserManagement\models\UserVisitLog::newVisitor($event->identity->id);
                }
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'params' => $params,

    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\admin',
        ],
        'jodit' => [
            'class' => 'yii2jodit\JoditModule',
            'extensions'=>['jpg','png','gif'],
            'root'=> '@webroot/uploads/',
            'baseurl'=> '@web/uploads/',
            'maxFileSize'=> '20mb',
            'defaultPermission'=> 0775,
        ],
        'user-management' => [
		    'class' => 'webvimark\modules\UserManagement\UserManagementModule',
            'enableRegistration' => true,
            'on beforeAction'=>function(yii\base\ActionEvent $event) {
				if ( $event->action->uniqueId == 'user-management/auth/login' )
				{
					$event->action->controller->layout = 'loginLayout.php';
				};
			},
	    ],
        'gridview' =>  [
            'class' => '\kartik\grid\Module',
            'downloadAction'=>'gridview/export/download',
            'i18n' =>  [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@kvgrid/messages',
                'forceTranslation' => true
            ],
        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
