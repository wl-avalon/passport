<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/23
 * Time: 下午5:34
 */

namespace app\modules\actions\outer\commit;
use app\modules\apis\WeiXinApi;
use sp_framework\actions\BaseAction;
use sp_framework\components\Assert;
use sp_framework\util\WxEncryptedDecode;

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
        $response   = WeiXinApi::getSession($this->code)->toArray();
        $wxSession  = $response['session_key'];

        $encryptedData  = [];
        $decode         = new WxEncryptedDecode(WeiXinApi::APP_ID, $wxSession);
        $decodeCode     = $decode->decryptData($this->userData['encryptedData'], $this->userData['iv'], $encryptedData);
        Assert::isTrue($decodeCode === 0, "网络繁忙,请稍后再试", "解析用户数据失败");
        echo json_encode($encryptedData);exit;
    }
}