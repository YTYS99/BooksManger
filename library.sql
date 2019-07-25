/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : library

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2019-06-14 10:48:01
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `books`
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `bname` varchar(255) NOT NULL,
  `ename` varchar(255) NOT NULL,
  `cp` varchar(255) NOT NULL,
  `sj` varchar(255) NOT NULL,
  `type1` varchar(255) NOT NULL,
  `sum1` int(11) NOT NULL,
  `sum2` int(11) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `savetime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  UNIQUE KEY `code_2` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO books VALUES ('1', '#Phpweb', 'PHP动态网站开发', '唐四新', '清华大学出版社', '', '计算机科学', '38', '25', '32.50', '2018-06-27 14:57:29');
INSERT INTO books VALUES ('2', '#PhpwebD', 'PHP项目开发实战密码', '于广', '清华大学出版社', '', '计算机科学', '22', '8', '65.00', '2017-06-21 14:59:03');
INSERT INTO books VALUES ('3', '#C3', 'C语言程序设计 (第3版) ', '谭浩强', '清华大学出版社', '', '计算机语言', '25', '0', '68.00', '2017-05-02 10:59:11');
INSERT INTO books VALUES ('4', '#python', 'Python程序设计教程', '杨年华', '清华大学出版社', '', '计算机语言', '34', '9', '39.50', '2015-10-02 17:59:22');
INSERT INTO books VALUES ('5', '#TN01', '通信原理.第7版', '樊昌信', '国防工业出版社', '', '计算机科学', '5', '0', '45.50', '2014-11-13 08:59:34');
INSERT INTO books VALUES ('6', '#TP183', '神经网络', '侯媛彬', '西安电子科技大学出版社 ', '', '计算机科学', '6', '5', '37.00', '2014-06-28 12:59:47');
INSERT INTO books VALUES ('7', '#WE21', 'Web程序设计', 'Robert W', '清华大学出版社', '', '计算机科学', '20', '15', '25.00', '2017-11-20 13:59:59');
INSERT INTO books VALUES ('8', '#JAVA21', '21天学通Java.第3版', '陈云婷', '电子工业出版社', '', '计算机语言', '25', '11', '55.00', '2017-09-02 10:00:10');
INSERT INTO books VALUES ('9', '#SYS', '操作系统.第4版', '刘振鹏', '中国铁道出版社', '', '计算机科学', '11', '3', '65.00', '2015-08-30 15:00:22');
INSERT INTO books VALUES ('10', '#MS11', '	数据库系统概论', '刘云生', '华中理工大学出版社 ', '', '计算机科学', '10', '1', '75.00', '2019-01-26 15:00:33');
INSERT INTO books VALUES ('11', '#MS10', '数据库技术及应用', '苗雪兰', '机械工业出版社', '', '计算机科学', '12', '6', '85.00', '2010-06-25 16:11:55');
INSERT INTO books VALUES ('12', '#CP55', '计算机组成原理', '李涛', '清华大学出版社', '', '计算机科学', '5', '0', '70.50', '2017-07-02 16:12:07');
INSERT INTO books VALUES ('14', '#SW01', '生物化学.第8版', '	姚文兵', '人民卫生出版社', '', '生物科学', '12', '8', '55.50', '2004-04-02 16:12:27');
INSERT INTO books VALUES ('15', '#SW25', '植物细胞组织培养', '刘庆昌', '中国农业大学出版社', '', '生物科学', '25', '22', '43.50', '2007-04-02 16:12:38');
INSERT INTO books VALUES ('16', '#SW33', '生物信息学应用教程', '	孙清鹏', '中国林业出版社', '', '生物科学', '15', '8', '40.50', '2003-11-13 16:12:48');
INSERT INTO books VALUES ('17', '#SW65', '植物学学习指导', '周先容', '重庆大学出版社', '', '生物科学', '5', '1', '55.00', '1999-08-24 16:13:02');
INSERT INTO books VALUES ('19', '#SW26', '生物学英语阅读', '史钰军', '浙江工商大学出版社', '', '生物科学', '6', '1', '65.00', '2010-01-10 16:13:13');
INSERT INTO books VALUES ('20', '#UML', 'UML统一建模语言', '李波', '清华大学出版社', '', '计算机语言', '20', '9', '45.00', '2019-04-02 07:06:59');

-- ----------------------------
-- Table structure for `items`
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `todate` datetime DEFAULT NULL,
  `connect` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `Usertype` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of items
-- ----------------------------
INSERT INTO items VALUES ('2', '啊手动阀手动阀手动阀', '2019-06-09 17:09:05', '2019-06-14 04:00:00', '<p>阿斯顿发射点发射点发射点发射点发射点发啊手动阀手动阀手动阀</p>', '待办事件', '');
INSERT INTO items VALUES ('3', '阿斯顿发射点发射点', '2019-06-09 17:09:33', '2019-06-22 03:03:00', '<p><strong><em><span style=\"text-decoration:underline;\"><span style=\"color:#95b3d7\">啊手动阀手动阀手动阀手动阀</span></span></em></strong></p>', '待办事件', '');
INSERT INTO items VALUES ('4', 'asdfasdfasd', '2019-06-09 18:04:51', '2019-06-29 20:01:00', '<p>asdfasdfasdfasdfasdfasdf</p>', '待办事件', '');
INSERT INTO items VALUES ('5', '地方萨芬大苏打', '2019-06-09 18:09:38', '2019-06-21 05:57:00', '<p>啊手动阀手动阀手动阀</p>', '待办事件', '');
INSERT INTO items VALUES ('6', '啊手动阀手动阀撒', '2019-06-09 18:09:50', '2019-06-28 04:55:00', '<p>啊手动阀手动阀手动阀</p>', '待办事件', '');
INSERT INTO items VALUES ('7', '啊手动阀手动阀手动阀', '2019-06-09 18:09:59', '2019-06-28 00:00:00', '<p>啊手动阀手动阀手动阀</p>', '通知公告', '教师');
INSERT INTO items VALUES ('8', '阿斯顿发射点发射点', '2019-06-09 18:10:10', '2019-06-28 00:00:00', '<p>啊手动阀手动阀手动阀</p>', '通知公告', '教师');
INSERT INTO items VALUES ('9', 'dddd', '2019-06-11 16:24:23', '2019-06-22 00:00:00', '<p>sdfasdfsadfasdfasdf</p>', '通知公告', '教师');
INSERT INTO items VALUES ('10', 'dddd', '2019-06-09 18:20:52', '2019-06-15 00:00:00', '<p>asdfasdf</p>', '通知公告', '教师');
INSERT INTO items VALUES ('11', 'sadfasdfasd', '2019-06-09 18:22:30', '2019-06-27 00:00:00', '<p>asdfasdfasdf</p>', '通知公告', '教师');
INSERT INTO items VALUES ('12', '大幅度反对法大幅度', '2019-06-09 18:31:18', '2019-06-14 00:00:00', '<p>多发点多发点多发点</p>', '通知公告', '教师');
INSERT INTO items VALUES ('13', '对方对方的的', '2019-06-09 18:34:52', '2019-06-21 00:00:00', '<p>大幅度反对反对对方的顶<strong>顶顶顶</strong></p>', '通知公告', '教师');
INSERT INTO items VALUES ('14', '的大幅度反对反对', '2019-06-09 18:35:07', '2019-06-21 07:56:00', '<p><strong>阿斯顿发射点发射点发射点发射点发</strong></p>', '待办事件', '');
INSERT INTO items VALUES ('15', '顶顶顶顶顶顶顶', '2019-06-09 20:20:28', null, '<p>啊手动阀手动阀手动阀手动阀</p>', '通知公告', '教师');
INSERT INTO items VALUES ('17', '顶顶顶顶顶顶顶的', '2019-06-09 22:35:06', '0000-00-00 00:00:00', '<p><img src=\"http://img.baidu.com/hi/jx2/j_0026.gif\"/></p>', '通知公告', '管理员');
INSERT INTO items VALUES ('18', '是的首发式发生', '2019-06-10 00:03:04', '2019-06-14 00:00:00', '<p>阿斯顿发射点发射点发射点发射点发射点发</p>', '通知公告', '学生');
INSERT INTO items VALUES ('20', 'asdfasdfa', '2019-06-10 10:24:09', null, '<p><br/>asdfasdfas</p>', '通知公告', '教师');
INSERT INTO items VALUES ('31', '中国char', '2019-06-12 08:56:04', null, '<p>12312312</p>', '通知公告', '管理员');
INSERT INTO items VALUES ('32', '中国人的', '2019-06-10 13:22:58', null, '<p>啊多发点</p>', '通知公告', '管理员');
INSERT INTO items VALUES ('36', '你好世界hello', '2019-06-12 08:47:12', null, '<p>你好啊<img src=\"http://img.baidu.com/hi/jx2/j_0016.gif\"/></p>', '通知公告', '管理员');
INSERT INTO items VALUES ('37', '长度的单位', '2019-06-12 11:56:54', '2019-06-13 21:05:00', '<p>顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶</p>', '待办事件', null);
INSERT INTO items VALUES ('38', '顶顶顶顶顶', '2019-06-12 11:58:18', null, '<p>的发生发射点</p>', '通知公告', '学生');

-- ----------------------------
-- Table structure for `new`
-- ----------------------------
DROP TABLE IF EXISTS `new`;
CREATE TABLE `new` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `Editor` varchar(255) NOT NULL,
  `connect` longtext NOT NULL,
  `date` datetime NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `Usertype` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of new
-- ----------------------------
INSERT INTO new VALUES ('5', '逆大势不可能得民心', '五月荷1', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;p style=&quot;margin-top: 25px; margin-bottom: 25px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 18px; line-height: 32.4px; font-family: &quot;Microsoft Yahei&quot;; color: rgb(34, 34, 34); whi &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '2019-06-11 16:28:16', '新闻', null);
INSERT INTO new VALUES ('6', '5G商用牌照正式发放 ', '刘春山', '<p style=\"margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal;\"><span class=\"bjh-p\">工信部6月6日正式发放5G商用牌照，这意味着我国正式进入5G商用元年，接下来四大运营商将进入快速建设阶段。值得注意的是，此次中国广电成', '2019-06-10 16:47:16', '新闻', null);
INSERT INTO new VALUES ('8', '冯德校冒雨检查指导防...', ' 华声在线', '<p style=\"margin-top: 26px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal;\"><span class=\"bjh-p\">新湖南客户端(通讯员 刘联波)6月9日早上5点到上午9点，东安县城突降大到暴雨，致使部分地势较低的商铺和住房一楼积水，部分沿河地段基础', '2019-06-10 16:57:41', '新闻', null);
INSERT INTO new VALUES ('9', '美白宫官员请求延期禁华', '环球网', '<p style=\"margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal;\"><span class=\"bjh-p\">去年，美国通过一部名为《国防授权法案》的国防法律，以国家安全为由全面禁止美国联邦政府购买华为等部分中国企业的的产品，也不许美国政府的承', '2019-06-10 17:00:07', '新闻', null);
INSERT INTO new VALUES ('10', '华为全新Logo...', ' 快科技', '<p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal;\"><span class=\"bjh-p\">诞生三年，多款精品机型，华为nova系列在全球吸引了超过6500万用户，极大拓展了华为手机在新生代人群的份额和品牌认知。随着该系列产品的', '2019-06-10 17:01:01', '新闻', null);
INSERT INTO new VALUES ('11', '华为事件启示：可...', '金融界', '<p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal;\"><span class=\"bjh-p\">来源：中国企业家杂志</span></p><p style=\"margin-top: 22px; margin-bottom: 0px;', '2019-06-10 17:01:37', '新闻', null);
INSERT INTO new VALUES ('12', '做好自己的事 华为...', '鲁网资讯', '<p style=\"margin-top: 22px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal;\"><span class=\"bjh-p\"><span class=\"bjh-strong\" style=\"font-size: 18px; font-weight: 700;\"', '2019-06-10 17:03:04', '新闻', null);
INSERT INTO new VALUES ('13', '华为制造来了，Go...', '财经下午茶', '<p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 24px; color: rgb(51, 51, 51); text-align: justify; font-family: arial; white-space: normal;\"><span class=\"bjh-p\">Google翻脸后，华为抛出一颗重磅炸弹，Google慌（后悔）了！</span></p><p style=\"margin-top: 2', '2019-06-10 17:04:54', '新闻', null);
INSERT INTO new VALUES ('14', '华为“忍痛割爱”,出..', 'AI科技新社', '<p><span style=\"color: rgb(51, 51, 51); font-family: arial; text-align: justify; white-space: normal;\">5月中旬，特朗普政府发声，所有美国公司都不得购买华为的设备。它还开始限制华为购买美国芯片和技术。事实上，自二战以来，美国一直被列为世界头号霸权大国，而且美国总是以自己的利益为先。从历史上看，美国在许多事件中都会对其他国家进行压制。而中国的崛起似乎对美国构成了威胁。很多人认为，为了保护自己国家的企业，美国', '2019-06-10 17:05:58', '新闻', null);

-- ----------------------------
-- Table structure for `records`
-- ----------------------------
DROP TABLE IF EXISTS `records`;
CREATE TABLE `records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(255) NOT NULL,
  `realname` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `bname` varchar(255) NOT NULL,
  `ename` varchar(255) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `statu` varchar(255) NOT NULL,
  `lendtime` datetime NOT NULL,
  `returntime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of records
-- ----------------------------
INSERT INTO records VALUES ('15', '20170103706', '易涛', '#C3', 'C语言程序设计 (第3版) ', '谭浩强', '68.00', '已归还', '0000-00-00 00:00:00', '2019-04-03 10:01:16');
INSERT INTO records VALUES ('16', '20170103706', '易涛', '#C3', 'C语言程序设计 (第3版) ', '谭浩强', '68.00', '已归还', '0000-00-00 00:00:00', '2019-04-03 10:01:16');
INSERT INTO records VALUES ('17', '20170103706', '易涛', '#SYS', '操作系统.第4版', '刘振鹏', '65.00', '已归还', '0000-00-00 00:00:00', '2019-04-04 09:10:12');
INSERT INTO records VALUES ('18', '20170103706', '易涛', '#SYS', '操作系统.第4版', '刘振鹏', '65.00', '已归还', '0000-00-00 00:00:00', '2019-04-04 09:10:12');
INSERT INTO records VALUES ('19', '20170103706', '易涛', '#SYS', '操作系统.第4版', '刘振鹏', '65.00', '已归还', '0000-00-00 00:00:00', '2019-04-04 09:10:12');
INSERT INTO records VALUES ('20', '20170103708', '李老师', '#Phpweb', 'PHP动态网站开发', '唐四新', '32.50', '已归还', '0000-00-00 00:00:00', '2019-04-04 12:42:32');
INSERT INTO records VALUES ('21', '20170103708', '李老师', '#TN01', '通信原理.第7版', '樊昌信, 曹丽娜', '45.50', '已归还', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO records VALUES ('22', '20170103708', '李老师', '#PhpwebD', 'PHP项目开发实战密码', '于广', '65.00', '已归还', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO records VALUES ('23', '20170103708', '李老师', '#Phpweb', 'PHP动态网站开发', '唐四新', '32.50', '已归还', '0000-00-00 00:00:00', '2019-04-04 12:42:32');
INSERT INTO records VALUES ('24', '20170103708', '李老师', '#WE21', 'Web程序设计', 'Robert W', '25.00', '已归还', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO records VALUES ('25', '20170103708', '李老师', '#TN01', '通信原理.第7版', '樊昌信, 曹丽娜', '45.50', '借阅中', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO records VALUES ('26', '20170103708', '李老师', '#MS10', '数据库技术及应用', '苗雪兰', '85.00', '借阅中', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO records VALUES ('27', '20170103706', '易涛', '#C3', 'C语言程序设计 (第3版) ', '谭浩强', '68.00', '已归还', '0000-00-00 00:00:00', '2019-04-03 10:01:16');
INSERT INTO records VALUES ('28', '20170103708', '李老师', '#Phpweb', 'PHP动态网站开发', '唐四新', '32.50', '已归还', '0000-00-00 00:00:00', '2019-04-04 12:42:32');
INSERT INTO records VALUES ('30', '20170103706', '易涛', '#SYS', '操作系统.第4版', '刘振鹏', '65.00', '已归还', '2019-04-02 06:55:53', '2019-04-04 09:10:12');
INSERT INTO records VALUES ('31', '20170103706', '易涛', '#UML', 'UML统一建模语言', '李波、杨弘平', '45.00', '已归还', '2019-04-02 07:17:28', '2019-04-02 15:23:36');
INSERT INTO records VALUES ('32', '20170103706', '易涛', '#SYS', '操作系统.第4版', '刘振鹏', '65.00', '已归还', '2019-04-02 15:28:03', '2019-04-04 09:10:12');
INSERT INTO records VALUES ('33', '20170103706', '易涛', '#C3', 'C语言程序设计 (第3版) ', '谭浩强', '68.00', '已归还', '2019-04-03 10:00:42', '2019-04-03 10:01:16');
INSERT INTO records VALUES ('34', '20170103708', '李老师', '#Phpweb', 'PHP动态网站开发', '唐四新', '32.50', '已归还', '2019-04-04 08:49:34', '2019-04-04 12:42:32');
INSERT INTO records VALUES ('35', '20170103682', '曾劭炜', '#Phpweb', 'PHP动态网站开发', '唐四新', '32.50', '已归还', '2019-04-04 09:11:58', '2019-04-04 09:12:16');
INSERT INTO records VALUES ('36', '20170103708', '李老师', '#Phpweb', 'PHP动态网站开发', '唐四新', '32.50', '已归还', '2019-04-04 09:23:00', '2019-04-04 12:42:32');
INSERT INTO records VALUES ('37', '20170103708', '李老师', '#Phpweb', 'PHP动态网站开发', '唐四新', '32.50', '已归还', '2019-04-04 09:28:12', '2019-04-04 12:42:32');
INSERT INTO records VALUES ('38', '20170103708', '李老师', '#Phpweb', 'PHP动态网站开发', '唐四新', '32.50', '已归还', '2019-04-04 12:42:06', '2019-04-04 12:42:32');
INSERT INTO records VALUES ('39', '20170103706', '易涛', '#Phpweb', 'PHP动态网站开发', '唐四新', '32.50', '已归还', '2019-06-09 22:07:58', '2019-06-12 08:53:54');
INSERT INTO records VALUES ('40', '20170103706', '易涛', '#Phpweb', 'PHP动态网站开发', '唐四新', '32.50', '已归还', '2019-06-12 08:52:59', '2019-06-12 08:53:54');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `realname` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `root` varchar(255) NOT NULL,
  `sch` varchar(255) NOT NULL,
  `money` decimal(11,2) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `account` (`account`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO user VALUES ('1', '20170103706', '123456', '易涛', '男', '管理员', '信息科学与技术学院', '0.00', null);
INSERT INTO user VALUES ('2', '20170103707', '123456', '易老师', '男', '教师', '信息科学与技术学院', '0.00', null);
INSERT INTO user VALUES ('3', '20170103708', '123', '李老师', '女', '教师', '信息科学与技术学院', '0.00', null);
INSERT INTO user VALUES ('6', '20170103710', '123', '小红', '女', '学生', '信息科学与技术学院', '0.00', null);
INSERT INTO user VALUES ('7', '20170103711', '123', '李刚', '男', '学生', '信息科学与技术学院', '0.00', null);
INSERT INTO user VALUES ('15', '20170103712', '123', '王中', '男', '学生', '信息科学与技术学院', '0.00', null);
INSERT INTO user VALUES ('16', '20170103713', '123', '张良', '男', '学生', '信息科学与技术学院', '0.00', null);
INSERT INTO user VALUES ('17', '20170103705', '123', 'YT', '男', '管理员', '信息科学与技术学院', '0.00', null);
INSERT INTO user VALUES ('18', '20170103704', '123456', '张玲', '女', '管理员', '信息科学与技术学院', '0.00', null);
INSERT INTO user VALUES ('19', '20170103703', '123', '张亮', '男', '管理员', '信息科学与技术学院', '0.00', null);
INSERT INTO user VALUES ('21', '20170103714', '123', '赵四', '男', '学生', '', '0.00', null);
INSERT INTO user VALUES ('22', '20170103715', '123', '钱一', '男', '学生', '', '0.00', null);
INSERT INTO user VALUES ('23', '20170103716', '123', '李三', '男', '学生', '', '0.00', null);
INSERT INTO user VALUES ('24', '20170103717', '123', '孙二', '男', '学生', '', '0.00', null);
INSERT INTO user VALUES ('27', '20170103682', '123', '曾哥', '男', '学生', '', '0.00', null);
INSERT INTO user VALUES ('28', '201701037025', '123', 'xx', '女', '学生', '', '0.00', null);
