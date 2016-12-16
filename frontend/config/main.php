<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableFlashMessages' => false,
            'admins' => ['dixon'],
            'adminPermission' => 'Admin',
            //'urlPrefix'=>'auth'
        ],
        'rbac' => 'dektrium\rbac\RbacWebModule',
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => array_merge(
                require(__DIR__ . '/../../common/config/_rulesUser.php'),[
            ])
        ],
        'authClientCollection' => [
            'class'   => \yii\authclient\Collection::className(),
            'httpClient' => [
                'transport' => 'yii\httpclient\CurlTransport',
            ],
            'clients' => [
               'doh' => [
                    'class' => 'frontend\components\DohClient',
                    'clientId' => getenv('CLIENT_ID'),
                    'clientSecret' => getenv('CLIENT_SECRET'),
                ],
            ],
        ]
    ],
    'params' => $params,
];
