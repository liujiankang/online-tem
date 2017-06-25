-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: walle
-- ------------------------------------------------------
-- Server version	5.6.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(21) unsigned NOT NULL COMMENT '添加项目的用户id',
  `name` varchar(100) DEFAULT 'master' COMMENT '项目名字',
  `level` smallint(1) NOT NULL COMMENT '项目环境1：测试，2：仿真，3：线上',
  `status` smallint(1) NOT NULL DEFAULT '1' COMMENT '状态0：无效，1有效',
  `version` varchar(32) DEFAULT NULL COMMENT '线上当前版本，用于快速回滚',
  `repo_url` varchar(200) DEFAULT '' COMMENT 'git地址',
  `repo_username` varchar(50) DEFAULT '' COMMENT '版本管理系统的用户名，一般为svn的用户名',
  `repo_password` varchar(100) DEFAULT '' COMMENT '版本管理系统的密码，一般为svn的密码',
  `repo_mode` varchar(50) DEFAULT 'branch' COMMENT '上线方式：branch/tag',
  `repo_type` varchar(10) DEFAULT 'git' COMMENT '上线方式：git/svn',
  `deploy_from` varchar(200) NOT NULL COMMENT '宿主机存放clone出来的文件',
  `excludes` text COMMENT '要排除的文件',
  `release_user` varchar(50) NOT NULL COMMENT '目标机器用户',
  `release_to` varchar(200) NOT NULL COMMENT '目标机器的目录，相当于nginx的root，可直接web访问',
  `release_library` varchar(200) NOT NULL COMMENT '目标机器版本发布库',
  `hosts` text COMMENT '目标机器列表',
  `pre_deploy` text COMMENT '部署前置任务',
  `post_deploy` text COMMENT '同步之前任务',
  `pre_release` text COMMENT '同步之前目标机器执行的任务',
  `post_release` text COMMENT '同步之后目标机器执行的任务',
  `post_release_delay` int(11) NOT NULL DEFAULT '0' COMMENT '每台目标机执行post_release任务间隔/延迟时间 单位:秒',
  `audit` smallint(1) DEFAULT '0' COMMENT '是否需要审核任务0不需要，1需要',
  `ansible` smallint(3) NOT NULL DEFAULT '0' COMMENT '是否启用Ansible 0关闭，1开启',
  `keep_version_num` int(3) NOT NULL DEFAULT '20' COMMENT '线上版本保留数',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (1,1,'888开发机器',1,1,NULL,'git@github.com:liujiankang/patchDiffOnline.git','admin','admin','branch','git','/webCode/walle/git','','root','/data/www/ljk/yii','/data/master','192.168.1.5','ls /root','ll /home','','',0,1,1,20,'2017-06-03 10:51:47','2017-06-03 10:55:10');
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-25 23:41:33
