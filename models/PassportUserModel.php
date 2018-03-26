<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/23
 * Time: 下午6:55
 */

namespace app\modules\models;
use app\modules\constants\PassportUserBeanConst;
use app\modules\models\beans\PassportUserBean;
use sp_framework\components\SpException;
use sp_framework\constants\SpErrorCodeConst;
use yii\db\Query;

class PassportUserModel
{
    const TABLE_NAME = "passport_user";
    private static $db_school;

    public static function getDB(){
        if(is_null(self::$db_school)){
            self::$db_school = \Yii::$app->db_passport;
        }
        return self::$db_school;
    }

    public static function convertDbToBeans($aData){
        if(!is_array($aData) || empty($aData)) {
            return [];
        }
        return array_map(function($d){return new PassportUserBean($d);}, $aData);
    }

    public static function convertDbToBean($aData){
        return new PassportUserBean($aData);
    }

    /**
     * @param PassportUserBean $schoolRecordBean
     * @return mixed
     * @throws SpException
     */
    public static function insertOneRecord(PassportUserBean $schoolRecordBean){
        $aInsertData = $schoolRecordBean->toArray();
        $aInsertData = array_filter($aInsertData, function($item){return !is_null($item);});
        try{
            $rowNum = self::getDB()->createCommand()->insert(self::TABLE_NAME, $aInsertData)->execute();
        }catch(\Exception $e){
            throw new SpException(SpErrorCodeConst::INSERT_DB_ERROR, "insert db error, message is:" . $e->getMessage(), "网络繁忙,请稍后再试");
        }
        return $rowNum;
    }

    /**
     * 根据微信开放平台唯一ID获取用户信息
     * @param $wxUnionID
     * @return PassportUserBean
     * @throws \Exception
     */
    public static function queryUserByWxUnionID($wxUnionID){
        $aWhere = [
            'wx_union_id'   => $wxUnionID,
            'user_status'   => PassportUserBeanConst::USER_STATUS_NORMAL,
        ];

        try{
            $aData = (new Query())->select([])->where($aWhere)->from(self::TABLE_NAME)->createCommand(self::getDB())->queryOne();
        }catch(\Exception $e){
            throw new \Exception('select db error,message is:' . $e->getMessage(), "网络繁忙,请稍后再试");
        }
        return self::convertDbToBean($aData);
    }
}