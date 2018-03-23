<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/23
 * Time: 下午5:36
 */

namespace app\modules\services\outer\commit;
use app\modules\apis\WeiXinApi;

class RegisterService
{
    public static function register($code){
        $response       = WeiXinApi::getSession($code)->toArray();
        $wxSession      = $response['session_key'];
        $openID         = $response['openid'];
        $unionID        = $response['unionid'];

    }
}