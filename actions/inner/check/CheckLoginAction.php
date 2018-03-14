<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/14
 * Time: 下午3:16
 */

namespace app\modules\actions\inner\check;
use sp_framework\actions\BaseAction;

class CheckLoginAction extends BaseAction
{
    private $memberID;
    private $accessToken;

    protected function formatParams()
    {
        $this->memberID     = $this->get('memberID');
        $this->accessToken  = $this->get('accessToken');
    }

    public function execute()
    {

    }
}