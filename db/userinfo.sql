CREATE TABLE `userinfo` (
  `user_code` int(8) NOT NULL AUTO_INCREMENT,
  `add_id` decimal(10,0) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_type` int(2) DEFAULT 0,
  `user_telephone` decimal(11,0) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_idno` varchar(18) DEFAULT NULL,
  `wx_subscribe` varchar(10) DEFAULT NULL,
  `wx_openid` varchar(200) NOT NULL,
  `wx_nickname` varchar(50) DEFAULT NULL,
  `wx_sex` varchar(10) DEFAULT NULL,
  `wx_city` varchar(50) DEFAULT NULL,
  `wx_country` varchar(50) DEFAULT NULL,
  `wx_province` varchar(50) DEFAULT NULL,
  `wx_language` varchar(50) DEFAULT NULL,
  `wx_headimgurl` varchar(500) DEFAULT NULL,
  `wx_qrcode` varchar(500) DEFAULT NULL,
  `wx_subscribe_time` datetime DEFAULT NULL,
  PRIMARY KEY (`user_code`),
  KEY `FK_userinfo2address` (`add_id`),

  KEY `FK_userinfo2order` (`wx_openid`)
) ENGINE=MyISAM AUTO_INCREMENT=329 DEFAULT CHARSET=utf8 COMMENT='用户基本信息，含微信显示授权后的全部信息';