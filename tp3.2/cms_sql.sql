/**
 *后台管理员用户表
 */
CREATE TABLE `cms_admin` (
  `admin_id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,/*管理员id*/
  `username` varchar(20) NOT NULL DEFAULT '',/*用户名*/
  `password` varchar(32) NOT NULL DEFAULT '',/*密码*/
  `lastloginip` varchar(15) NOT NULL DEFAULT '0',/*登录IP*/
  `lastlogintime` int(10) unsigned DEFAULT '0',/*登录时间*/
  `email` varchar(40) DEFAULT '',/*邮箱*/
  `realname` varchar(50) NOT NULL DEFAULT '',/*真实名字*/
  `status` tinyint(1) NOT NULL DEFAULT '1',/*状态*/
  PRIMARY KEY (`admin_id`),/*管理员id问主键*/
  KEY `username` (`username`)/*索引 不能重复*/
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/**
 * 菜单表
 */
CREATE TABLE `cms_menu` (
  `menu_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,/*菜单id*/
  `name` varchar(40) NOT NULL DEFAULT '',/*菜单名*/
  `parentid` smallint(6) NOT NULL DEFAULT '0',/*涉及多级导航用到*/
  `m` varchar(20) NOT NULL DEFAULT '',/*模块 比如是属于后台 还是前台*/
  `c` varchar(20) NOT NULL DEFAULT '',/*控制器 */
  `f` varchar(20) NOT NULL DEFAULT '',/*方法 */
  `listorder` smallint(6) unsigned NOT NULL DEFAULT '0',/*排序*/
  `status` tinyint(1) NOT NULL DEFAULT '1',/*status=1 正常 0关闭 -1删除  默认为1*/
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',/*类型 代表属于前端栏目 还是后台栏目*/
  PRIMARY KEY (`menu_id`),/*菜单名为主键*/
  KEY `listorder` (`listorder`),
  KEY `parentid` (`parentid`),
  KEY `module` (`m`,`c`,`f`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/**
 * 新闻文章主表
 */
CREATE TABLE `cms_news` (
  `news_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,/*文章ID*/
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0',/*属于哪个栏目*/
  `title` varchar(80) NOT NULL DEFAULT '',/*标题*/
  `small_title` varchar(30) NOT NULL DEFAULT '',/*文章副标题*/
  `title_font_color` varchar(250) DEFAULT NULL COMMENT '标题颜色',/*标题显示的颜色*/
  `thumb` varchar(100) NOT NULL DEFAULT '',/*缩图*/
  `keywords` char(40) NOT NULL DEFAULT '',/*关键字*/
  `description` varchar(250) NOT NULL COMMENT '文章描述',/*描述*/
  `listorder` tinyint(3) unsigned NOT NULL DEFAULT '0',/*排序*/
  `status` tinyint(1) NOT NULL DEFAULT '1',/*status=1 正常 0关闭 -1删除  默认为1*/
  `copyfrom` varchar(250) DEFAULT NULL COMMENT '来源',/*文章来自哪里*/
  `username` char(20) NOT NULL,/*文章是谁增加的*/
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',/*创建时间*/
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',/*更新时间*/
  `count` int(10) unsigned NOT NULL DEFAULT '0',/*计数器*/
  PRIMARY KEY (`news_id`),/*文章id做主键*/
  KEY `listorder` (`listorder`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/**
 * 新闻文章内容副表
 */
CREATE TABLE `cms_news_content` (
  `id` mediumint(8) unsigned NOT NULl AUTO_INCREMENT,/*新闻文章副表的id*/
  `news_id` mediumint(8) unsigned NOT NULL,/*主表的主键id*/
  `content` mediumtext NOT NULL,/*文章详细内容*/
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',/*创建时间*/
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',/*更新时间*/
  PRIMARY KEY (`id`),
  KEY `news_id` (`news_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/**
 * 推荐位标识表
 */
 CREATE TABLE `cms_position` (
   `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,/*推荐位id*/
   `name` char(30) NOT NULL DEFAULT '',/*推荐位名称*/
   `status` tinyint(1) NOT NULL DEFAULT '1',/*状态 */
   `description` char(100) DEFAULT NULL,/*推荐位描述*/
   `create_time` int(10) unsigned NOT NULL DEFAULT '0',/*推荐位创建时间*/
   `update_time` int(10) unsigned NOT NULL DEFAULT '0',/*推荐位更新时间*/
   PRIMARY KEY (`id`)/*推荐位id作为主键*/
 ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

 /**
  * 推荐位内容表
  */
CREATE TABLE `cms_positon_content` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,/*推荐位详细内容的id*/
  `position_id` int(5) unsigned NOT NULL,/*推荐位标识表的id*/
  `title` varchar(30) NOT NULL DEFAULT '',/*标题*/
  `thumb` varchar(100) NOT NULL DEFAULT '',/*缩图*/
  `url` varchar(100) DEFAULT NULL,/*url 来自哪里*/
  `news_id` mediumint(8) unsigned NOT NULL,/*文章内容id  根据这个找到文章详细内容*/
  `listorder` tinyint(3) unsigned NOT NULl DEFAULT '0',/*推荐位的排序*/
  `status` tinyint(1) NOT NULL DEFAULT '1',/*status=1 正常 0关闭 -1删除  默认为1*/
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',/*推荐位详细内容创建时间*/
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',/*推荐位纤细内容的更新时间*/
  PRIMARY KEY (`id`),/*推荐位id做主键*/
  KEY `position_id` (`position_id`)/*推荐位做索引*/
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;