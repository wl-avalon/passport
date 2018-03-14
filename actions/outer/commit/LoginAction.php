<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/14
 * Time: 下午4:29
 */

namespace app\modules\actions\outer\commit;
use app\passport\services\outer\commit\LoginService;
use sp_framework\actions\BaseAction;

class LoginAction extends BaseAction
{
    private $code;

    protected function formatParams()
    {
        $this->code = $this->get('code');
    }

    public function execute()
    {
        $loginResult = LoginService::login($this->code);
        return $loginResult;
    }
}