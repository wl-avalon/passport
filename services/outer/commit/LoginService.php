<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/14
 * Time: 下午4:30
 */

namespace app\passport\services\outer\commit;
use app\modules\apis\WeiXinApi;
use app\modules\constants\RedisKey;
use sp_framework\components\Assert;
use sp_framework\util\RedisUtil;

class LoginService
{
    public static function login($code){
        $response       = WeiXinApi::getSession($code)->toArray();
        $wxSession      = $response['session_key'];
        $openID         = $response['openid'];
        $unionID        = $response['unionid'];
        $redis          = RedisUtil::getInstance('redis');
        $redisKey       = RedisKey::PASSPORT_USER_ACCESS_TOKEN . $unionID;
        $accessToken    = "ACCESS_TOKEN_" . md5($unionID) . "_" . md5(time());

        $redisParams    = [
            'accessToken'   => $accessToken,
            'wxSession'     => $wxSession,
        ];
        $setResult      = $redis->setex($redisKey, 2592000, json_encode($redisParams));
        Assert::isTrue($setResult != false, "登录失败,写入登录信息失败", "写入登录信息失败");
        return [
            'accessToken'   => $accessToken,
            'memberID'      => $unionID,
        ];
    }
}