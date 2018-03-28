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
    const APP_ID        = "wx9df0d56749f4bddd";
    const SECRET        = "4a775ed373f8c78cf063b108cf8ceedc";
    const GRANT_TYPE    = "authorization_code";
    public static function getSession($js_code){
        $params = [
            'appid'         => self::APP_ID,
            'secret'        => self::SECRET,
            'js_code'       => $js_code,
            'grant_type'    => self::GRANT_TYPE
        ];
        return ApiContext::post('weixin', 'getSession', $params)->throwWhenFailed();
    }
}