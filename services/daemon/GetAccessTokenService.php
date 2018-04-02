<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/29
 * Time: 下午12:01
 */

namespace app\modules\services\daemon;


use app\modules\apis\WeiXinApi;
use app\modules\constants\RedisKey;
use sp_framework\util\RedisUtil;

class GetAccessTokenService
{
    public static function getAccessToken(){
        $getResponse    = WeiXinApi::getAccessToken();
        if($getResponse->failed() || empty($getResponse->toArray()['access_token'])){
            return;
        }
        $accessToken    = $getResponse->toArray()['access_token'];
        $redis          = RedisUtil::getInstance('redis');
        $redis->set(RedisKey::WEI_XIN_ACCESS_TOKEN, $accessToken);

        $getResponse    = WeiXinApi::getAccessToken(2);
        if($getResponse->failed() || empty($getResponse->toArray()['access_token'])){
            return;
        }
        $accessToken    = $getResponse->toArray()['access_token'];
        $redis          = RedisUtil::getInstance('redis');
        $redis->set(RedisKey::WEI_XIN_PARENT_ACCESS_TOKEN, $accessToken);
    }
}