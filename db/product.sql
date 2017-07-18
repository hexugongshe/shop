CREATE TABLE `product` (
  `product_id` decimal(10,0) NOT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `category_code` varchar(10) NOT NULL,
  `product_type` varchar(10) DEFAULT NULL,
  `product_lev` varchar(10) DEFAULT NULL,   ##通过级别来设置商品显示位置是否能置顶
  `product_brand_code` varchar(10) DEFAULT NULL,
  `product_brand_name` varchar(20) DEFAULT NULL,
  `product_price` decimal(6,2) DEFAULT NULL,
  `product_price_orig` decimal(6,2) DEFAULT NULL,
  `product_category` varchar(3000) DEFAULT NULL,
  `product_image_url` varchar(3000) DEFAULT NULL,  ##轮播图，通过逗号分隔
  `product_image_url_240` varchar(500) DEFAULT NULL,  ##单页展示图
  `product_desc` varchar(3000) DEFAULT NULL,
  `product_createtime` datetime DEFAULT NULL,
  `product_starttime` datetime DEFAULT NULL,
  `product_endtime` datetime DEFAULT NULL,
  `product_statues` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `FK_Reference_27` (`category_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='通用产品';

