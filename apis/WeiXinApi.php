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
    const TEACHER_APP_ID            = "wx9df0d56749f4bddd";
    const TEACHER_SECRET            = "4a775ed373f8c78cf063b108cf8ceedc";
    const PARENT_APP_ID             = "wx4fad55e1b1555858";
    const PARENT_SECRET             = "4a775ed373f8c78cf063b108cf8ceedc";
    const SESSION_TYPE              = "authorization_code";
    const ACCESS_TOKEN_TYPE         = "client_credential";

    public static $appIDMap = [
        1   => 'wx9df0d56749f4bddd',    //教师端
        2   => 'wx4fad55e1b1555858',    //家长端
    ];
    public static $secretMap = [
        1   => '4a775ed373f8c78cf063b108cf8ceedc',    //教师端
        2   => '6d2401cfcf88ad88be9add9aa75b0232',    //家长端
    ];

    public static function getSession($js_code, $registerFrom){
        $params = [
            'appid'         => self::$appIDMap[$registerFrom],
            'secret'        => self::$secretMap[$registerFrom],
            'js_code'       => $js_code,
            'grant_type'    => self::SESSION_TYPE
        ];
        return ApiContext::post('weixin', 'getSession', $params)->throwWhenFailed();
    }

    public static function getAccessToken($registerFrom = 1){
        $params = [
            'appid'         => self::$appIDMap[$registerFrom],
            'secret'        => self::$secretMap[$registerFrom],
            'grant_type'    => self::ACCESS_TOKEN_TYPE
        ];
        return ApiContext::post('weixin', 'getAccessToken', $params);
    }
}