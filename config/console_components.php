<?php
return [
    'log' => [
        'class' => 'sp_framework\ext\log\SpYiiLogDispatcher',
        'traceLevel' => YII_DEBUG ? 3 : 0,
        'logger' => 'sp_framework\ext\log\SpYiiLogger',
        'targets' => [
            [
                'class' => 'sp_framework\ext\log\SpYiiLogFileTarget',
                'log_level' => 16,
                'log_path' => '/home/saber/logs',
            ],
        ],
    ],
    'db_passport' => [
        'dsn'           => 'mysql:host=123.56.156.172; dbname=passport',
        'username'      => 'passport_rd',
        'password'      => 'Wzj769397',
        'class'         => 'yii\db\Connection',
        'charset'       => 'utf8',
        'attributes'    => [
            PDO::ATTR_TIMEOUT => 1,
        ],
    ],
];