<?php

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
    'components' => [
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js'=>[],
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js'=>[],
                ],

                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
                'class' => 'yii\web\AssetManager',
                    'linkAssets' => true,
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
        'request' => [
            'baseUrl' => '',
            'cookieValidationKey' => 'bykZPOsWZRB3GLrfqGf9bPR76qZp78n4',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
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
