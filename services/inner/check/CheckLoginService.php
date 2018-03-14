<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/14
 * Time: 下午3:22
 */

namespace app\modules\services\inner\check;
use app\modules\constants\RedisKey;
use sp_framework\components\Assert;
use sp_framework\constants\SpErrorCodeConst;
use sp_framework\util\RedisUtil;

class CheckLoginService
{
    public static function checkLogin($memberID, $accessToken){
        $passportKey    = RedisKey::PASSPORT_LOGIN_KEY . "{$memberID}_{$accessToken}";
        $redis          = RedisUtil::getInstance('redis');
        $jsonLoginInfo  = $redis->get($passportKey);
        Assert::isTrue($jsonLoginInfo === false, "连接Redis失败", "连接Redis失败");
        $jsonLoginInfo  = json_decode($jsonLoginInfo, true);
        Assert::isTrue(!empty($jsonLoginInfo['wxSession']), "accessToken失效,请重新登录", "accessToken失效,请重新登录", SpErrorCodeConst::NOT_YET_LOGIN);
        $wxSession      = $jsonLoginInfo['wxSession'];
    }
}