-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1:3306
-- 生成日期: 2014 年 03 月 19 日 15:56
-- 服务器版本: 5.1.28
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `rongyuan`
--

-- --------------------------------------------------------

--
-- 表的结构 `ry_access`
--

CREATE TABLE IF NOT EXISTS `ry_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `ry_access`
--

INSERT INTO `ry_access` (`role_id`, `node_id`, `level`, `module`) VALUES
(2, 68, 3, NULL),
(2, 67, 2, NULL),
(2, 66, 3, NULL),
(2, 65, 2, NULL),
(2, 64, 3, NULL),
(2, 63, 3, NULL),
(2, 62, 3, NULL),
(2, 61, 2, NULL),
(2, 56, 3, NULL),
(2, 55, 3, NULL),
(2, 53, 3, NULL),
(2, 54, 3, NULL),
(2, 52, 2, NULL),
(2, 60, 3, NULL),
(2, 59, 3, NULL),
(2, 58, 3, NULL),
(3, 85, 2, NULL),
(3, 68, 3, NULL),
(3, 67, 2, NULL),
(3, 66, 3, NULL),
(3, 65, 2, NULL),
(3, 64, 3, NULL),
(3, 63, 3, NULL),
(3, 62, 3, NULL),
(3, 61, 2, NULL),
(3, 53, 3, NULL),
(3, 54, 3, NULL),
(3, 52, 2, NULL),
(3, 59, 3, NULL),
(3, 58, 3, NULL),
(3, 57, 2, NULL),
(3, 50, 3, NULL),
(3, 49, 3, NULL),
(3, 48, 3, NULL),
(3, 47, 2, NULL),
(3, 96, 3, NULL),
(3, 95, 3, NULL),
(3, 94, 2, NULL),
(3, 44, 3, NULL),
(3, 42, 3, NULL),
(3, 39, 3, NULL),
(3, 38, 3, NULL),
(3, 46, 3, NULL),
(3, 37, 3, NULL),
(3, 36, 2, NULL),
(3, 92, 3, NULL),
(3, 91, 3, NULL),
(2, 57, 2, NULL),
(2, 51, 3, NULL),
(2, 50, 3, NULL),
(2, 49, 3, NULL),
(2, 48, 3, NULL),
(2, 47, 2, NULL),
(2, 97, 3, NULL),
(2, 96, 3, NULL),
(2, 95, 3, NULL),
(2, 94, 2, NULL),
(2, 93, 3, NULL),
(2, 44, 3, NULL),
(2, 42, 3, NULL),
(2, 41, 3, NULL),
(2, 40, 3, NULL),
(2, 39, 3, NULL),
(2, 38, 3, NULL),
(2, 43, 3, NULL),
(2, 46, 3, NULL),
(2, 37, 3, NULL),
(2, 36, 2, NULL),
(2, 92, 3, NULL),
(2, 91, 3, NULL),
(2, 90, 3, NULL),
(2, 89, 3, NULL),
(2, 88, 3, NULL),
(2, 87, 2, NULL),
(2, 34, 3, NULL),
(2, 33, 3, NULL),
(2, 32, 3, NULL),
(2, 30, 3, NULL),
(2, 31, 3, NULL),
(3, 88, 3, NULL),
(3, 87, 2, NULL),
(3, 32, 3, NULL),
(3, 30, 3, NULL),
(3, 31, 3, NULL),
(3, 35, 3, NULL),
(3, 29, 2, NULL),
(3, 26, 3, NULL),
(2, 35, 3, NULL),
(2, 29, 2, NULL),
(2, 28, 3, NULL),
(2, 27, 3, NULL),
(2, 26, 3, NULL),
(2, 23, 2, NULL),
(2, 21, 3, NULL),
(2, 25, 3, NULL),
(3, 23, 2, NULL),
(3, 25, 3, NULL),
(3, 20, 3, NULL),
(3, 19, 3, NULL),
(2, 20, 3, NULL),
(2, 19, 3, NULL),
(2, 24, 3, NULL),
(2, 18, 2, NULL),
(2, 15, 1, NULL),
(3, 24, 3, NULL),
(3, 18, 2, NULL),
(3, 15, 1, NULL),
(2, 85, 2, NULL),
(2, 86, 3, NULL),
(3, 86, 3, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `ry_area`
--

CREATE TABLE IF NOT EXISTS `ry_area` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  `reid` int(10) NOT NULL,
  `isshow` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `ry_area`
--


-- --------------------------------------------------------

--
-- 表的结构 `ry_article`
--

CREATE TABLE IF NOT EXISTS `ry_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `typeid` int(10) NOT NULL,
  `resource` char(20) NOT NULL,
  `hit` int(10) NOT NULL DEFAULT '0',
  `userid` int(10) NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL,
  `isshow` int(10) NOT NULL DEFAULT '1',
  `isdel` tinyint(1) NOT NULL DEFAULT '0',
  `areaid` int(10) NOT NULL DEFAULT '0',
  `pic` text NOT NULL,
  `file` text NOT NULL,
  `color` varchar(20) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `optime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `ry_article`
--


-- --------------------------------------------------------

--
-- 表的结构 `ry_article_attr`
--

CREATE TABLE IF NOT EXISTS `ry_article_attr` (
  `bid` int(10) unsigned DEFAULT '0',
  `aid` int(10) unsigned NOT NULL DEFAULT '0',
  KEY `aid` (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `ry_article_attr`
--


-- --------------------------------------------------------

--
-- 表的结构 `ry_attr`
--

CREATE TABLE IF NOT EXISTS `ry_attr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(10) NOT NULL,
  `color` char(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `ry_attr`
--


-- --------------------------------------------------------

--
-- 表的结构 `ry_category`
--

CREATE TABLE IF NOT EXISTS `ry_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typename` char(20) NOT NULL,
  `cmark` int(11) NOT NULL DEFAULT '0',
  `remark` varchar(20) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `reid` int(10) NOT NULL DEFAULT '0',
  `sort` int(10) NOT NULL DEFAULT '0',
  `userid` int(10) NOT NULL DEFAULT '0',
  `gorupid` int(11) NOT NULL DEFAULT '0',
  `type` int(10) NOT NULL DEFAULT '0',
  `keywords` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `isshow` int(10) NOT NULL DEFAULT '1',
  `optime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `ry_category`
--


-- --------------------------------------------------------

--
-- 表的结构 `ry_codeconfig`
--

CREATE TABLE IF NOT EXISTS `ry_codeconfig` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `model` int(11) NOT NULL DEFAULT '1',
  `length` int(11) NOT NULL DEFAULT '1',
  `width` varchar(20) NOT NULL,
  `height` varchar(20) NOT NULL,
  `oprea` text NOT NULL,
  `optime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 导出表中的数据 `ry_codeconfig`
--

INSERT INTO `ry_codeconfig` (`id`, `model`, `length`, `width`, `height`, `oprea`, `optime`) VALUES
(1, 1, 4, '50', '22', '1,2,3,4', 1395243293);

-- --------------------------------------------------------

--
-- 表的结构 `ry_comment`
--

CREATE TABLE IF NOT EXISTS `ry_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(10) NOT NULL DEFAULT '0',
  `score` int(10) NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `userid` int(10) NOT NULL DEFAULT '0',
  `isshow` int(10) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0',
  `optime` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `ry_comment`
--


-- --------------------------------------------------------

--
-- 表的结构 `ry_config`
--

CREATE TABLE IF NOT EXISTS `ry_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  `info` char(20) NOT NULL,
  `content` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `sort` int(10) NOT NULL DEFAULT '0',
  `optime` int(10) NOT NULL,
  `reid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- 导出表中的数据 `ry_config`
--

INSERT INTO `ry_config` (`id`, `name`, `info`, `content`, `type`, `sort`, `optime`, `reid`) VALUES
(1, 'cfg_name', '网站名称', '我的网站', 'string', 0, 1387848008, 15),
(2, 'cfg_description', '网站描述', '网站描述', 'bstring', 0, 1387848008, 15),
(3, 'cfg_keywords', '网站关键字', '网站关键字', 'string', 0, 1387848008, 15),
(4, 'cfg_powerby', '网站版权', '网站版权', 'bstring', 0, 1387848008, 15),
(5, 'cfg_icp', '网站备案号', '网站备案号', 'string', 0, 1387848008, 15),
(6, 'cfg_width', '缩略图宽度', '100px', 'number', 0, 1387848008, 15),
(7, 'cfg_height', '缩略图高度', '100px', 'number', 0, 1387848008, 15),
(8, 'cfg_cwidth', '清晰图宽度', '300px', 'number', 0, 1387848008, 15),
(9, 'cfg_cheight', '清晰图高度', '300px', 'number', 0, 1387848008, 15),
(10, 'cfg_pic', '图片上传路径', 'Public/Uploads/pic/', 'string', 0, 1387848008, 17),
(11, 'cfg_file', '文件上传路径', 'Public/Uploads/file/', 'string', 0, 1387848008, 17),
(12, 'cfg_pictype', '图片上传格式', 'jpg|png|gif|bmp', 'string', 0, 1387848008, 17),
(13, 'cfg_filetype', '文件上传格式', 'rar|zip|gz|doc|docx|xls|xlsx|ppt|pptx', 'string', 0, 1387848008, 17),
(14, 'cfg_max', '单文件上传大小', '3145728', 'number', 0, 1387848008, 17),
(15, '', '网站基本设置', '', '', 0, 1387795258, 0),
(16, '', '会员设置', '', '', 0, 1387795274, 0),
(17, '', '上传设置', '', '', 0, 1387795292, 0),
(18, 'cfg_status', '是否关闭网站', 'N', 'bool', 0, 1387848008, 15),
(19, 'cfg_mb_allowreg', '是否关闭注册', 'N', 'bool', 0, 1387848008, 16),
(20, 'cfg_mb_notallow', '不允许注册的会员id', 'www,bbs,ftp,mail,user,users,admin,administrator', 'bstring', 0, 1387848008, 16),
(21, 'cfg_mb_msgischeck', '会员状态是否需要审核', 'N', 'bool', 0, 1387848008, 16),
(22, 'cfg_mb_rank', '注册会员默认级别', '1', 'string', 0, 1387848053, 16),
(23, 'cfg_mb_idmin', '用户id最小长度', '3', 'string', 0, 1387848103, 16),
(24, 'cfg_mb_pwdmin', '用户密码最小长度', '3', 'string', 0, 1387848136, 16);

-- --------------------------------------------------------

--
-- 表的结构 `ry_feedback`
--

CREATE TABLE IF NOT EXISTS `ry_feedback` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(20) NOT NULL,
  `content` text NOT NULL,
  `tel` char(20) NOT NULL,
  `phone` char(20) NOT NULL,
  `address` char(20) NOT NULL,
  `fax` char(20) NOT NULL,
  `person` char(20) NOT NULL,
  `time` int(10) NOT NULL DEFAULT '0',
  `reply` text NOT NULL,
  `rename` char(20) NOT NULL,
  `retime` int(10) NOT NULL DEFAULT '0',
  `isshow` int(10) NOT NULL DEFAULT '0',
  `optime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `ry_feedback`
--


-- --------------------------------------------------------

--
-- 表的结构 `ry_field`
--

CREATE TABLE IF NOT EXISTS `ry_field` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `length` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 导出表中的数据 `ry_field`
--


-- --------------------------------------------------------

--
-- 表的结构 `ry_grade`
--

CREATE TABLE IF NOT EXISTS `ry_grade` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gradename` char(20) NOT NULL,
  `score` int(10) NOT NULL,
  `optime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `ry_grade`
--


-- --------------------------------------------------------

--
-- 表的结构 `ry_img`
--

CREATE TABLE IF NOT EXISTS `ry_img` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typeid` int(10) NOT NULL DEFAULT '0',
  `title` char(60) NOT NULL,
  `content` text NOT NULL,
  `pic` char(60) NOT NULL,
  `url` text NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL,
  `optime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 导出表中的数据 `ry_img`
--

INSERT INTO `ry_img` (`id`, `typeid`, `title`, `content`, `pic`, `url`, `sort`, `time`, `optime`) VALUES
(1, 1, '嗖嗖嗖', '', '5329bccec241d.png', '飒飒', 0, 1395243567, 1395243567),
(2, 2, 'a', '', '5329bcface880.png', 'a', 0, 1395244283, 1395244283),
(3, 3, 'aa', '', '5329bd1e9c900.png', 'a', 0, 1395244299, 1395244299),
(4, 4, 'ss', '', '5329bd3819387.png', 's', 0, 1395244345, 1395244345),
(5, 4, 's', '', '5329bd4405910.png', 's', 0, 1395244357, 1395244357),
(6, 5, 's', '', '5329bd542c0d6.png', 's', 0, 1395244373, 1395244373),
(7, 6, 's', '', '5329bd60dd8d0.png', 's', 0, 1395244386, 1395244386),
(8, 7, 's', '', '5329bd6c4521c.png', 's', 0, 1395244397, 1395244397);

-- --------------------------------------------------------

--
-- 表的结构 `ry_imgcategory`
--

CREATE TABLE IF NOT EXISTS `ry_imgcategory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typename` char(20) NOT NULL,
  `reid` int(10) NOT NULL,
  `sort` int(10) NOT NULL DEFAULT '0',
  `userid` int(10) NOT NULL DEFAULT '0',
  `optime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 导出表中的数据 `ry_imgcategory`
--

INSERT INTO `ry_imgcategory` (`id`, `typename`, `reid`, `sort`, `userid`, `optime`) VALUES
(1, '钛板', 0, 1, 0, 1395243869),
(2, '钛饼', 0, 2, 0, 1395243883),
(3, '钛法兰', 0, 3, 0, 1395243922),
(4, '钛管', 0, 4, 0, 1395243940),
(5, '钛环', 0, 5, 0, 1395243965),
(6, '钛丝', 0, 6, 0, 1395243978),
(7, '钛异形件', 0, 7, 0, 1395243990);

-- --------------------------------------------------------

--
-- 表的结构 `ry_imgs`
--

CREATE TABLE IF NOT EXISTS `ry_imgs` (
  `aid` int(10) unsigned DEFAULT '0',
  `img` varchar(255) NOT NULL,
  KEY `aid` (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `ry_imgs`
--


-- --------------------------------------------------------

--
-- 表的结构 `ry_mtable`
--

CREATE TABLE IF NOT EXISTS `ry_mtable` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  `code` char(20) NOT NULL,
  `optime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `ry_mtable`
--


-- --------------------------------------------------------

--
-- 表的结构 `ry_node`
--

CREATE TABLE IF NOT EXISTS `ry_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=98 ;

--
-- 导出表中的数据 `ry_node`
--

INSERT INTO `ry_node` (`id`, `name`, `title`, `status`, `remark`, `sort`, `pid`, `level`) VALUES
(21, 'del', '栏目删除', 1, NULL, 5, 18, 3),
(23, 'Imgcategory', '图片分类', 1, NULL, 2, 15, 2),
(20, 'edit', '栏目修改', 1, NULL, 3, 18, 3),
(19, 'add', '栏目添加', 1, NULL, 2, 18, 3),
(24, 'Index', '栏目列表', 1, NULL, 1, 18, 3),
(18, 'Category', '栏目管理', 1, NULL, 1, 15, 2),
(15, 'Admin', '后台应用', 1, NULL, 1, 0, 1),
(25, 'do_sort', '栏目排序', 1, NULL, 4, 18, 3),
(26, 'index', '分类列表', 1, NULL, 1, 23, 3),
(27, 'delall', '批量删除分类', 1, NULL, 2, 23, 3),
(28, 'del', '删除分类', 1, NULL, 3, 23, 3),
(29, 'Img', '图片管理', 1, NULL, 3, 15, 2),
(30, 'add', '添加图片', 1, NULL, 2, 29, 3),
(31, 'index', '图片列表', 1, NULL, 1, 29, 3),
(32, 'edit', '图片编辑', 1, NULL, 3, 29, 3),
(33, 'delall', '图片批量删除', 1, NULL, 4, 29, 3),
(34, 'del', '图片删除', 1, NULL, 5, 29, 3),
(35, 'do_sort', '图片排序', 1, NULL, 1, 29, 3),
(36, 'Article', '文档管理', 1, NULL, 4, 15, 2),
(37, 'index', '文档列表', 1, NULL, 1, 36, 3),
(38, 'add', '添加文档', 1, NULL, 2, 36, 3),
(39, 'edit', '修改文档', 1, NULL, 3, 36, 3),
(40, 'delall', '文档批量删除', 1, NULL, 4, 36, 3),
(41, 'del', '文档删除', 1, NULL, 6, 36, 3),
(42, 'check', '文档审核', 1, NULL, 7, 36, 3),
(43, 'dcheck', '删除审核', 1, NULL, 1, 36, 3),
(44, 'attr', '文档属性添加', 1, NULL, 8, 36, 3),
(45, 'dbest', '删除推荐', 1, NULL, 1, 36, 3),
(46, 'do_sort', '文档排序', 1, NULL, 1, 36, 3),
(47, 'User', '会员管理', 1, NULL, 5, 15, 2),
(48, 'index', '会员列表', 1, NULL, 1, 47, 3),
(49, 'add', '会员添加', 1, NULL, 2, 47, 3),
(50, 'edit', '会员修改', 1, NULL, 3, 47, 3),
(51, 'del', '会员删除', 1, NULL, 4, 47, 3),
(52, 'Feedback', '留言管理', 1, NULL, 7, 15, 2),
(53, 'index', '留言列表', 1, NULL, 1, 52, 3),
(54, 'edit', '留言回复', 1, NULL, 1, 52, 3),
(55, 'delall', '留言批量删除', 1, NULL, 3, 52, 3),
(56, 'del', '留言删除', 1, NULL, 4, 52, 3),
(57, 'grade', '会员等级管理', 1, NULL, 6, 15, 2),
(58, 'index', '等级列表', 1, NULL, 1, 57, 3),
(59, 'do_sort', '等级排序', 1, NULL, 2, 57, 3),
(60, 'del', '等级删除', 1, NULL, 3, 57, 3),
(61, 'Config', '系统设置', 1, NULL, 8, 15, 2),
(62, 'index', '系统设置列表', 1, NULL, 1, 61, 3),
(63, 'add', '添加系统设置', 1, NULL, 2, 61, 3),
(64, 'edit_config', '更改系统设置', 1, NULL, 3, 61, 3),
(65, 'Codeconfig', '验证码管理', 1, NULL, 9, 15, 2),
(66, 'index', '验证码设置', 1, NULL, 1, 65, 3),
(67, 'Imgconfig', '水印管理', 1, NULL, 10, 15, 2),
(68, 'index', '水印设置', 1, NULL, 1, 67, 3),
(72, 'user', '管理员列表', 1, NULL, 1, 71, 3),
(71, 'Rbac', 'RBAC权限管理', 1, NULL, 11, 15, 2),
(73, 'addUser', '用户添加', 1, NULL, 2, 71, 3),
(74, 'editUser', '修改用户', 1, NULL, 3, 71, 3),
(75, 'delUser', '删除用户', 1, NULL, 1, 71, 3),
(76, 'node', '节点列表', 1, NULL, 5, 71, 3),
(77, 'addNode', '添加节点', 1, NULL, 6, 71, 3),
(78, 'editNode', '修改节点', 1, NULL, 7, 71, 3),
(79, 'delNode', '删除节点', 1, NULL, 8, 71, 3),
(80, 'role', '角色列表', 1, NULL, 1, 71, 3),
(81, 'addRole', '添加角色', 1, NULL, 9, 71, 3),
(82, 'editRole', '修改角色', 1, NULL, 10, 71, 3),
(83, 'addAccess', '分配权限', 1, NULL, 13, 71, 3),
(84, 'delRole', '删除角色', 1, NULL, 11, 71, 3),
(85, 'Cache', '缓存管理', 1, NULL, 12, 15, 2),
(86, 'index', '清除缓存', 1, NULL, 1, 85, 3),
(87, 'Comment', '评论管理', 1, NULL, 4, 15, 2),
(88, 'index', '评论列表', 1, NULL, 1, 87, 3),
(89, 'delall', '批量删除评论', 1, NULL, 2, 87, 3),
(90, 'del', '删除评论', 1, NULL, 3, 87, 3),
(91, 'check', '审核评论', 1, NULL, 4, 87, 3),
(92, 'dcheck', '删除审核', 1, NULL, 5, 87, 3),
(93, 'dattr', '文档属性删除', 1, NULL, 9, 36, 3),
(94, 'Attr', '文档属性', 1, NULL, 4, 15, 2),
(95, 'add', '添加属性', 1, NULL, 1, 94, 3),
(96, 'edit', '修改属性', 1, NULL, 2, 94, 3),
(97, 'del', '删除属性', 1, NULL, 3, 94, 3);

-- --------------------------------------------------------

--
-- 表的结构 `ry_role`
--

CREATE TABLE IF NOT EXISTS `ry_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 导出表中的数据 `ry_role`
--

INSERT INTO `ry_role` (`id`, `name`, `pid`, `status`, `remark`) VALUES
(1, 'Manger', NULL, 1, '超级管理员'),
(2, 'Controller', NULL, 1, '普通管理员'),
(3, 'Editor', NULL, 1, '网站编辑');

-- --------------------------------------------------------

--
-- 表的结构 `ry_role_user`
--

CREATE TABLE IF NOT EXISTS `ry_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `ry_role_user`
--

INSERT INTO `ry_role_user` (`role_id`, `user_id`) VALUES
(2, '6'),
(3, '4'),
(1, '1'),
(1, '1');

-- --------------------------------------------------------

--
-- 表的结构 `ry_user`
--

CREATE TABLE IF NOT EXISTS `ry_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL,
  `nickname` char(20) NOT NULL,
  `password` char(32) NOT NULL,
  `regtime` int(10) NOT NULL,
  `groupid` int(10) NOT NULL,
  `loginip` char(20) NOT NULL,
  `logintimes` int(10) NOT NULL DEFAULT '0',
  `lastlogintime` int(10) NOT NULL DEFAULT '0',
  `reid` int(10) NOT NULL DEFAULT '0',
  `score` int(11) NOT NULL DEFAULT '0',
  `grade_id` int(11) NOT NULL DEFAULT '1',
  `optime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 导出表中的数据 `ry_user`
--

INSERT INTO `ry_user` (`id`, `username`, `nickname`, `password`, `regtime`, `groupid`, `loginip`, `logintimes`, `lastlogintime`, `reid`, `score`, `grade_id`, `optime`) VALUES
(1, 'admin', '管理员', 'e10adc3949ba59abbe56e057f20f883e', 1375531517, 1, '127.0.0.1', 138, 1395243309, 0, 0, 0, 1395243674);
