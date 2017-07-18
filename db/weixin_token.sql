CREATE TABLE `weixin_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `access_token` varchar(1024) DEFAULT NULL,
  `request_time` datetime DEFAULT NULL,
  `request_timestamp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=320 DEFAULT CHARSET=utf8;