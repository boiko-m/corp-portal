<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'sourceLanguage' => 'ru',
    'language' => 'ru',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'vote' => [
            'class' => hauntd\vote\Module::class,
            'guestTimeLimit' => 3600,
            'entities' => [
                // Entity -> Settings
                'itemVote' => app\models\News::class, // your model
                'itemVoteGuests' => [
                    'modelName' => app\models\News::class, // your model
                    'allowGuests' => true,
                    'allowSelfVote' => false,
                    'entityAuthorAttribute' => 'user_id',
                ],
                'itemLike' => [
                    'modelName' => app\models\News::class, // your model
                    'type' => hauntd\vote\Module::TYPE_TOGGLE, // like/favorite button
                ],
                'itemFavorite' => [
                    'modelName' => app\models\News::class, // your model
                    'type' => hauntd\vote\Module::TYPE_TOGGLE, // like/favorite button
                ],
            ],
        ],
        'notifications' => [
            'class' => 'webzop\notifications\Module',
            'channels' => [
                'screen' => [
                    'class' => 'webzop\notifications\channels\ScreenChannel',
                ],
                'email' => [
                    'class' => 'webzop\notifications\channels\EmailChannel',
                    'message' => [
                        'from' => 'test@test.com'
                    ],
                ],
            ],
        ],
        'comments' => [
            'class' => 'ogheo\comments\Module'
        ],
        'im' => [
            'class' => 'app\modules\conversation\ConversationModule',
            'as access' => [
                'class' => yii2mod\rbac\filters\AccessControl::class
            ],
        ],
        'admin' => [
            'class' => 'app\modules\admin\AdminModule',
            'layout' => '/admin',
            'as access' => [
                'class' => yii2mod\rbac\filters\AccessControl::class
            ],
            /*'as access' => [
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['viewAdminPanel'],
                    ]
                ]
            ],*/
        ],
        'rbac' => [
            'class' => 'yii2mod\rbac\Module',
            'layout' => '/admin',
            //'sourceLanguage' => 'ru',
            'as access' => [
                'class' => yii2mod\rbac\filters\AccessControl::class
            ],
            ]

    ],
    'components' => [
        /*'session'=>[
            'class'=>'yii\web\DbSession',
            'writeCallback'=>function($session)
            {
                return [
                    'user_id'=>Yii::$app->user->id,
                ];
            }
        ],*/
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '7UNVz0EmjzrmhMLgN5GnWJBUcvwoL2d_',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['user/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'messageConfig' => [
            'charset' => 'UTF-8',
                'from' => ['portal@lbr.ru' => 'Корпоративный портал'],
            ],
            'transport' => [
                 'class' => Swift_SmtpTransport::class,
                 'host' => '185.31.92.231',
                 'username' => 'portal',
                 'password' => 'nQJIvXf3zSVDSRU9LT3R',
                 'port' => '2525',
             ],
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
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest', 'user'],
        ],
        'i18n' => [
            'translations' => [
                'rbac' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'ru',
                    'basePath' => '@vendor/yii2mod/yii2-rbac/messages',
                ],
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages', // if advanced application, set @frontend/messages
                    'sourceLanguage' => 'ru',
                    'fileMap' => [
                        //'main' => 'main.php',
                    ],
                ],

            ],
        ],
        'db' => $db,
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'jsOptions' => [ 'position' => \yii\web\View::POS_HEAD ],

                ],
                    'yii\bootstrap\BootstrapAsset' => [
                        'css' => [],
                    ]
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [

                '<controller:(comments)>/<action:(create|update|delete|rate)>' => '/<controller>/default/<action>',


                '<controller:[\w\-]+>' => '<controller>/index',
                '<controller:[\w\-]+>/<id:\d+>' => '<controller>/view',
                '<controller:[\w\-]+>/<action:[\w\-]+>/<id:\d+>' => '<controller>/<action>',

                '<controller:[\w\-]+>/<action:[\w\-]+>' => '<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>'
            ]

        ],
        'setting' => [
            'class' => 'app\models\SettingValues',
        ],
    ],
    'as beforeRequest' => [
        'class' => 'yii\filters\AccessControl',
        'rules' => [
            [
                'actions' => ['login', 'error'],
                'allow' => true,
            ],
            [
                'controllers' => ['analog'],
                'actions' => ['index'],
                'allow' => true,
            ],
            [
                'controllers' => ['agree'],
                'actions' => ['index'],
                'allow' => true,
            ],
            [
                'allow' => true,
                'roles' => ['@'],
            ],
        ],
    ],
    'params' => $params,

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
