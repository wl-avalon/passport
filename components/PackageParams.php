<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/2/23
 * Time: 下午3:57
 */

namespace app\modules\components;

class PackageParams
{
    public static function packageAccessToken($userID){
        return "ACCESS_TOKEN_" . md5($userID) . "_" . md5(time());
    }
}