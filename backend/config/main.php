<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log','oauth2'],
    'modules' => [
        'rbac' => 'dektrium\rbac\RbacWebModule',
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableFlashMessages' => false,
            'admins' => ['dixon'],
            'adminPermission' => 'Admin',
            'urlPrefix'=> 'auth',
            'enableRegistration'=> false,
            'modelMap' => [
                'User' => 'common\models\OauthUser',
            ],
        ],
        'oauth2' => [
            'class' => 'sweelix\oauth2\server\Module',
            'backend' => 'redis',
            'db' => 'redis',
            'identityClass' => 'common\models\OauthUser',
            'enforceState' => false,
            'allowImplicit' => true,
            // 'allowJwtAccesToken' => true,
        ],
        'api' => [
            'class' => 'backend\modules\api\Module',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
            'enableCsrfValidation' => false,
        ],
        'user' => [
            'class' => 'sweelix\oauth2\server\web\User',
            'identityClass' => 'dektrium\user\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'api/v1/user'
                    ],
                    'extraPatterns' => [
                        'GET info' => 'info',
                    ]
                ]
            ])
        ],
    ],
    'params' => $params,
];
