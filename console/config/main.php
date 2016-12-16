<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log','oauth2'],
    'controllerNamespace' => 'console\controllers',
    'modules' => [
        'user' => 'dektrium\user\Module',
        'oauth2' => [
            'class' => 'sweelix\oauth2\server\Module',
            'backend' => 'redis',
            'db' => 'redis'
        ],
    ],
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'params' => $params,
];
