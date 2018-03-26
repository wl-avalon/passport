<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/26
 * Time: 上午11:17
 */

namespace app\modules\constants;


class PassportUserBeanConst
{
    const USER_STATUS_PREREGISTER   = 0;
    const USER_STATUS_NORMAL        = 1;
    const USER_STATUS_CANT_USE_NOW  = 2;
    const USER_STATUS_DELETE        = 3;
}