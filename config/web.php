<?php
$config = [
    'id' => 'passport',
    'timeZone'=>'Asia/Shanghai',
    'basePath' => dirname(dirname(__DIR__)),
    'bootstrap' => ['log'],
    'aliases' => [
        '@sp_framework' => '@app/../sp_framework',
    ],
    'controllerNamespace' => 'app\modules\controllers',
    'modules' => [
        'passport' => ['class' => 'app\modules\Module'],
    ],
    'components' => include(__DIR__ . '/components.php'),
    'params' => include (__DIR__ . '/params.php'),
];
return $config;
