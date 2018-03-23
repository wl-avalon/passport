<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/23
 * Time: 下午5:34
 */

namespace app\modules\actions\outer\commit;
use sp_framework\actions\BaseAction;
use sp_framework\components\Assert;

class RegisterAction extends BaseAction
{
    private $code;
    private $userData;

    protected function formatParams()
    {
        $this->code     = $this->get('code');
        $this->userData = json_decode($this->get('userData'), true);
        Assert::isTrue(!empty($this->code), "网络繁忙,请稍后再试", "code不能为空");
        Assert::isTrue(!empty($this->userData), "网络繁忙,请稍后再试", "userData不能为空");
    }

    public function execute()
    {
        echo json_encode($this->userData);exit;
    }
}