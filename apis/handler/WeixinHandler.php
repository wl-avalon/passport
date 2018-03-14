<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/14
 * Time: 下午4:36
 */

namespace app\modules\apis\handler;
use sp_framework\apis\handler\DefaultHandler;
use sp_framework\apis\models\Response;
use sp_framework\constants\SpErrorCodeConst;

class WeixinHandler extends DefaultHandler
{
    public function handleResponse(Response &$response, array $arrJson){
        if(isset($arrJson['errcode'])){
            $response->setReturnCode($arrJson['errcode']);
            $response->setReturnUserMessage($arrJson['errmsg']);
            $response->setReturnMessage($arrJson['errmsg']);
        }else{
            $response->setReturnCode(SpErrorCodeConst::SUCCESSFUL);
            $response->setReturnUserMessage("");
            $response->setReturnMessage("");
            $response->setData($arrJson);
        }
        return $response;
    }
}