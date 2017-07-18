CREATE TABLE `paymenttrack_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sessionid` varchar(200) DEFAULT NULL,
  `wx_openid` varchar(200) NOT NULL,
  `refer_id` decimal(30,0) DEFAULT NULL,  ##对应order——id
  `logtime` datetime DEFAULT NULL,
  `order_status` varchar(200) DEFAULT NULL, 
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=392 DEFAULT CHARSET=utf8 COMMENT='每一次购买状态发生变化';