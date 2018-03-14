<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/14
 * Time: 下午4:13
 */

namespace app\modules\apis;

use sp_framework\apis\ApiContext;

class WeiXinApi
{
    public static function getSession($js_code){
        $params = [
            'appid'         => 'wxaba3a1bb01b4cc5d',
            'secret'        => '058ba2c30fafe0142a890c28b7a47505',
            'js_code'       => $js_code,
            'grant_type'    => 'authorization_code'
        ];
        return ApiContext::post('weixin', 'getSession', $params)->throwWhenFailed();
    }
}