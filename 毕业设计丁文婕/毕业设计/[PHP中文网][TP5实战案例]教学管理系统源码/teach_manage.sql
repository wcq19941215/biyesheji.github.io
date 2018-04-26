# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.6.35)
# Database: tp5
# Generation Time: 2017-08-11 01:27:06 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table grade
# ------------------------------------------------------------

DROP TABLE IF EXISTS `grade`;

CREATE TABLE `grade` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '班级主键',
  `name` varchar(100) DEFAULT NULL COMMENT '班级名称',
  `length` varchar(20) DEFAULT NULL COMMENT '学制',
  `price` int(11) DEFAULT NULL COMMENT '学费',
  `status` int(11) DEFAULT NULL COMMENT '是否启用',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `delete_time` int(11) DEFAULT NULL COMMENT '删除时间',
  `is_delete` int(11) DEFAULT NULL COMMENT '允许删除',
  `student_id` int(11) DEFAULT NULL COMMENT '关联外键',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `grade` WRITE;
/*!40000 ALTER TABLE `grade` DISABLE KEYS */;

INSERT INTO `grade` (`id`, `name`, `length`, `price`, `status`, `create_time`, `update_time`, `delete_time`, `is_delete`, `student_id`)
VALUES
	(1,'PHP开发工程师就业班','6个月',19800,1,1502242191,1502335837,NULL,1,NULL),
	(2,'前端开发工程师提高班','3个月',6767,1,1502242191,1502335837,NULL,1,NULL),
	(3,'WEB开发全栈工程师班','6个月',28800,1,1502242191,1502336083,NULL,1,NULL),
	(4,'Java开发工程师提升班','一年半',3500,1,1502257693,1502335837,NULL,1,NULL),
	(5,'平面设计高薪就业班','6个月',9800,1,1502334559,1502335837,NULL,1,NULL);

/*!40000 ALTER TABLE `grade` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table student
# ------------------------------------------------------------

DROP TABLE IF EXISTS `student`;

CREATE TABLE `student` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(50) DEFAULT NULL COMMENT '姓名',
  `sex` tinyint(4) DEFAULT NULL COMMENT '性别',
  `age` tinyint(4) unsigned DEFAULT NULL COMMENT '年龄',
  `mobile` varchar(20) DEFAULT NULL COMMENT '手机号',
  `email` varchar(100) DEFAULT NULL COMMENT '邮箱',
  `status` int(11) DEFAULT NULL COMMENT '当前状态',
  `start_time` int(11) DEFAULT NULL COMMENT '入学时间',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `delete_time` int(11) DEFAULT NULL COMMENT '删除时间',
  `is_delete` int(11) DEFAULT NULL COMMENT '允许删除',
  `grade_id` int(11) DEFAULT NULL COMMENT '关联外键',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;

INSERT INTO `student` (`id`, `name`, `sex`, `age`, `mobile`, `email`, `status`, `start_time`, `create_time`, `update_time`, `delete_time`, `is_delete`, `grade_id`)
VALUES
	(1,'杨过',0,67,'18966557788','yangguo@php.cn',1,1494345600,1502326725,1502343973,NULL,1,3),
	(2,'小龙女',0,33,'13509897765','xiaolongnv@php.cn',1,1502326725,1502326725,1502343973,NULL,1,1),
	(3,'尹志平',1,38,'17765336278','yizhiping@php.cn',1,1502326725,1502326725,1502343973,NULL,1,3),
	(4,'老顽童',1,89,'15677281923','laowantong@php.cn',1,1502326725,1502326725,1502343973,NULL,1,2),
	(5,'洪七公',1,78,'13389776234','hongqigong@php.cn',1,1502326725,1502326725,1502343973,NULL,1,2),
	(6,'郭靖',0,26,'15766338726','guojin@php.cn',1,1502294400,1502326725,1502343973,NULL,1,1),
	(7,'黄蓉',0,46,'18976227182','huangrong@php.cn',0,1502326725,1502326725,1502343973,NULL,1,1),
	(8,'杨康',1,45,'13287009834','yangkang@php.cn',0,1502326725,1502326725,1502343973,NULL,1,3),
	(9,'欧阳克',1,37,'13908772343','ouyangke@php.cn',0,1502326725,1502326725,1502343973,NULL,1,2),
	(10,'张无忌',1,28,'15387298273','zhangwuji@php.cn',1,1502326725,1502326725,1502343973,NULL,1,2),
	(11,'赵敏',0,26,'13987372937','zhaoming@php.cn',1,1502326725,1502326725,1502343973,NULL,1,3),
	(12,'宋青书',0,22,'15806554328','songqinshu@php.cn',1,1494864000,1502327784,1502343973,NULL,1,2),
	(13,'周芷若',1,20,'18977665544','zhouzhiruo@php.cn',1,1501948800,1502343910,1502343931,NULL,NULL,5);

/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table teacher
# ------------------------------------------------------------

DROP TABLE IF EXISTS `teacher`;

CREATE TABLE `teacher` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(50) DEFAULT NULL COMMENT '姓名',
  `degree` varchar(30) DEFAULT NULL COMMENT '学历',
  `mobile` varchar(20) DEFAULT NULL COMMENT '手机号',
  `school` varchar(50) DEFAULT NULL COMMENT '毕业学校',
  `hiredate` int(11) DEFAULT NULL COMMENT '入职时间',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `delete_time` int(11) DEFAULT NULL COMMENT '删除标志',
  `is_delete` int(11) DEFAULT '1' COMMENT '允许删除',
  `status` int(11) DEFAULT NULL COMMENT '1启用0禁用',
  `grade_id` int(11) DEFAULT NULL COMMENT '外键',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `teacher` WRITE;
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;

INSERT INTO `teacher` (`id`, `name`, `degree`, `mobile`, `school`, `hiredate`, `create_time`, `update_time`, `delete_time`, `is_delete`, `status`, `grade_id`)
VALUES
	(1,'朱老师','2','15705517878','中国科技大学',1420041600,1970,1502342345,NULL,1,1,5),
	(2,'李老师','1','13988995566','合肥工业大学',1466006400,2017,1502342345,NULL,1,1,2),
	(3,'洪老师','1','18955139988','安徽大学',1486310400,2017,1502342345,NULL,1,1,1),
	(5,'张老师','1','15805512377','安徽师范大学',1461254400,2017,1502342345,NULL,1,1,5),
	(6,'范老师','1','18976765533','安徽理工大学',1501948800,1502272302,1502342345,NULL,1,1,4);

/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `name` varchar(50) DEFAULT NULL COMMENT '用户名',
  `password` varchar(32) DEFAULT NULL COMMENT '用户密码',
  `email` varchar(255) DEFAULT NULL COMMENT '用户邮箱',
  `role` tinyint(2) unsigned DEFAULT '1' COMMENT '角色',
  `status` int(2) unsigned DEFAULT '1' COMMENT '状态:1启用0禁用',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `delete_time` int(11) DEFAULT NULL COMMENT '删除时间',
  `login_time` int(11) unsigned DEFAULT NULL COMMENT '登录时间',
  `login_count` int(11) unsigned DEFAULT '0' COMMENT '登录次数',
  `is_delete` int(2) unsigned DEFAULT '0' COMMENT '是否删除1是0否',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `name`, `password`, `email`, `role`, `status`, `create_time`, `update_time`, `delete_time`, `login_time`, `login_count`, `is_delete`)
VALUES
	(1,'admin','74be16979710d4c4e7c6647856088456','admin123@php.cn',0,1,1501493848,1502340075,NULL,1502339370,20,1),
	(3,'peter','e10adc3949ba59abbe56e057f20f883e','peter888@php.cn',1,1,1501582576,1502260457,NULL,1502168741,15,1),
	(6,'jack','e10adc3949ba59abbe56e057f20f883e','jack123@php.cn',0,1,1502064844,1502260457,NULL,1502082773,1,1),
	(7,'zhu','e10adc3949ba59abbe56e057f20f883e','zhu@php.cn',0,1,NULL,1502260457,NULL,NULL,0,1),
	(8,'php','e10adc3949ba59abbe56e057f20f883e','php@php.cn',0,1,1502091384,1502260457,NULL,NULL,0,1),
	(9,'html','e10adc3949ba59abbe56e057f20f883e','html@php.cn',0,1,1502091961,1502260457,NULL,NULL,0,1),
	(10,'css','e10adc3949ba59abbe56e057f20f883e','css@php.cn',0,1,1502092407,1502260457,NULL,NULL,0,1),
	(11,'yangtao','e10adc3949ba59abbe56e057f20f883e','yangtao@php.cn',0,1,1502171809,1502260457,NULL,NULL,0,1);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
