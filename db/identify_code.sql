
CREATE TABLE `identify_code`(
`id` INT(8) NOT NULL AUTO_INCREMENT,
`icode` INT(6) NOT NULL,
`status` INT(2) DEFAULT 1,
`createtime` datetime DEFAULT NULL,
`endtime` datetime DEFAULT NULL,
PRIMARY KEY (`id`))ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=utf8 COMMENT='激活码基本信息';