/*
SQLyog Ultimate v11.27 (32 bit)
MySQL - 5.6.17 : Database - school
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`school` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `school`;

/*Table structure for table `sch_admin` */

DROP TABLE IF EXISTS `sch_admin`;

CREATE TABLE `sch_admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL COMMENT '用户名',
  `account` varchar(50) NOT NULL COMMENT '登录账号',
  `psw` varchar(100) NOT NULL COMMENT '登录密码，使用md5加密',
  `data_id` int(11) NOT NULL DEFAULT '0' COMMENT '资料ID，跟相应的资料ID绑定，目前主要对于教师',
  `auth` tinyint(4) NOT NULL DEFAULT '0' COMMENT '登录权限，1为普通权限，2教师，3办公室主任，4教务处主任，5学术委员会主任，6校长，7，超级管理员',
  `flag` tinyint(4) NOT NULL DEFAULT '1' COMMENT '账号是否有效，1为有效，0为无效',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '最近登录的时间',
  `ip` varchar(50) NOT NULL COMMENT '最近登录的IP地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sch_admin` */

/*Table structure for table `sch_point_options` */

DROP TABLE IF EXISTS `sch_point_options`;

CREATE TABLE `sch_point_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_content` varchar(500) NOT NULL COMMENT '积点考核的内容',
  `point` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '积点的分数',
  `category` tinyint(4) NOT NULL DEFAULT '1' COMMENT '类别，1为基本岗位积点，2兼职性积点，3奖励性积点，4个人资料积点',
  `remark` varchar(500) NOT NULL DEFAULT '' COMMENT '备注',
  `flag` tinyint(4) NOT NULL DEFAULT '1' COMMENT '该选项是否有效，1为有效，0为无效',
  `create_time` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `update_time` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sch_point_options` */

/*Table structure for table `sch_point_teacher` */

DROP TABLE IF EXISTS `sch_point_teacher`;

CREATE TABLE `sch_point_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL DEFAULT '0' COMMENT '教师ID',
  `point_id` int(11) NOT NULL DEFAULT '0' COMMENT '积点考核的ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sch_point_teacher` */

/*Table structure for table `sch_teacher` */

DROP TABLE IF EXISTS `sch_teacher`;

CREATE TABLE `sch_teacher` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '教师ID',
  `mobile` varchar(50) NOT NULL DEFAULT '0' COMMENT '教师联系方式',
  `name` varchar(50) NOT NULL COMMENT '教师名称',
  `subject` tinyint(4) NOT NULL DEFAULT '0' COMMENT '所教学科，1为语文，2为数学，3为英语，4为计算机，5为音乐（后面扩展）',
  `address` varchar(100) NOT NULL DEFAULT '' COMMENT '教师居住地',
  `department` tinyint(4) NOT NULL DEFAULT '0' COMMENT '所属部门，1为教务处，2办公室，3为学生处（可以拓展）',
  `point` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '现阶段的积点',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '最后修改的时间',
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sch_teacher` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
