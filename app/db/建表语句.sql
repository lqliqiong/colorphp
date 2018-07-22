
-- 活动信息表
CREATE TABLE `my_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activty_name` varchar(255) DEFAULT NULL COMMENT '活动名称',
  `activity_code` varchar(255) NOT NULL,
  `activity_data` date DEFAULT NULL,
  `activity_address` varchar(255) DEFAULT NULL,
  `auth` varchar(255) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `activity_detail` varchar(1024) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


-- 活动券码表
CREATE TABLE `my_activity_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_code` varchar(255) NOT NULL,
  `status` enum('0','1','2') NOT NULL COMMENT '0未使用   1 已使用 2删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

