CREATE TABLE `payment_order` (
  `order_id` int(20) NOT NULL AUTO_INCREMENT,
  `sessionid` varchar(200) DEFAULT NULL,
  `order_name` varchar(64) DEFAULT NULL,
  `user_code` decimal(8,0) DEFAULT NULL,
  `wx_openid` varchar(200) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `payamount` decimal(14,0) DEFAULT NULL,
  `paytotalfee` decimal(14,2) DEFAULT NULL,
  `createtime` datetime DEFAULT NULL,
  `finishtime` datetime DEFAULT NULL,
  `wx_order_id` varchar(64) DEFAULT NULL,
  `wx_order_outid` varchar(64) DEFAULT NULL,
  `status` varchar(16) DEFAULT 'init' COMMENT 'init / doing / cancel / done',
  `log` varchar(1024) DEFAULT NULL,
  `poststatus` varchar(100) NOT NULL DEFAULT '待发货',
  `order_note` varchar(500) NOT NULL DEFAULT '订单备注',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=147 DEFAULT CHARSET=utf8 COMMENT='分配支付单号、提交待支付的业务表';