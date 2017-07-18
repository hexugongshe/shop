CREATE TABLE `address` (
  `add_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_code` int(11) DEFAULT NULL,
  `wx_openid` varchar(200) DEFAULT NULL,
  `add_detail` varchar(200) DEFAULT NULL,
  `add_province` varchar(30) DEFAULT NULL,
  `add_city` varchar(30) DEFAULT NULL,
  `add_country` varchar(30) DEFAULT NULL,
  `add_street` varchar(100) DEFAULT NULL,
  `add_postcode` char(6) DEFAULT NULL,
  `add_user` varchar(30) DEFAULT NULL,
  `add_telephone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`add_id`),
  KEY `FK_Reference_17` (`user_code`,`wx_openid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='来源于实物兑换中留下的收件人信息';