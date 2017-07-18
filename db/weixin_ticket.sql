CREATE TABLE `weixin_ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `access_ticket` varchar(1024) DEFAULT NULL,
  `request_time` datetime DEFAULT NULL,
  `request_timestamp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1002 DEFAULT CHARSET=utf8;