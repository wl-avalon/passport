<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/14
 * Time: 下午4:29
 */

namespace app\modules\actions\outer\commit;
use app\modules\services\outer\commit\LoginService;
use sp_framework\actions\BaseAction;
use sp_framework\components\Assert;

class LoginAction extends BaseAction
{
    private $code;

    protected function formatParams()
    {
        $this->code = $this->get('code');
        Assert::isTrue(!empty($this->code), "网络繁忙,请稍后再试", "code不能为空");
    }

    public function execute()
    {
        $loginResult = LoginService::login($this->code);
        return $loginResult;
    }
}