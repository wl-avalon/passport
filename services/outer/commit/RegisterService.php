<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/23
 * Time: 下午5:36
 */

namespace app\modules\services\outer\commit;

use app\modules\constants\PassportUserBeanConst;
use app\modules\models\beans\PassportUserBean;
use app\modules\models\PassportUserModel;
use sp_framework\apis\IdAllocApi;

class RegisterService
{
    public static function register($rawData, $encryptedData){
        $userUuid       = IdAllocApi::nextId()->toArray()['nextId'];
        $userBeanData   = [
            'uuid'          => $userUuid,
            'user_status'   => PassportUserBeanConst::USER_STATUS_NORMAL,
            'phone'         => '',
            'wx_avatar_url' => $rawData['avatarUrl'],
            'nick_name'     => $rawData['nickName'],
            'wx_open_id'    => $encryptedData['openId'],
            'wx_union_id'   => $encryptedData['unionId'],
            'register_time' => date('Y-m-d H:i:s'),
            'create_time'   => date('Y-m-d H:i:s'),
        ];
        $userBean       = new PassportUserBean($userBeanData);
        PassportUserModel::insertOneRecord($userBean);
        return [];
    }
}