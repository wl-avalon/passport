<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/2/8
 * Time: 下午3:28
 */

namespace app\modules\constants;


class RedisKey
{
    const PASSPORT_LOGIN_KEY            = 'passport_login_key_';
    const PASSPORT_USER_ACCESS_TOKEN    = 'passport_user_access_token_';
    const WEI_XIN_ACCESS_TOKEN          = 'wei_xin_access_token';
    const WEI_XIN_PARENT_ACCESS_TOKEN   = 'wei_xin_parent_access_token';
}