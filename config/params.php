<?php

return [
    'adminEmail' => 'admin@example.com',
    'idAlloc' => [
        'domain'    => 'http://123.56.156.172:4021',
        'apis' => [
            'nextId'    => '/nextId',      //取一个ID
            'batch'     => '/batch',        //取多个ID
        ],
    ],
    'redis' => [
        'host'          => '123.56.156.172:6379',
        'retry'         => '1',
        'timeout'       => 10000,
        'conntimeout'   => 5000,
    ],
    'weixin'   => [
        'domain'    => 'https://api.weixin.qq.com',
        'apis' => [
            'getSession'        => '/sns/jscode2session',   //校验微信的登录Session
            'getAccessToken'    => '/cgi-bin/token',        //获取accessToken
        ],
    ],
];
