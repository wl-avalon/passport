<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/14
 * Time: 下午4:30
 */

namespace app\modules\services\outer\commit;
use app\modules\apis\WeiXinApi;
use app\modules\components\PackageParams;
use app\modules\constants\RedisKey;
use app\modules\models\PassportUserModel;
use sp_framework\components\Assert;
use sp_framework\util\RedisUtil;

class LoginService
{
    public static function login($code){
        $response       = WeiXinApi::getSession($code)->toArray();
        $wxSession      = $response['session_key'];
        $unionID        = $response['unionid'];

        $userBean       = PassportUserModel::queryUserByWxUnionID($unionID);
        $memberID       = $userBean->getUuid();
        Assert::isTrue(!empty($userID), "登陆失败,请重试操作", "获取用户信息失败", 403);
        $accessToken    = PackageParams::packageAccessToken($memberID);
        self::setLoginRedis($accessToken, $wxSession, $memberID);
        return [
            'accessToken'   => $accessToken,
            'memberID'      => $unionID,
        ];
    }

    public static function setLoginRedis($accessToken, $wxSession, $memberID){
        $redis          = RedisUtil::getInstance('redis');
        $redisKey       = RedisKey::PASSPORT_USER_ACCESS_TOKEN . $accessToken;
        $redisParams    = [
            'memberID'  => $memberID,
            'wxSession' => $wxSession,
        ];
        $setResult      = $redis->setex($redisKey, 2592000, json_encode($redisParams));
        Assert::isTrue($setResult != false, "登录失败,写入登录信息失败", "写入登录信息失败", 403);
    }
}