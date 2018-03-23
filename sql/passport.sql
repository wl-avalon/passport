CREATE TABLE `passport_user` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT COMMENT '主键,自增ID',
  `uuid` VARCHAR(100) DEFAULT '' COMMENT '用户唯一ID',
  `user_status` TINYINT(4) DEFAULT 0 COMMENT '用户状态,0:预注册,1:正常,2:挂失(临时不用),3:注销(永久不用)',
  `phone` VARCHAR(30) DEFAULT '' COMMENT '手机号',
  `wx_avatar_url` VARCHAR(300) DEFAULT '' COMMENT '头像地址',
  `wx_nick_name` VARCHAR(100) DEFAULT '' COMMENT '教师姓名',
  `wx_open_id` VARCHAR(100) DEFAULT '' COMMENT '微信OpenID',
  `wx_union_id` VARCHAR(100) DEFAULT '' COMMENT '微信开发平台唯一ID',
  `register_time` TIMESTAMP DEFAULT '0000-00-00 00:00:00' COMMENT '注册时间',
  `create_time` TIMESTAMP DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` TIMESTAMP DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_uuid` (`uuid`),
  UNIQUE KEY `idx_wx_union_id`(`wx_union_id`),
  KEY `idx_user_status` (`user_status`),
  KEY `idx_phone` (`phone`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COMMENT = '用户记录主表';