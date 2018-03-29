<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/23
 * Time: 下午5:34
 */

namespace app\modules\actions\outer\commit;
use app\modules\apis\WeiXinApi;
use app\modules\services\outer\commit\RegisterService;
use sp_framework\actions\BaseAction;
use sp_framework\components\Assert;
use sp_framework\util\WxEncryptedDecode;

class RegisterAction extends BaseAction
{
    private $code;
    private $userData;
    private $registerFrom;

    protected function formatParams()
    {
        $this->code         = $this->get('code');
        $this->userData     = json_decode($this->get('userData'), true);
        $this->registerFrom = json_decode($this->get('registerFrom'), 1);
        Assert::isTrue(!empty($this->code), "网络繁忙,请稍后再试", "code不能为空");
        Assert::isTrue(!empty($this->userData), "网络繁忙,请稍后再试", "userData不能为空");
    }

    public function execute()
    {
        $response       = WeiXinApi::getSession($this->code, $this->registerFrom)->toArray();
        $wxSession      = $response['session_key'];

        $sha1Content    = $this->userData['rawData'] . $wxSession;
        $sign           = sha1($sha1Content);
        Assert::isTrue($sign === $this->userData['signature'], "网络繁忙,请稍后再试", "微信数据签名验证失败");

        $encryptedData  = [];
        $decode         = new WxEncryptedDecode(WeiXinApi::$appIDMap[$this->registerFrom], $wxSession);
        $decodeCode     = $decode->decryptData($this->userData['encryptedData'], $this->userData['iv'], $encryptedData);
        Assert::isTrue($decodeCode === 0, "网络繁忙,请稍后再试", "解析用户数据失败,errorCode:{$decodeCode}");

        $encryptedData  = json_decode($encryptedData, true);
        return RegisterService::register($encryptedData, $wxSession);
    }
}