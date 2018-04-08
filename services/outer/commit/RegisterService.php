<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/23
 * Time: 下午5:36
 */

namespace app\modules\services\outer\commit;

use app\modules\components\PackageParams;
use app\modules\constants\PassportUserBeanConst;
use app\modules\models\beans\PassportUserBean;
use app\modules\models\PassportUserModel;
use sp_framework\apis\IdAllocApi;
use sp_framework\components\Assert;

class RegisterService
{
    public static function register($encryptedData, $wxSession){
        $userUuid       = IdAllocApi::nextId()->toArray()['nextId'];
        $userBeanData   = [
            'uuid'          => $userUuid,
            'user_status'   => PassportUserBeanConst::USER_STATUS_NORMAL,
            'phone'         => '',
            'wx_avatar_url' => $encryptedData['avatarUrl'],
            'wx_nick_name'  => $encryptedData['nickName'],
            'wx_open_id'    => $encryptedData['openId'],
            'wx_union_id'   => $encryptedData['unionId'],
            'city'          => $encryptedData['city'],
            'province'      => $encryptedData['province'],
            'country'       => $encryptedData['country'],
            'register_time' => date('Y-m-d H:i:s'),
            'create_time'   => date('Y-m-d H:i:s'),
        ];
        $userBean       = new PassportUserBean($userBeanData);
        try{
            PassportUserModel::insertOneRecord($userBean);
        }catch(\Exception $e){
            $userUuid = self::checkRegister($encryptedData['unionId']);
        }

        $accessToken    = PackageParams::packageAccessToken($userUuid);
        LoginService::setLoginRedis($accessToken, $userUuid, $wxSession);
        return [
            'memberID'      => $userUuid,
            'accessToken'   => PackageParams::packageAccessToken($userUuid),
        ];
    }

    public static function checkRegister($wxUnionID){
        $userBean = PassportUserModel::queryUserByWxUnionID($wxUnionID);
        Assert::isTrue(!empty($userBean->getUuid()), "网络繁忙,请稍后再试", "插入数据库失败");
        return $userBean->getUuid();
    }
}