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
    public static function checkSession($appID, $secret, $js_code, $grantType){
        $params = [
            'appid'         => $appID,
            'secret'        => $secret,
            'js_code'       => $js_code,
            'grant_type'    => $grantType
        ];
        ApiContext::post('wei_xin_api', 'checkSession', $params);
    }
}