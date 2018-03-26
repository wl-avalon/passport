<?php
/**
 * Create by script:createSqlBean.php
 * Date is:2018-03-23
 * Time is:10:45:46
 */

namespace app\modules\models\beans;

/**
 * Comment: 用户记录主表
 * Engine: InnoDB
 * Default Charset: utf8
 * Class PassportUserBean
 * Package namespace app\modules\models\beans
 */
class PassportUserBean
{
    private $id             = null; //BIGINT(20) NOT NULL AUTO_INCREMENT COMMENT '主键,自增ID'
    private $uuid           = null; //VARCHAR(100) DEFAULT '' COMMENT '用户唯一ID'
    private $user_status    = null; //TINYINT(4) DEFAULT 0 COMMENT '用户状态,0:预注册,1:正常,2:挂失(临时不用),3:注销(永久不用)'
    private $phone          = null; //VARCHAR(30) DEFAULT '' COMMENT '手机号'
    private $wx_avatar_url  = null; //VARCHAR(300) DEFAULT '' COMMENT '头像地址'
    private $wx_nick_name   = null; //VARCHAR(100) DEFAULT '' COMMENT '教师姓名'
    private $wx_open_id     = null; //VARCHAR(100) DEFAULT '' COMMENT '微信OpenID'
    private $wx_union_id    = null; //VARCHAR(100) DEFAULT '' COMMENT '微信开发平台唯一ID'
    private $city           = null; //VARCHAR(100) DEFAULT '' COMMENT '城市'
    private $province       = null; //VARCHAR(100) DEFAULT '' COMMENT '省份'
    private $country        = null; //VARCHAR(100) DEFAULT '' COMMENT '国家'
    private $register_time  = null; //TIMESTAMP DEFAULT '0000-00-00 00:00:00' COMMENT '注册时间'
    private $create_time    = null; //TIMESTAMP DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间'
    private $update_time    = null; //TIMESTAMP DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间'
    
    public function __construct($input){
        $this->id               = $input['id']              ?? null;
        $this->uuid             = $input['uuid']            ?? null;
        $this->user_status      = $input['user_status']     ?? null;
        $this->phone            = $input['phone']           ?? null;
        $this->wx_avatar_url    = $input['wx_avatar_url']   ?? null;
        $this->wx_nick_name     = $input['wx_nick_name']    ?? null;
        $this->wx_open_id       = $input['wx_open_id']      ?? null;
        $this->wx_union_id      = $input['wx_union_id']     ?? null;
        $this->city             = $input['city']            ?? null;
        $this->province         = $input['province']        ?? null;
        $this->country          = $input['country']         ?? null;
        $this->register_time    = $input['register_time']   ?? null;
        $this->create_time      = $input['create_time']     ?? null;
        $this->update_time      = $input['update_time']     ?? null;
    }
    
    public function toArray(){
        return [
            'id'            => $this->id,
            'uuid'          => $this->uuid,
            'user_status'   => $this->user_status,
            'phone'         => $this->phone,
            'wx_avatar_url' => $this->wx_avatar_url,
            'wx_nick_name'  => $this->wx_nick_name,
            'wx_open_id'    => $this->wx_open_id,
            'wx_union_id'   => $this->wx_union_id,
            'city'          => $this->city,
            'province'      => $this->province,
            'country'       => $this->country,
            'register_time' => $this->register_time,
            'create_time'   => $this->create_time,
            'update_time'   => $this->update_time,
        ];
    }
    
    public function getID()             {return $this->id;}
    public function getUuid()           {return $this->uuid;}
    public function getUserStatus()     {return $this->user_status;}
    public function getPhone()          {return $this->phone;}
    public function getWxAvatarUrl()    {return $this->wx_avatar_url;}
    public function getWxNickName()     {return $this->wx_nick_name;}
    public function getWxOpenID()       {return $this->wx_open_id;}
    public function getWxUnionID()      {return $this->wx_union_id;}
    public function getCity()           {return $this->city;}
    public function getProvince()       {return $this->province;}
    public function getCountry()        {return $this->country;}
    public function getRegisterTime()   {return $this->register_time;}
    public function getCreateTime()     {return $this->create_time;}
    public function getUpdateTime()     {return $this->update_time;}
    
    public function setID($id)                          {$this->id              = $id;}
    public function setUuid($uuid)                      {$this->uuid            = $uuid;}
    public function setUserStatus($user_status)         {$this->user_status     = $user_status;}
    public function setPhone($phone)                    {$this->phone           = $phone;}
    public function setWxAvatarUrl($wx_avatar_url)      {$this->wx_avatar_url   = $wx_avatar_url;}
    public function setWxNickName($wx_nick_name)        {$this->wx_nick_name    = $wx_nick_name;}
    public function setWxOpenID($wx_open_id)            {$this->wx_open_id      = $wx_open_id;}
    public function setWxUnionID($wx_union_id)          {$this->wx_union_id     = $wx_union_id;}
    public function setCity($city)                      {$this->city            = $city;}
    public function setProvince($province)              {$this->province        = $province;}
    public function setCountry($country)                {$this->country         = $country;}
    public function setRegisterTime($register_time)     {$this->register_time   = $register_time;}
    public function setCreateTime($create_time)         {$this->create_time     = $create_time;}
    public function setUpdateTime($update_time)         {$this->update_time     = $update_time;}
}
