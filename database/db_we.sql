-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 06 月 26 日 14:59
-- 服务器版本: 5.5.16
-- PHP 版本: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `db_we`
--

-- --------------------------------------------------------

--
-- 表的结构 `tbl_activity`
--

CREATE TABLE IF NOT EXISTS `tbl_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `filedsofwork` varchar(128) DEFAULT NULL,
  `locationsofwork` varchar(128) DEFAULT NULL,
  `targetpopulations` varchar(128) DEFAULT NULL,
  `freetag` varchar(128) NOT NULL,
  `startdate` date DEFAULT NULL,
  `onedayevent` tinyint(1) DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `ownerid` int(11) NOT NULL,
  `updatetime` datetime NOT NULL,
  `type` int(11) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `followers` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ownerid` (`ownerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=30 ;

--
-- 转存表中的数据 `tbl_activity`
--

INSERT INTO `tbl_activity` (`id`, `title`, `description`, `filedsofwork`, `locationsofwork`, `targetpopulations`, `freetag`, `startdate`, `onedayevent`, `enddate`, `ownerid`, `updatetime`, `type`, `publish`, `followers`) VALUES
(1, 'baby', 'I need one baby', '', '', '', '0', NULL, NULL, NULL, 2, '0000-00-00 00:00:00', 1, 1, 0),
(2, 'as', 'asdasd', '', '', '', '0', NULL, NULL, NULL, 2, '0000-00-00 00:00:00', 2, 1, 0),
(3, 'asfvd', 'dbgbfd', '', '', '', '0', NULL, NULL, NULL, 2, '0000-00-00 00:00:00', 1, 1, 0),
(4, 'asdfgnh', 'asdfgnhm', '', '', '', '0', NULL, NULL, NULL, 2, '0000-00-00 00:00:00', 1, 1, 0),
(5, 'sdfg', 'bfw', '', '', '', '0', NULL, NULL, NULL, 2, '0000-00-00 00:00:00', 2, 1, 0),
(6, 'adsv', 'eve', '', '', '', '0', NULL, NULL, NULL, 2, '0000-00-00 00:00:00', 1, 1, 0),
(7, 'as', 'avtr', '', '', '', '0', NULL, NULL, NULL, 2, '0000-00-00 00:00:00', 2, 1, 0),
(8, 'ad', 'dqw', '', '', '', '0', NULL, NULL, NULL, 2, '0000-00-00 00:00:00', 1, 1, 0),
(9, 'asd', 'asd', '', '', '', 'asd', NULL, NULL, NULL, 2, '0000-00-00 00:00:00', 1, 1, 0),
(10, 'asdv', 'wrbevr', '', '', '', '', NULL, NULL, NULL, 2, '0000-00-00 00:00:00', 1, 1, 0),
(11, 'v', 'q', 'we', 'we', 'we', 'qw', NULL, NULL, NULL, 2, '0000-00-00 00:00:00', 1, 1, 0),
(12, 'hello', 'asdfboiqewv', 'Beijing', 'Haidian', 'Graduate', 'No', NULL, NULL, NULL, 2, '0000-00-00 00:00:00', 1, 1, 0),
(13, 'hello', 'asdfboiqewv', 'Beijing', 'Haidian', 'Graduate', 'No', NULL, NULL, NULL, 2, '0000-00-00 00:00:00', 1, 1, 0),
(14, 'hello', 'asdfboiqewv', 'Beijing', 'Haidian', 'Graduate', 'No', NULL, NULL, NULL, 2, '0000-00-00 00:00:00', 1, 1, 0),
(15, 'hellowd', 'sdvfbntyevf', 'Beijing', 'Haidian', 'Graduate', 'No', NULL, NULL, NULL, 2, '0000-00-00 00:00:00', 1, 1, 0),
(16, 'hellowd', 'sdvfbntyevf', 'Beijing', 'Haidian', 'Graduate', 'No', NULL, NULL, NULL, 2, '0000-00-00 00:00:00', 1, 1, 0),
(17, 'hellowd', 'sdvfbntyevf', 'Beijing', 'Haidian', 'Graduate', 'No', NULL, NULL, NULL, 2, '0000-00-00 00:00:00', 1, 1, 0),
(18, 'hellowd', 'sdvfbntyevf', 'Beijing', 'Haidian', 'Graduate', 'No', NULL, NULL, NULL, 2, '0000-00-00 00:00:00', 1, 1, 0),
(19, 'hellowd', 'sdvfbntyevf', 'Beijing', 'Haidian', 'Graduate', 'No', NULL, NULL, NULL, 2, '0000-00-00 00:00:00', 1, 1, 0),
(20, 'hello我', 'asdfghjk.hjmnbvcx ', 'Shanxi', 'Changzhi', 'hui', 'asdc', NULL, NULL, NULL, 2, '0000-00-00 00:00:00', 1, 1, 0),
(21, 'hello我', 'asdfghjk.hjmnbvcx ', 'Shanxi', 'Changzhi', 'hui', 'asdc', NULL, NULL, NULL, 2, '0000-00-00 00:00:00', 1, 1, 0),
(22, 'hello我', 'asdfghjk.hjmnbvcx ', 'Shanxi', 'Changzhi', 'hui', 'asdc', NULL, NULL, NULL, 2, '0000-00-00 00:00:00', 1, 1, 0),
(23, 'hello我', 'asdfghjk.hjmnbvcx ', 'Shanxiasdv', 'ChangzhiasAVSAB', 'huiRBBSA', 'asdcSAB', NULL, NULL, NULL, 2, '0000-00-00 00:00:00', 1, 1, 0),
(24, 'nhym', 'xvcxvzx', '1', '2', '3', '4', NULL, NULL, NULL, 2, '0000-00-00 00:00:00', 1, 1, 0),
(25, 'test', '1', '2', '1', '3', '4', NULL, NULL, NULL, 2, '0000-00-00 00:00:00', 1, 1, 0),
(26, '11', '11', '11', '22', '33', '44', NULL, NULL, NULL, 2, '0000-00-00 00:00:00', 1, 1, 0),
(27, 'sda', 'acs', '1', '1', '1', '1', NULL, NULL, NULL, 2, '0000-00-00 00:00:00', 1, 1, 0),
(28, 'asc', 'eqv as', '11', '12', '13', '14', NULL, NULL, NULL, 2, '0000-00-00 00:00:00', 1, 1, 0),
(29, 'asdfgnh', 'cec', '12', '13', '124', '2564', NULL, NULL, NULL, 2, '0000-00-00 00:00:00', 1, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `authorid` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `updatetime` datetime NOT NULL,
  `activityid` int(11) NOT NULL,
  `publisherid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `activityid` (`activityid`),
  KEY `authorid` (`authorid`),
  KEY `publisherid` (`publisherid`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `authorid`, `content`, `updatetime`, `activityid`, `publisherid`) VALUES
(1, 2, 'dd', '2012-06-26 04:25:05', 1, 2),
(2, 2, 'ASV', '2012-06-26 05:02:11', 7, 2),
(3, 2, 'dfgdrgh', '2012-06-26 11:23:58', 28, 2);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_followof`
--

CREATE TABLE IF NOT EXISTS `tbl_followof` (
  `userid` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `followtime` datetime NOT NULL,
  `followerid` int(11) NOT NULL,
  PRIMARY KEY (`userid`,`type`,`followerid`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_organization`
--

CREATE TABLE IF NOT EXISTS `tbl_organization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `acronym` varchar(20) DEFAULT NULL,
  `formeddate` date DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `employeesnumber` int(11) DEFAULT NULL,
  `budget` varchar(128) DEFAULT NULL,
  `phonecode` int(11) DEFAULT NULL,
  `phonenumber` int(11) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_tag`
--

CREATE TABLE IF NOT EXISTS `tbl_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `tagtype` int(11) NOT NULL,
  `followers` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=44 ;

--
-- 转存表中的数据 `tbl_tag`
--

INSERT INTO `tbl_tag` (`id`, `name`, `tagtype`, `followers`) VALUES
(6, 'asdc', 1, 0),
(7, '1', 2, 0),
(8, '1', 2, 0),
(9, '4', 4, 0),
(10, '2', 2, 0),
(11, '4', 4, 0),
(12, '1', 1, 0),
(13, '3', 4, 0),
(14, '2s', 2, 0),
(15, '2s', 2, 0),
(16, '2s', 2, 0),
(17, '2s', 2, 0),
(18, '2s', 2, 0),
(19, '2s', 2, 0),
(20, '2s', 2, 0),
(21, '2s', 2, 0),
(22, '2s', 2, 0),
(23, '2s', 2, 0),
(24, '2s', 2, 0),
(25, '2s', 2, 0),
(26, '2s', 2, 0),
(27, '2s', 2, 0),
(28, '2s', 2, 0),
(29, '2s', 2, 0),
(30, '2s', 2, 0),
(31, '2s', 2, 0),
(32, '11', 2, 0),
(33, '11', 2, 0),
(34, '11', 2, 0),
(35, '11', 2, 0),
(36, '44', 4, 0),
(37, '22', 1, 0),
(38, '33', 3, 0),
(39, '14', 4, 0),
(40, '12', 1, 0),
(41, '13', 3, 0),
(42, '2564', 4, 0),
(43, '124', 3, 0);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_tagof`
--

CREATE TABLE IF NOT EXISTS `tbl_tagof` (
  `paid` int(11) NOT NULL,
  `tagid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(128) NOT NULL,
  `pic` blob,
  `firstlogin` tinyint(1) NOT NULL,
  `role` int(11) NOT NULL,
  `firstname` varchar(60) DEFAULT NULL,
  `lastname` varchar(60) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `languages` varchar(20) DEFAULT NULL,
  `fieldsofwork` varchar(60) DEFAULT NULL,
  `locationsofwork` varchar(60) DEFAULT NULL,
  `targetpopulations` varchar(60) DEFAULT NULL,
  `mobilenumbercountrycode` int(11) DEFAULT NULL,
  `mobilenumber` int(11) DEFAULT NULL,
  `mailingaddress` varchar(60) DEFAULT NULL,
  `street` varchar(60) DEFAULT NULL,
  `city` varchar(60) DEFAULT NULL,
  `state` varchar(60) DEFAULT NULL,
  `zippostalcode` int(11) DEFAULT NULL,
  `skypeid` int(11) DEFAULT NULL,
  `organizationid` int(11) DEFAULT NULL,
  `followers` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `FK_user_organization` (`organizationid`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `email`, `username`, `password`, `pic`, `firstlogin`, `role`, `firstname`, `lastname`, `gender`, `languages`, `fieldsofwork`, `locationsofwork`, `targetpopulations`, `mobilenumbercountrycode`, `mobilenumber`, `mailingaddress`, `street`, `city`, `state`, `zippostalcode`, `skypeid`, `organizationid`, `followers`) VALUES
(1, '1@1.1', 'l q', 'c21f969b5f03d33d43e04f8f136e7682', NULL, 0, 0, 'l', 'q', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, 'liuqi0611@126.com', 'Liu Qi', 'c21f969b5f03d33d43e04f8f136e7682', NULL, 0, 0, 'Liu', 'Qi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

--
-- 限制导出的表
--

--
-- 限制表 `tbl_activity`
--
ALTER TABLE `tbl_activity`
  ADD CONSTRAINT `tbl_activity_ibfk_1` FOREIGN KEY (`ownerid`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `tbl_comment_ibfk_10` FOREIGN KEY (`activityid`) REFERENCES `tbl_activity` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_comment_ibfk_11` FOREIGN KEY (`publisherid`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_comment_ibfk_9` FOREIGN KEY (`authorid`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `tbl_followof`
--
ALTER TABLE `tbl_followof`
  ADD CONSTRAINT `tbl_followof_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `tbl_user` (`id`);

--
-- 限制表 `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`organizationid`) REFERENCES `tbl_organization` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
