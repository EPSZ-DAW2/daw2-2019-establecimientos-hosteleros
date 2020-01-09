<?php

$params = require __DIR__.'/params.php';
$db     = require __DIR__.'/db.php';

$config = [
    'name'       => 'Valoracion',
    'id'         => 'basic',
    'basePath'   => dirname(__DIR__),
    'bootstrap'  => ['log'],
    'aliases'    => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request'      => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '5VrG416EkLB9S6AdR-60VAe-tPLjHna1',
        ],
        'cache'        => [
            'class' => 'yii\caching\FileCache',
        ],
        'user'         => [
            'identityClass'   => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer'       => [
            'class'            => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log'          => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],

        'view'         => [
            'theme' => [
                'pathMap' => ['@app/views' => '@app/themes/iphone7-yii2-1473294825'],
                'baseUrl' => '@web/../themes/iphone7-yii2-1473294825',
            ],
        ],
        'db'           => $db,

        /*'urlManager'   => [
    'enablePrettyUrl' => true,
    'showScriptName'  => false,
    'rules'           => [
    ['class' => 'yii\rest\UrlRule', 'controller' => 'zonas'],

    ],
    ],*/

    ],

    'params'     => $params,
    'modules'    => [
        'db-manager' => [
            'class'     => 'bs\dbManager\Module',
            // path to directory for the dumps
            'path'      => '@app/backups',
            // list of registerd db-components
            'dbList'    => ['db'],
            'as access' => [
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ]],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][]      = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][]    = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
    $config['modules']['db-manager'] = [
        'class' => 'bs\dbManager\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],

    ];
}

return $config;
