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
    const APP_ID            = "wx9df0d56749f4bddd";
    const SECRET            = "4a775ed373f8c78cf063b108cf8ceedc";
    const SESSION_TYPE      = "authorization_code";
    const ACCESS_TOKEN_TYPE = "client_credential";

    public static function getSession($js_code){
        $params = [
            'appid'         => self::APP_ID,
            'secret'        => self::SECRET,
            'js_code'       => $js_code,
            'grant_type'    => self::SESSION_TYPE
        ];
        return ApiContext::post('weixin', 'getSession', $params)->throwWhenFailed();
    }

    public static function getAccessToken(){
        $params = [
            'appid'         => self::APP_ID,
            'secret'        => self::SECRET,
            'grant_type'    => self::ACCESS_TOKEN_TYPE
        ];
        return ApiContext::post('weixin', 'getAccessToken', $params);
    }
}