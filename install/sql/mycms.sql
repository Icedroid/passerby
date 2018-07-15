-- --------------------------------------------------------
-- 主机:                           192.168.1.13
-- 服务器版本:                        5.7.22-0ubuntu18.04.1 - (Ubuntu)
-- 服务器操作系统:                      Linux
-- HeidiSQL 版本:                  9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- 导出 mycms 的数据库结构
CREATE DATABASE IF NOT EXISTS `mycms` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `mycms`;

-- 导出  表 mycms.admin_log 结构
CREATE TABLE IF NOT EXISTS `admin_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `user_id` int(11) unsigned NOT NULL COMMENT '管理员用户id',
  `route` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '操作路由',
  `description` text COLLATE utf8_unicode_ci COMMENT '操作描述',
  `created_at` int(11) unsigned NOT NULL COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最后修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  mycms.admin_log 的数据：~57 rows (大约)
DELETE FROM `admin_log`;
/*!40000 ALTER TABLE `admin_log` DISABLE KEYS */;
INSERT INTO `admin_log` (`id`, `user_id`, `route`, `description`, `created_at`, `updated_at`) VALUES
	(1, 1, 'frontend-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} frontend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 24 {{%RECORD%}}: <br>名称(name) : php=>研究报告,<br>地址(url) : /php=>/page/about,<br>最后更新(updated_at) : 1505636937=>1530457414', 1530457414, 1530457414),
	(2, 1, 'frontend-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} frontend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 25 {{%RECORD%}}: <br>名称(name) : java=>订购流程,<br>地址(url) : /java=>/page/about,<br>最后更新(updated_at) : 1505636975=>1530457447', 1530457447, 1530457447),
	(3, 1, 'frontend-menu/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} frontend\\models\\Menu [ {{%menu}} ]  {{%UPDATED%}} {{%ID%}} 26 {{%RECORD%}}: <br>名称(name) : javascript=>收费标准,<br>地址(url) : /javascript=>/page/about,<br>最后更新(updated_at) : 1505637000=>1530457486', 1530457486, 1530457486),
	(4, 1, 'frontend-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} frontend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 30 {{%RECORD%}}: <br>序号(id) => 30,<br>类型(type) => 1,<br>父分类Id(parent_id) => 0,<br>名称(name) => 会员中心,<br>地址(url) => /page/about,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => _self,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1530457507,<br>最后更新(updated_at) => 1530457507', 1530457507, 1530457507),
	(5, 1, 'frontend-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} frontend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 31 {{%RECORD%}}: <br>序号(id) => 31,<br>类型(type) => 1,<br>父分类Id(parent_id) => 0,<br>名称(name) => 关于我们,<br>地址(url) => /page/about,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => _self,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1530457529,<br>最后更新(updated_at) => 1530457529', 1530457529, 1530457529),
	(6, 1, 'frontend-menu/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} frontend\\models\\Menu [ {{%menu}} ]  {{%CREATED%}} {{%ID%}} 32 {{%RECORD%}}: <br>序号(id) => 32,<br>类型(type) => 1,<br>父分类Id(parent_id) => 0,<br>名称(name) => 联系我们,<br>地址(url) => /page/about,<br>图标(icon) => ,<br>排序(sort) => 0,<br>新窗口打开(target) => _self,<br>绝对地址(is_absolute_url) => 0,<br>是否显示(is_display) => 1,<br>创建时间(created_at) => 1530457549,<br>最后更新(updated_at) => 1530457549', 1530457549, 1530457549),
	(7, 1, 'page/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\ArticleContent [ {{%article_content}} ]  {{%UPDATED%}} {{%ID%}} 24 {{%RECORD%}}: <br>正文内容(content) : <p>QQ:1838889850</p><p>Email:admin#feehi.com(请将@替换成＃)</p>=><p>服务热线：010-85251051</p>', 1530458881, 1530458881),
	(8, 1, 'page/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%UPDATED%}} {{%ID%}} 24 {{%RECORD%}}: <br>最后更新(updated_at) : 1476717356=>1530458881', 1530458881, 1530458881),
	(9, 1, 'page/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\ArticleContent [ {{%article_content}} ]  {{%UPDATED%}} {{%ID%}} 23 {{%RECORD%}}: <br>正文内容(content) : <p>飞嗨cms</p>=><p>服务热线：010-85251051</p>', 1530458895, 1530458895),
	(10, 1, 'page/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%UPDATED%}} {{%ID%}} 23 {{%RECORD%}}: <br>最后更新(updated_at) : 1476717356=>1530458895', 1530458895, 1530458895),
	(11, 1, 'page/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\ArticleContent [ {{%article_content}} ]  {{%CREATED%}} {{%ID%}} 26 {{%RECORD%}}: <br>序号(id) => 26,<br>Aid(aid) => 26,<br>正文内容(content) => <p>服务热线：010-85251051</p>', 1530458928, 1530458928),
	(12, 1, 'page/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%CREATED%}} {{%ID%}} 26 {{%RECORD%}}: <br>序号(id) => 26,<br>分类ID(cid) => ,<br>类型(type) => 2,<br>标题(title) => 研究报告,<br>副标题(sub_title) => report,<br>概述(summary) => ,<br>缩略图(thumb) => ,<br>seo标题(seo_title) => ,<br>seo关键字(seo_keywords) => ,<br>seo描述(seo_description) => ,<br>状态(status) => 1,<br>排序(sort) => 0,<br>作者ID(author_id) => 1,<br>作者(author_name) => admin,<br>浏览次数(scan_count) => ,<br>评论次数(comment_count) => ,<br>评论(can_comment) => 1,<br>可见(visibility) => 1,<br>密码(password) => ,<br>头条(flag_headline) => ,<br>推荐(flag_recommend) => ,<br>幻灯(flag_slide_show) => ,<br>特别推荐(flag_special_recommend) => ,<br>滚动(flag_roll) => ,<br>加粗(flag_bold) => ,<br>图片(flag_picture) => ,<br>创建时间(created_at) => 1530458928,<br>最后更新(updated_at) => 1530458928', 1530458928, 1530458928),
	(13, 1, 'page/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\ArticleContent [ {{%article_content}} ]  {{%CREATED%}} {{%ID%}} 27 {{%RECORD%}}: <br>序号(id) => 27,<br>Aid(aid) => 27,<br>正文内容(content) => <p>服务热线：010-85251051</p>', 1530458966, 1530458966),
	(14, 1, 'page/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%CREATED%}} {{%ID%}} 27 {{%RECORD%}}: <br>序号(id) => 27,<br>分类ID(cid) => ,<br>类型(type) => 2,<br>标题(title) => 订购流程,<br>副标题(sub_title) => order,<br>概述(summary) => ,<br>缩略图(thumb) => ,<br>seo标题(seo_title) => ,<br>seo关键字(seo_keywords) => ,<br>seo描述(seo_description) => ,<br>状态(status) => 1,<br>排序(sort) => 0,<br>作者ID(author_id) => 1,<br>作者(author_name) => admin,<br>浏览次数(scan_count) => ,<br>评论次数(comment_count) => ,<br>评论(can_comment) => 1,<br>可见(visibility) => 1,<br>密码(password) => ,<br>头条(flag_headline) => ,<br>推荐(flag_recommend) => ,<br>幻灯(flag_slide_show) => ,<br>特别推荐(flag_special_recommend) => ,<br>滚动(flag_roll) => ,<br>加粗(flag_bold) => ,<br>图片(flag_picture) => ,<br>创建时间(created_at) => 1530458966,<br>最后更新(updated_at) => 1530458966', 1530458966, 1530458966),
	(15, 1, 'page/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\ArticleContent [ {{%article_content}} ]  {{%CREATED%}} {{%ID%}} 28 {{%RECORD%}}: <br>序号(id) => 28,<br>Aid(aid) => 28,<br>正文内容(content) => <p>服务热线：010-85251051</p>', 1530458982, 1530458982),
	(16, 1, 'page/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%CREATED%}} {{%ID%}} 28 {{%RECORD%}}: <br>序号(id) => 28,<br>分类ID(cid) => ,<br>类型(type) => 2,<br>标题(title) => 收费标准,<br>副标题(sub_title) => pay,<br>概述(summary) => ,<br>缩略图(thumb) => ,<br>seo标题(seo_title) => ,<br>seo关键字(seo_keywords) => ,<br>seo描述(seo_description) => ,<br>状态(status) => 1,<br>排序(sort) => 0,<br>作者ID(author_id) => 1,<br>作者(author_name) => admin,<br>浏览次数(scan_count) => ,<br>评论次数(comment_count) => ,<br>评论(can_comment) => 1,<br>可见(visibility) => 1,<br>密码(password) => ,<br>头条(flag_headline) => ,<br>推荐(flag_recommend) => ,<br>幻灯(flag_slide_show) => ,<br>特别推荐(flag_special_recommend) => ,<br>滚动(flag_roll) => ,<br>加粗(flag_bold) => ,<br>图片(flag_picture) => ,<br>创建时间(created_at) => 1530458981,<br>最后更新(updated_at) => 1530458981', 1530458982, 1530458982),
	(17, 1, 'page/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\ArticleContent [ {{%article_content}} ]  {{%CREATED%}} {{%ID%}} 29 {{%RECORD%}}: <br>序号(id) => 29,<br>Aid(aid) => 29,<br>正文内容(content) => <p>服务热线：010-85251051</p>', 1530459070, 1530459070),
	(18, 1, 'page/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%CREATED%}} {{%ID%}} 29 {{%RECORD%}}: <br>序号(id) => 29,<br>分类ID(cid) => ,<br>类型(type) => 2,<br>标题(title) => 会员中心,<br>副标题(sub_title) => member,<br>概述(summary) => ,<br>缩略图(thumb) => ,<br>seo标题(seo_title) => ,<br>seo关键字(seo_keywords) => ,<br>seo描述(seo_description) => ,<br>状态(status) => 1,<br>排序(sort) => 0,<br>作者ID(author_id) => 1,<br>作者(author_name) => admin,<br>浏览次数(scan_count) => ,<br>评论次数(comment_count) => ,<br>评论(can_comment) => 1,<br>可见(visibility) => 1,<br>密码(password) => ,<br>头条(flag_headline) => ,<br>推荐(flag_recommend) => ,<br>幻灯(flag_slide_show) => ,<br>特别推荐(flag_special_recommend) => ,<br>滚动(flag_roll) => ,<br>加粗(flag_bold) => ,<br>图片(flag_picture) => ,<br>创建时间(created_at) => 1530459070,<br>最后更新(updated_at) => 1530459070', 1530459070, 1530459070),
	(19, 1, 'page/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%UPDATED%}} {{%ID%}} 26 {{%RECORD%}}: <br>排序(sort) : 0=>1,<br>最后更新(updated_at) : 1530458928=>1530459156', 1530459156, 1530459156),
	(20, 1, 'page/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%UPDATED%}} {{%ID%}} 27 {{%RECORD%}}: <br>排序(sort) : 0=>2,<br>最后更新(updated_at) : 1530458966=>1530459157', 1530459157, 1530459157),
	(21, 1, 'page/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%UPDATED%}} {{%ID%}} 28 {{%RECORD%}}: <br>排序(sort) : 0=>3,<br>最后更新(updated_at) : 1530458981=>1530459158', 1530459158, 1530459158),
	(22, 1, 'page/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%UPDATED%}} {{%ID%}} 29 {{%RECORD%}}: <br>排序(sort) : 0=>4,<br>最后更新(updated_at) : 1530459070=>1530459160', 1530459160, 1530459160),
	(23, 1, 'page/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%UPDATED%}} {{%ID%}} 24 {{%RECORD%}}: <br>排序(sort) : 0=>5,<br>最后更新(updated_at) : 1530458881=>1530459170', 1530459170, 1530459170),
	(24, 1, 'page/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%UPDATED%}} {{%ID%}} 23 {{%RECORD%}}: <br>排序(sort) : 0=>6,<br>最后更新(updated_at) : 1530458895=>1530459171', 1530459171, 1530459171),
	(25, 1, 'page/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%UPDATED%}} {{%ID%}} 23 {{%RECORD%}}: <br>排序(sort) : 6=>1,<br>最后更新(updated_at) : 1530459171=>1530459195', 1530459195, 1530459195),
	(26, 1, 'setting/website', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\SettingWebsiteForm [ {{%options}} ]  {{%UPDATED%}} {{%ID%}} 5 {{%RECORD%}}: <br>Value(value) : admin@feehi.com=>', 1530460526, 1530460526),
	(27, 1, 'setting/website', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\SettingWebsiteForm [ {{%options}} ]  {{%UPDATED%}} {{%ID%}} 7 {{%RECORD%}}: <br>Value(value) : 粤ICP备15018643号=>粤ICP备16046946号-1', 1530460526, 1530460526),
	(28, 1, 'page/sort', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%UPDATED%}} {{%ID%}} 23 {{%RECORD%}}: <br>排序(sort) : 1=>6,<br>最后更新(updated_at) : 1530459195=>1530461044', 1530461044, 1530461044),
	(29, 1, 'page/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%UPDATED%}} {{%ID%}} 24 {{%RECORD%}}: <br>标题(title) : 联系方式=>联系我们,<br>最后更新(updated_at) : 1530459170=>1530461108', 1530461108, 1530461108),
	(30, 1, 'article/delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\ArticleContent [ {{%article_content}} ]  {{%DELETED%}} {{%ID%}} 25 {{%RECORD%}}: <br>序号(id) => 25,<br>Aid(aid) => 25,<br>正文内容(content) => <p>ddddddddddddddddddd</p>', 1530461649, 1530461649),
	(31, 1, 'article/delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%DELETED%}} {{%ID%}} 25 {{%RECORD%}}: <br>序号(id) => 25,<br>分类ID(cid) => 0,<br>类型(type) => 0,<br>标题(title) => dfdf,<br>副标题(sub_title) => dfd,<br>概述(summary) => fsafsdfsdf,<br>缩略图(thumb) => ,<br>seo标题(seo_title) => ,<br>seo关键字(seo_keywords) => ,<br>seo描述(seo_description) => ,<br>状态(status) => 0,<br>排序(sort) => 0,<br>作者ID(author_id) => 1,<br>作者(author_name) => admin,<br>浏览次数(scan_count) => 0,<br>评论次数(comment_count) => 0,<br>评论(can_comment) => 1,<br>可见(visibility) => 1,<br>密码(password) => ,<br>头条(flag_headline) => 0,<br>推荐(flag_recommend) => 0,<br>幻灯(flag_slide_show) => 0,<br>特别推荐(flag_special_recommend) => 0,<br>滚动(flag_roll) => 0,<br>加粗(flag_bold) => 0,<br>图片(flag_picture) => 0,<br>创建时间(created_at) => 1468898361,<br>最后更新(updated_at) => 1476717356', 1530461649, 1530461649),
	(32, 1, 'article/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%UPDATED%}} {{%ID%}} 22 {{%RECORD%}}: <br>缩略图(thumb) : /uploads/article/thumb/2016071213224495.jpg=>/uploads/article/thumb/20180702001534_5b38fe264b499.png,<br>最后更新(updated_at) : 1476717385=>1530461734', 1530461734, 1530461734),
	(33, 1, 'article/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%UPDATED%}} {{%ID%}} 22 {{%RECORD%}}: <br>推荐(flag_recommend) : 0=>1,<br>最后更新(updated_at) : 1530461734=>1530461836', 1530461836, 1530461836),
	(34, 1, 'article/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%UPDATED%}} {{%ID%}} 22 {{%RECORD%}}: <br>特别推荐(flag_special_recommend) : 0=>1,<br>最后更新(updated_at) : 1530461836=>1530461858', 1530461858, 1530461858),
	(35, 1, 'article/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%UPDATED%}} {{%ID%}} 22 {{%RECORD%}}: <br>推荐(flag_recommend) : 1=>0,<br>最后更新(updated_at) : 1530461858=>1530461866', 1530461866, 1530461866),
	(36, 1, 'setting/website', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\SettingWebsiteForm [ {{%options}} ]  {{%UPDATED%}} {{%ID%}} 3 {{%RECORD%}}: <br>Value(value) : Feehi CMS=>Land', 1530493857, 1530493857),
	(37, 1, 'setting/website', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\SettingWebsiteForm [ {{%options}} ]  {{%UPDATED%}} {{%ID%}} 1 {{%RECORD%}}: <br>Value(value) : 飞嗨,cms,yii2,php,feehi cms=>Land', 1530493857, 1530493857),
	(38, 1, 'setting/website', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\form\\SettingWebsiteForm [ {{%options}} ]  {{%UPDATED%}} {{%ID%}} 2 {{%RECORD%}}: <br>Value(value) : Feehi CMS，最好的cms之一=>Land，最好的cms之一', 1530493857, 1530493857),
	(39, 1, 'article/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%UPDATED%}} {{%ID%}} 22 {{%RECORD%}}: <br>评论(can_comment) : 1=>0,<br>最后更新(updated_at) : 1530461866=>1530493998', 1530493998, 1530493998),
	(40, 1, 'article/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%UPDATED%}} {{%ID%}} 22 {{%RECORD%}}: <br>可见(visibility) : 1=>4,<br>最后更新(updated_at) : 1530493998=>1530494031', 1530494031, 1530494031),
	(41, 1, 'article/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} common\\models\\meta\\ArticleMetaTag [ {{%article_meta}} ]  {{%CREATED%}} {{%ID%}} 50 {{%RECORD%}}: <br>序号(id) => 50,<br>Aid(aid) => 22,<br>Key(key) => tag,<br>值(value) => IT与服务,<br>创建时间(created_at) => 1530494256', 1530494256, 1530494256),
	(42, 1, 'article/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} common\\models\\meta\\ArticleMetaTag [ {{%article_meta}} ]  {{%DELETED%}} {{%ID%}} 48 {{%RECORD%}}: <br>序号(id) => 48,<br>Aid(aid) => 22,<br>Key(key) => tag,<br>值(value) => java,<br>创建时间(created_at) => 1507514051', 1530494256, 1530494256),
	(43, 1, 'article/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} common\\models\\meta\\ArticleMetaTag [ {{%article_meta}} ]  {{%DELETED%}} {{%ID%}} 49 {{%RECORD%}}: <br>序号(id) => 49,<br>Aid(aid) => 22,<br>Key(key) => tag,<br>值(value) => java集合,<br>创建时间(created_at) => 1507514051', 1530494256, 1530494256),
	(44, 1, 'article/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%UPDATED%}} {{%ID%}} 22 {{%RECORD%}}: <br>标题(title) : 关于Java集合的小抄=>中国中间软件行业现状研究分析及市场前景,<br>概述(summary) : 在尽可能短的篇幅里，将所有集合与并发集合的特征，实现方式，性能捋一遍。适合所有”精通Java”其实还不那么自信的人阅读。=>在尽可能短的篇幅里，中国中间软件行业现状研究分析及市场前景，适合所有其实还不那么自信的人阅读。,<br>seo标题(seo_title) : 关于Java集合的小抄=>,<br>seo关键字(seo_keywords) : java,java集合=>,<br>seo描述(seo_description) : 在尽可能短的篇幅里，将所有集合与并发集合的特征，实现方式，性能捋一遍。适合所有”精通Java”其实还不那么自信的人阅读。=>,<br>最后更新(updated_at) : 1530494031=>1530494256', 1530494256, 1530494256),
	(45, 1, 'category/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} common\\models\\Category [ {{%category}} ]  {{%UPDATED%}} {{%ID%}} 1 {{%RECORD%}}: <br>名称(name) : php=>能源化工,<br>别名(alias) : php=>nengyuan,<br>最后更新(updated_at) : 0=>1530494327', 1530494327, 1530494327),
	(46, 1, 'category/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} common\\models\\Category [ {{%category}} ]  {{%UPDATED%}} {{%ID%}} 2 {{%RECORD%}}: <br>名称(name) : java=>IT与服务,<br>别名(alias) : java=>it,<br>最后更新(updated_at) : 0=>1530494355', 1530494355, 1530494355),
	(47, 1, 'category/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} common\\models\\Category [ {{%category}} ]  {{%UPDATED%}} {{%ID%}} 3 {{%RECORD%}}: <br>名称(name) : javascript=>网络通信,<br>别名(alias) : javascript=>network,<br>最后更新(updated_at) : 0=>1530494377', 1530494377, 1530494377),
	(48, 1, 'category/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} common\\models\\Category [ {{%category}} ]  {{%UPDATED%}} {{%ID%}} 2 {{%RECORD%}}: <br>别名(alias) : it=>ITSERVICE,<br>最后更新(updated_at) : 1530494355=>1530494505', 1530494505, 1530494505),
	(49, 1, 'article/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} common\\models\\meta\\ArticleMetaTag [ {{%article_meta}} ]  {{%CREATED%}} {{%ID%}} 51 {{%RECORD%}}: <br>序号(id) => 51,<br>Aid(aid) => 22,<br>Key(key) => tag,<br>值(value) => 网络通信,<br>创建时间(created_at) => 1530494523', 1530494523, 1530494523),
	(50, 1, 'article/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%UPDATED%}} {{%ID%}} 22 {{%RECORD%}}: <br>最后更新(updated_at) : 1530494256=>1530494523', 1530494523, 1530494523),
	(51, 1, 'page/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\ArticleContent [ {{%article_content}} ]  {{%CREATED%}} {{%ID%}} 30 {{%RECORD%}}: <br>序号(id) => 30,<br>Aid(aid) => 30,<br>正文内容(content) => <pre class="brush:html;toolbar:false">&lt;div&nbsp;class=&quot;pay&quot;&gt;\r\n&lt;div&nbsp;class=&quot;tr_rechli&nbsp;am-form-group&quot;&gt;\r\n&lt;ul&nbsp;class=&quot;ui-choose&nbsp;am-form-group&quot;&nbsp;id=&quot;uc_01&quot;&gt;\r\n&lt;li&gt;\r\n&lt;label&nbsp;class=&quot;am-radio-inline&quot;&gt;\r\n&lt;input&nbsp;type=&quot;radio&quot;&nbsp;&nbsp;value=&quot;&quot;&nbsp;name=&quot;docVlGender&quot;&nbsp;required&nbsp;data-validation-message=&quot;请选择一项充值额度&quot;&gt;&nbsp;10￥\r\n&lt;/label&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;label&nbsp;class=&quot;am-radio-inline&quot;&gt;\r\n&lt;input&nbsp;type=&quot;radio&quot;&nbsp;name=&quot;docVlGender&quot;&nbsp;data-validation-message=&quot;请选择一项充值额度&quot;&gt;&nbsp;20￥\r\n&lt;/label&gt;\r\n&lt;/li&gt;\r\n\r\n&lt;li&gt;\r\n&lt;label&nbsp;class=&quot;am-radio-inline&quot;&gt;\r\n&lt;input&nbsp;type=&quot;radio&quot;&nbsp;name=&quot;docVlGender&quot;&nbsp;data-validation-message=&quot;请选择一项充值额度&quot;&gt;&nbsp;50￥\r\n&lt;/label&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;label&nbsp;class=&quot;am-radio-inline&quot;&gt;\r\n&lt;input&nbsp;type=&quot;radio&quot;&nbsp;name=&quot;docVlGender&quot;&nbsp;data-validation-message=&quot;请选择一项充值额度&quot;&gt;&nbsp;其他金额\r\n&lt;/label&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;!--&lt;span&gt;1招兵=1元&nbsp;10元起充&lt;/span&gt;--&gt;\r\n&lt;/div&gt;\r\n&lt;div&nbsp;class=&quot;tr_rechoth&nbsp;am-form-group&quot;&gt;\r\n&lt;span&gt;其他金额：&lt;/span&gt;\r\n&lt;input&nbsp;type=&quot;number&quot;&nbsp;min=&quot;10&quot;&nbsp;max=&quot;10000&quot;&nbsp;value=&quot;10.00元&quot;&nbsp;class=&quot;othbox&quot;&nbsp;data-validation-message=&quot;充值金额范围：10-10000元&quot;&nbsp;/&gt;\r\n&lt;!--&lt;p&gt;充值金额范围：10-10000元&lt;/p&gt;--&gt;\r\n&lt;/div&gt;\r\n&lt;div&nbsp;class=&quot;tr_rechcho&nbsp;am-form-group&quot;&gt;\r\n&lt;span&gt;充值方式：&lt;/span&gt;\r\n&lt;label&nbsp;class=&quot;am-radio&quot;&gt;\r\n&lt;input&nbsp;type=&quot;radio&quot;&nbsp;name=&quot;radio1&quot;&nbsp;value=&quot;&quot;&nbsp;data-am-ucheck&nbsp;required&nbsp;data-validation-message=&quot;请选择一种充值方式&quot;&gt;&lt;img&nbsp;src=&quot;images/wechatpay.png&quot;&gt;\r\n&lt;/label&gt;\r\n&lt;label&nbsp;class=&quot;am-radio&quot;&nbsp;style=&quot;margin-right:30px;&quot;&gt;\r\n&lt;input&nbsp;type=&quot;radio&quot;&nbsp;name=&quot;radio1&quot;&nbsp;value=&quot;&quot;&nbsp;data-am-ucheck&nbsp;data-validation-message=&quot;请选择一种充值方式&quot;&gt;&lt;img&nbsp;src=&quot;images/zfbpay.png&quot;&gt;\r\n&lt;/label&gt;\r\n&lt;/div&gt;\r\n&lt;div&nbsp;class=&quot;tr_rechnum&quot;&gt;\r\n&lt;span&gt;应付金额：&lt;/span&gt;\r\n&lt;p&nbsp;class=&quot;rechnum&quot;&gt;0.00元&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div&nbsp;class=&quot;tr_paybox&quot;&gt;\r\n&lt;input&nbsp;type=&quot;submit&quot;&nbsp;value=&quot;确认支付&quot;&nbsp;class=&quot;tr_pay&nbsp;am-btn&quot;&nbsp;/&gt;\r\n&lt;/div&gt;\r\n&lt;/form&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;</pre><p><br/></p>', 1530495049, 1530495049),
	(52, 1, 'page/create', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%CREATED%}} {{%ID%}} 30 {{%RECORD%}}: <br>序号(id) => 30,<br>分类ID(cid) => ,<br>类型(type) => 2,<br>标题(title) => 充值,<br>副标题(sub_title) => pay,<br>概述(summary) => ,<br>缩略图(thumb) => ,<br>seo标题(seo_title) => ,<br>seo关键字(seo_keywords) => ,<br>seo描述(seo_description) => ,<br>状态(status) => 1,<br>排序(sort) => 0,<br>作者ID(author_id) => 1,<br>作者(author_name) => admin,<br>浏览次数(scan_count) => ,<br>评论次数(comment_count) => ,<br>评论(can_comment) => 0,<br>可见(visibility) => 4,<br>密码(password) => ,<br>头条(flag_headline) => ,<br>推荐(flag_recommend) => ,<br>幻灯(flag_slide_show) => ,<br>特别推荐(flag_special_recommend) => ,<br>滚动(flag_roll) => ,<br>加粗(flag_bold) => ,<br>图片(flag_picture) => ,<br>创建时间(created_at) => 1530495049,<br>最后更新(updated_at) => 1530495049', 1530495049, 1530495049),
	(53, 1, 'page/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%UPDATED%}} {{%ID%}} 28 {{%RECORD%}}: <br>副标题(sub_title) : pay=>shoufei,<br>最后更新(updated_at) : 1530459158=>1530495160', 1530495160, 1530495160),
	(54, 1, 'page/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%UPDATED%}} {{%ID%}} 30 {{%RECORD%}}: <br>最后更新(updated_at) : 1530495049=>1530495336', 1530495336, 1530495336),
	(55, 1, 'page/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%UPDATED%}} {{%ID%}} 30 {{%RECORD%}}: <br>最后更新(updated_at) : 1530495336=>1530495426', 1530495426, 1530495426),
	(56, 1, 'page/delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\ArticleContent [ {{%article_content}} ]  {{%DELETED%}} {{%ID%}} 30 {{%RECORD%}}: <br>序号(id) => 30,<br>Aid(aid) => 30,<br>正文内容(content) => <pre class="brush:html;toolbar:false">&lt;div&nbsp;class=&quot;pay&quot;&gt;\r\n&lt;div&nbsp;class=&quot;tr_rechli&nbsp;am-form-group&quot;&gt;\r\n&lt;ul&nbsp;class=&quot;ui-choose&nbsp;am-form-group&quot;&nbsp;id=&quot;uc_01&quot;&gt;\r\n&lt;li&gt;\r\n&lt;label&nbsp;class=&quot;am-radio-inline&quot;&gt;\r\n&lt;input&nbsp;type=&quot;radio&quot;&nbsp;&nbsp;value=&quot;&quot;&nbsp;name=&quot;docVlGender&quot;&nbsp;required&nbsp;data-validation-message=&quot;请选择一项充值额度&quot;&gt;&nbsp;10￥\r\n&lt;/label&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;label&nbsp;class=&quot;am-radio-inline&quot;&gt;\r\n&lt;input&nbsp;type=&quot;radio&quot;&nbsp;name=&quot;docVlGender&quot;&nbsp;data-validation-message=&quot;请选择一项充值额度&quot;&gt;&nbsp;20￥\r\n&lt;/label&gt;\r\n&lt;/li&gt;\r\n\r\n&lt;li&gt;\r\n&lt;label&nbsp;class=&quot;am-radio-inline&quot;&gt;\r\n&lt;input&nbsp;type=&quot;radio&quot;&nbsp;name=&quot;docVlGender&quot;&nbsp;data-validation-message=&quot;请选择一项充值额度&quot;&gt;&nbsp;50￥\r\n&lt;/label&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;label&nbsp;class=&quot;am-radio-inline&quot;&gt;\r\n&lt;input&nbsp;type=&quot;radio&quot;&nbsp;name=&quot;docVlGender&quot;&nbsp;data-validation-message=&quot;请选择一项充值额度&quot;&gt;&nbsp;其他金额\r\n&lt;/label&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;!--&lt;span&gt;1招兵=1元&nbsp;10元起充&lt;/span&gt;--&gt;\r\n&lt;/div&gt;\r\n&lt;div&nbsp;class=&quot;tr_rechoth&nbsp;am-form-group&quot;&gt;\r\n&lt;span&gt;其他金额：&lt;/span&gt;\r\n&lt;input&nbsp;type=&quot;number&quot;&nbsp;min=&quot;10&quot;&nbsp;max=&quot;10000&quot;&nbsp;value=&quot;10.00元&quot;&nbsp;class=&quot;othbox&quot;&nbsp;data-validation-message=&quot;充值金额范围：10-10000元&quot;&nbsp;/&gt;\r\n&lt;!--&lt;p&gt;充值金额范围：10-10000元&lt;/p&gt;--&gt;\r\n&lt;/div&gt;\r\n&lt;div&nbsp;class=&quot;tr_rechcho&nbsp;am-form-group&quot;&gt;\r\n&lt;span&gt;充值方式：&lt;/span&gt;\r\n&lt;label&nbsp;class=&quot;am-radio&quot;&gt;\r\n&lt;input&nbsp;type=&quot;radio&quot;&nbsp;name=&quot;radio1&quot;&nbsp;value=&quot;&quot;&nbsp;data-am-ucheck&nbsp;required&nbsp;data-validation-message=&quot;请选择一种充值方式&quot;&gt;&lt;img&nbsp;src=&quot;images/wechatpay.png&quot;&gt;\r\n&lt;/label&gt;\r\n&lt;label&nbsp;class=&quot;am-radio&quot;&nbsp;style=&quot;margin-right:30px;&quot;&gt;\r\n&lt;input&nbsp;type=&quot;radio&quot;&nbsp;name=&quot;radio1&quot;&nbsp;value=&quot;&quot;&nbsp;data-am-ucheck&nbsp;data-validation-message=&quot;请选择一种充值方式&quot;&gt;&lt;img&nbsp;src=&quot;images/zfbpay.png&quot;&gt;\r\n&lt;/label&gt;\r\n&lt;/div&gt;\r\n&lt;div&nbsp;class=&quot;tr_rechnum&quot;&gt;\r\n&lt;span&gt;应付金额：&lt;/span&gt;\r\n&lt;p&nbsp;class=&quot;rechnum&quot;&gt;0.00元&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div&nbsp;class=&quot;tr_paybox&quot;&gt;\r\n&lt;input&nbsp;type=&quot;submit&quot;&nbsp;value=&quot;确认支付&quot;&nbsp;class=&quot;tr_pay&nbsp;am-btn&quot;&nbsp;/&gt;\r\n&lt;/div&gt;\r\n&lt;/form&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;</pre><p><br/></p>', 1530495726, 1530495726),
	(57, 1, 'page/delete', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%DELETED%}} {{%ID%}} 30 {{%RECORD%}}: <br>序号(id) => 30,<br>分类ID(cid) => 0,<br>类型(type) => 2,<br>标题(title) => 充值,<br>副标题(sub_title) => pay,<br>概述(summary) => ,<br>缩略图(thumb) => ,<br>seo标题(seo_title) => ,<br>seo关键字(seo_keywords) => ,<br>seo描述(seo_description) => ,<br>状态(status) => 1,<br>排序(sort) => 0,<br>作者ID(author_id) => 1,<br>作者(author_name) => admin,<br>浏览次数(scan_count) => 0,<br>评论次数(comment_count) => 0,<br>评论(can_comment) => 0,<br>可见(visibility) => 4,<br>密码(password) => ,<br>头条(flag_headline) => 0,<br>推荐(flag_recommend) => 0,<br>幻灯(flag_slide_show) => 0,<br>特别推荐(flag_special_recommend) => 0,<br>滚动(flag_roll) => 0,<br>加粗(flag_bold) => 0,<br>图片(flag_picture) => 0,<br>创建时间(created_at) => 1530495049,<br>最后更新(updated_at) => 1530495426', 1530495726, 1530495726),
	(58, 1, 'article/update', '{{%ADMIN_USER%}} [ admin ] {{%BY%}} backend\\models\\Article [ {{%article}} ]  {{%UPDATED%}} {{%ID%}} 22 {{%RECORD%}}: <br>可见(visibility) : 4=>1,<br>最后更新(updated_at) : 1530494523=>1530498310', 1530498310, 1530498310);
/*!40000 ALTER TABLE `admin_log` ENABLE KEYS */;

-- 导出  表 mycms.admin_user 结构
CREATE TABLE IF NOT EXISTS `admin_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增管理员用户id',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '管理员用户名',
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '管理员cookie验证auth_key',
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '管理员加密密码',
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '管理员找回密码token',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '管理员邮箱',
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '管理员头像url',
  `status` smallint(6) NOT NULL DEFAULT '10' COMMENT '管理员状态,10正常',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL DEFAULT '0' COMMENT '最后修改时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  mycms.admin_user 的数据：~1 rows (大约)
DELETE FROM `admin_user`;
/*!40000 ALTER TABLE `admin_user` DISABLE KEYS */;
INSERT INTO `admin_user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `avatar`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'zr9mY7lt23oAhj_ZYjydbLJKcbE3FJ19', '$2y$13$8aF72c/7Nqq/atyMivhVTej0bIXS1t8daPJXKtVjFzJUsG68eGgaG', NULL, 'admin@feehi.com', '', 10, 1468288038, 1476711945);
/*!40000 ALTER TABLE `admin_user` ENABLE KEYS */;

-- 导出  表 mycms.article 结构
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章自增id',
  `cid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '文章分类id',
  `type` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '类型.0文章,1单页',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '文章标题',
  `sub_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '用户名',
  `summary` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '文章概要',
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '缩略图',
  `seo_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'seo标题',
  `seo_keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'seo关键字',
  `seo_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'seo描述',
  `status` smallint(6) unsigned NOT NULL DEFAULT '1' COMMENT '状态.0草稿,1发布',
  `sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `author_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '发布文章管理员id',
  `author_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '发布文章管理员用户名',
  `scan_count` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `comment_count` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `can_comment` smallint(6) unsigned NOT NULL DEFAULT '1' COMMENT '是否可评论.0否,1是',
  `visibility` smallint(6) unsigned NOT NULL DEFAULT '1' COMMENT '文章可见性.1.公开,2.评论可见,3.加密文章,4.登陆可见',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '文章明文密码',
  `flag_headline` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '头条.0否,1.是',
  `flag_recommend` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '推荐.0否,1.是',
  `flag_slide_show` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '幻灯.0否,1.是',
  `flag_special_recommend` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '特别推荐.0否,1.是',
  `flag_roll` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '滚动.0否,1.是',
  `flag_bold` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '加粗.0否,1.是',
  `flag_picture` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '图片.0否,1.是',
  `created_at` int(11) unsigned NOT NULL COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最后修改时间',
  PRIMARY KEY (`id`),
  KEY `index_title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  mycms.article 的数据：~7 rows (大约)
DELETE FROM `article`;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` (`id`, `cid`, `type`, `title`, `sub_title`, `summary`, `thumb`, `seo_title`, `seo_keywords`, `seo_description`, `status`, `sort`, `author_id`, `author_name`, `scan_count`, `comment_count`, `can_comment`, `visibility`, `password`, `flag_headline`, `flag_recommend`, `flag_slide_show`, `flag_special_recommend`, `flag_roll`, `flag_bold`, `flag_picture`, `created_at`, `updated_at`) VALUES
	(22, 2, 0, '中国中间软件行业现状研究分析及市场前景', 'ss', '在尽可能短的篇幅里，中国中间软件行业现状研究分析及市场前景，适合所有其实还不那么自信的人阅读。', '/uploads/article/thumb/20180702001534_5b38fe264b499.png', '', '', '', 1, 0, 1, 'admin', 15, 2, 1, 1, '', 0, 0, 0, 1, 0, 0, 0, 1468300964, 1530498310),
	(23, 0, 2, '关于我们', 'about', '', '', '', '', '', 1, 6, 1, 'admin', 0, 0, 1, 1, '', 0, 0, 0, 0, 0, 0, 0, 1468309252, 1530461044),
	(24, 0, 2, '联系我们', 'contact', '', '', '', '', '', 1, 5, 1, 'admin', 0, 0, 1, 1, '', 0, 0, 0, 0, 0, 0, 0, 1468309318, 1530461108),
	(26, 0, 2, '研究报告', 'report', '', '', '', '', '', 1, 1, 1, 'admin', 0, 0, 1, 1, '', 0, 0, 0, 0, 0, 0, 0, 1530458928, 1530459156),
	(27, 0, 2, '订购流程', 'order', '', '', '', '', '', 1, 2, 1, 'admin', 0, 0, 1, 1, '', 0, 0, 0, 0, 0, 0, 0, 1530458966, 1530459157),
	(28, 0, 2, '收费标准', 'shoufei', '', '', '', '', '', 1, 3, 1, 'admin', 0, 0, 1, 1, '', 0, 0, 0, 0, 0, 0, 0, 1530458981, 1530495160),
	(29, 0, 2, '会员中心', 'member', '', '', '', '', '', 1, 4, 1, 'admin', 0, 0, 1, 1, '', 0, 0, 0, 0, 0, 0, 0, 1530459070, 1530459160);
/*!40000 ALTER TABLE `article` ENABLE KEYS */;

-- 导出  表 mycms.article_content 结构
CREATE TABLE IF NOT EXISTS `article_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `aid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '文章id',
  `content` text COLLATE utf8_unicode_ci NOT NULL COMMENT '文章详细内容',
  PRIMARY KEY (`id`),
  KEY `fk_aid` (`aid`),
  CONSTRAINT `fk_aid` FOREIGN KEY (`aid`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  mycms.article_content 的数据：~7 rows (大约)
DELETE FROM `article_content`;
/*!40000 ALTER TABLE `article_content` DISABLE KEYS */;
INSERT INTO `article_content` (`id`, `aid`, `content`) VALUES
	(22, 22, '<p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">不断更新中，请尽量访问<a href="http://calvin1978.blogcn.com/articles/collection.html" class="external" rel="nofollow" target="_blank" style="border: 0px; margin: 0px; padding: 0px; text-decoration: none; color: rgb(0, 153, 204);">博客原文</a>。</p><h3 style="border: 0px; margin: -8px 0px 20px; padding: 0px; font-size: 20px; font-weight: normal; font-stretch: normal; line-height: 30px; font-family: &quot;Microsoft YaHei&quot;, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">List</h3><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);"><strong style="border: 0px; margin: 0px; padding: 0px;">ArrayList</strong></p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">以数组实现。节约空间，但数组有容量限制。超出限制时会增加50%容量，用System.arraycopy()复制到新的数组，因此最好能给出数组大小的预估值。默认第一次插入元素时创建大小为10的数组。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">按数组下标访问元素–get(i)/set(i,e) 的性能很高，这是数组的基本优势。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">直接在数组末尾加入元素–add(e)的性能也高，但如果按下标插入、删除元素–add(i,e), remove(i), remove(e)，则要用System.arraycopy()来移动部分受影响的元素，性能就变差了，这是基本劣势。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);"><strong style="border: 0px; margin: 0px; padding: 0px;">LinkedList</strong></p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">以双向链表实现。链表无容量限制，但双向链表本身使用了更多空间，也需要额外的链表指针操作。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">按下标访问元素–get(i)/set(i,e) 要悲剧的遍历链表将指针移动到位(如果i&gt;数组大小的一半，会从末尾移起)。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">插入、删除元素时修改前后节点的指针即可，但还是要遍历部分链表的指针才能移动到下标所指的位置，只有在链表两头的操作–add(), addFirst(),removeLast()或用iterator()上的remove()能省掉指针的移动。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);"><strong style="border: 0px; margin: 0px; padding: 0px;">CopyOnWriteArrayList</strong></p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">并发优化的ArrayList。用CopyOnWrite策略，在修改时先复制一个快照来修改，改完再让内部指针指向新数组。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">因为对快照的修改对读操作来说不可见，所以只有写锁没有读锁，加上复制的昂贵成本，典型的适合读多写少的场景。如果更新频率较高，或数组较大时，还是Collections.synchronizedList(list)，对所有操作用同一把锁来保证线程安全更好。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">增加了addIfAbsent(e)方法，会遍历数组来检查元素是否已存在，性能可想像的不会太好。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);"><strong style="border: 0px; margin: 0px; padding: 0px;">补充</strong></p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">无论哪种实现，按值返回下标–contains(e), indexOf(e), remove(e) 都需遍历所有元素进行比较，性能可想像的不会太好。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">没有按元素值排序的SortedList，在线程安全类中也没有无锁算法的ConcurrentLinkedList，凑合着用Set与Queue中的等价类时，会缺少一些List特有的方法。</p><h3 style="border: 0px; margin: -8px 0px 20px; padding: 0px; font-size: 20px; font-weight: normal; font-stretch: normal; line-height: 30px; font-family: &quot;Microsoft YaHei&quot;, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">Map</h3><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);"><strong style="border: 0px; margin: 0px; padding: 0px;">HashMap</strong></p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">以Entry[]数组实现的哈希桶数组，用Key的哈希值取模桶数组的大小可得到数组下标。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">插入元素时，如果两条Key落在同一个桶(比如哈希值1和17取模16后都属于第一个哈希桶)，Entry用一个next属性实现多个Entry以单向链表存放，后入桶的Entry将next指向桶当前的Entry。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">查找哈希值为17的key时，先定位到第一个哈希桶，然后以链表遍历桶里所有元素，逐个比较其key值。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">当Entry数量达到桶数量的75%时(很多文章说使用的桶数量达到了75%，但看代码不是)，会成倍扩容桶数组，并重新分配所有原来的Entry，所以这里也最好有个预估值。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">取模用位运算(hash &amp; (arrayLength-1))会比较快，所以数组的大小永远是2的N次方， 你随便给一个初始值比如17会转为32。默认第一次放入元素时的初始值是16。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">iterator()时顺着哈希桶数组来遍历，看起来是个乱序。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">在JDK8里，新增默认为8的閥值，当一个桶里的Entry超过閥值，就不以单向链表而以红黑树来存放以加快Key的查找速度。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);"><strong style="border: 0px; margin: 0px; padding: 0px;">LinkedHashMap</strong></p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">扩展HashMap增加双向链表的实现，号称是最占内存的数据结构。支持iterator()时按Entry的插入顺序来排序(但是更新不算， 如果设置accessOrder属性为true，则所有读写访问都算)。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">实现上是在Entry上再增加属性before/after指针，插入时把自己加到Header Entry的前面去。如果所有读写访问都要排序，还要把前后Entry的before/after拼接起来以在链表中删除掉自己。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);"><strong style="border: 0px; margin: 0px; padding: 0px;">TreeMap</strong></p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">以红黑树实现，篇幅所限详见<a href="https://github.com/julycoding/The-Art-Of-Programming-By-July/blob/master/ebook/zh/03.01.md" class="external" rel="nofollow" target="_blank" style="border: 0px; margin: 0px; padding: 0px; text-decoration: none; color: rgb(0, 153, 204);">入门教程</a>。支持iterator()时按Key值排序，可按实现了Comparable接口的Key的升序排序，或由传入的Comparator控制。可想象的，在树上插入/删除元素的代价一定比HashMap的大。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">支持SortedMap接口，如firstKey()，lastKey()取得最大最小的key，或sub(fromKey, toKey), tailMap(fromKey)剪取Map的某一段。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);"><strong style="border: 0px; margin: 0px; padding: 0px;">ConcurrentHashMap</strong></p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">并发优化的HashMap，默认16把写锁(可以设置更多)，有效分散了阻塞的概率，而且没有读锁。<br/>数据结构为Segment[]，Segment里面才是哈希桶数组，每个Segment一把锁。Key先算出它在哪个Segment里，再算出它在哪个哈希桶里。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">支持ConcurrentMap接口，如putIfAbsent(key，value)与相反的replace(key，value)与以及实现CAS的replace(key, oldValue, newValue)。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">没有读锁是因为put/remove动作是个原子动作(比如put是一个对数组元素/Entry 指针的赋值操作)，读操作不会看到一个更新动作的中间状态。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);"><strong style="border: 0px; margin: 0px; padding: 0px;">ConcurrentSkipListMap</strong></p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">JDK6新增的并发优化的SortedMap，以SkipList实现。SkipList是红黑树的一种简化替代方案，是个流行的有序集合算法，篇幅所限见<a href="http://blog.sina.com.cn/s/blog_72995dcc01017w1t.html" target="_blank" class="external" rel="nofollow" style="border: 0px; margin: 0px; padding: 0px; text-decoration: none; color: rgb(0, 153, 204);">入门教程</a>。Concurrent包选用它是因为它支持基于CAS的无锁算法，而红黑树则没有好的无锁算法。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">很特殊的，它的size()不能随便调，会遍历来统计。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);"><strong style="border: 0px; margin: 0px; padding: 0px;">补充</strong></p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">关于null，HashMap和LinkedHashMap是随意的，TreeMap没有设置Comparator时key不能为null；ConcurrentHashMap在JDK7里value不能为null(这是为什么呢？)，JDK8里key与value都不能为null；ConcurrentSkipListMap是所有JDK里key与value都不能为null。</p><h3 style="border: 0px; margin: -8px 0px 20px; padding: 0px; font-size: 20px; font-weight: normal; font-stretch: normal; line-height: 30px; font-family: &quot;Microsoft YaHei&quot;, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">Set</h3><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">Set几乎都是内部用一个Map来实现, 因为Map里的KeySet就是一个Set，而value是假值，全部使用同一个Object。Set的特征也继承了那些内部Map实现的特征。</p><ul style="border: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; list-style-position: inside; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);" class=" list-paddingleft-2"><li><p><strong style="border: 0px; margin: 0px; padding: 0px;">HashSet</strong>：内部是HashMap。</p></li><li><p><strong style="border: 0px; margin: 0px; padding: 0px;">LinkedHashSet</strong>：内部是LinkedHashMap。</p></li><li><p><strong style="border: 0px; margin: 0px; padding: 0px;">TreeSet</strong>：内部是TreeMap的SortedSet。</p></li><li><p><strong style="border: 0px; margin: 0px; padding: 0px;">ConcurrentSkipListSet</strong>：内部是ConcurrentSkipListMap的并发优化的SortedSet。</p></li><li><p><strong style="border: 0px; margin: 0px; padding: 0px;">CopyOnWriteArraySet</strong>：内部是CopyOnWriteArrayList的并发优化的Set，利用其addIfAbsent()方法实现元素去重，如前所述该方法的性能很一般。</p></li></ul><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);"><strong style="border: 0px; margin: 0px; padding: 0px;">补充</strong>：好像少了个ConcurrentHashSet，本来也该有一个内部用ConcurrentHashMap的简单实现，但JDK偏偏没提供。Jetty就自己封了一个，Guava则直接用java.util.Collections.newSetFromMap(new ConcurrentHashMap()) 实现。</p><h3 style="border: 0px; margin: -8px 0px 20px; padding: 0px; font-size: 20px; font-weight: normal; font-stretch: normal; line-height: 30px; font-family: &quot;Microsoft YaHei&quot;, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">Queue</h3><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">Queue是在两端出入的List，所以也可以用数组或链表来实现。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);"><strong style="border: 0px; margin: 0px; padding: 0px;">–普通队列–</strong></p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);"><strong style="border: 0px; margin: 0px; padding: 0px;">LinkedList</strong></p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">是的，以双向链表实现的LinkedList既是List，也是Queue。它是唯一一个允许放入null的Queue。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);"><strong style="border: 0px; margin: 0px; padding: 0px;">ArrayDeque</strong></p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">以循环数组实现的双向Queue。大小是2的倍数，默认是16。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">普通数组只能快速在末尾添加元素，为了支持FIFO，从数组头快速取出元素，就需要使用循环数组：有队头队尾两个下标：弹出元素时，队头下标递增；加入元素时，如果已到数组空间的末尾，则将元素循环赋值到数组[0](如果此时队头下标大于0，说明队头弹出过元素，有空位)，同时队尾下标指向0，再插入下一个元素则赋值到数组[1]，队尾下标指向1。如果队尾的下标追上队头，说明数组所有空间已用完，进行双倍的数组扩容。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);"><strong style="border: 0px; margin: 0px; padding: 0px;">PriorityQueue</strong></p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">用二叉堆实现的优先级队列，详见<a href="http://blog.csdn.net/lcore/article/details/9100073" target="_blank" class="external" rel="nofollow" style="border: 0px; margin: 0px; padding: 0px; text-decoration: none; color: rgb(0, 153, 204);">入门教程</a>，不再是FIFO而是按元素实现的Comparable接口或传入Comparator的比较结果来出队，数值越小，优先级越高，越先出队。但是注意其iterator()的返回不会排序。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);"><strong style="border: 0px; margin: 0px; padding: 0px;">–线程安全的队列–</strong></p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);"><strong style="border: 0px; margin: 0px; padding: 0px;">ConcurrentLinkedQueue/ConcurrentLinkedDeque</strong></p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">无界的并发优化的Queue，基于链表，实现了依赖于CAS的无锁算法。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">ConcurrentLinkedQueue的结构是单向链表和head/tail两个指针，因为入队时需要修改队尾元素的next指针，以及修改tail指向新入队的元素两个CAS动作无法原子，所以需要的特殊的算法，篇幅所限见<a href="http://www.ibm.com/developerworks/cn/java/j-jtp04186/" target="_blank" class="external" rel="nofollow" style="border: 0px; margin: 0px; padding: 0px; text-decoration: none; color: rgb(0, 153, 204);">入门教程</a>。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);"><strong style="border: 0px; margin: 0px; padding: 0px;">PriorityBlockingQueue</strong></p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">无界的并发优化的PriorityQueue，也是基于二叉堆。使用一把公共的读写锁。虽然实现了BlockingQueue接口，其实没有任何阻塞队列的特征，空间不够时会自动扩容。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);"><strong style="border: 0px; margin: 0px; padding: 0px;">DelayQueue</strong></p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">内部包含一个PriorityQueue，同样是无界的。元素需实现Delayed接口，每次调用时需返回当前离触发时间还有多久，小于0表示该触发了。<br/>pull()时会用peek()查看队头的元素，检查是否到达触发时间。ScheduledThreadPoolExecutor用了类似的结构。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);"><strong style="border: 0px; margin: 0px; padding: 0px;">–线程安全的阻塞队列–</strong></p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">BlockingQueue的队列长度受限，用以保证生产者与消费者的速度不会相差太远，避免内存耗尽。队列长度设定后不可改变。当入队时队列已满，或出队时队列已空，不同函数的效果见下表：</p><table width="609" style="width: 460px;"><tbody style="border: 0px; margin: 0px; padding: 0px;"><tr style="border-width: 0px 0px 1px; border-bottom-style: solid; border-bottom-color: rgb(232, 232, 232); margin: 0px; padding: 0px;" class="firstRow"><td style="border: 0px; margin: 0px; padding-right: 5px; padding-left: 5px; vertical-align: middle; text-align: center;"><br/></td><td style="border: 0px; margin: 0px; padding-right: 5px; padding-left: 5px; vertical-align: middle; text-align: center;">可能报异常</td><td style="border: 0px; margin: 0px; padding-right: 5px; padding-left: 5px; vertical-align: middle; text-align: center;">返回布尔值</td><td style="border: 0px; margin: 0px; padding-right: 5px; padding-left: 5px; vertical-align: middle; text-align: center;">可能阻塞等待</td><td style="border: 0px; margin: 0px; padding-right: 5px; padding-left: 5px; vertical-align: middle; text-align: center;">可设定等待时间</td></tr><tr style="border-width: 0px 0px 1px; border-bottom-style: solid; border-bottom-color: rgb(232, 232, 232); margin: 0px; padding: 0px;"><td style="border: 0px; margin: 0px; padding-right: 5px; padding-left: 5px; vertical-align: middle; text-align: center;">入队</td><td style="border: 0px; margin: 0px; padding-right: 5px; padding-left: 5px; vertical-align: middle; text-align: center;">add(e)</td><td style="border: 0px; margin: 0px; padding-right: 5px; padding-left: 5px; vertical-align: middle; text-align: center;">offer(e)</td><td style="border: 0px; margin: 0px; padding-right: 5px; padding-left: 5px; vertical-align: middle; text-align: center;">put(e)</td><td style="border: 0px; margin: 0px; padding-right: 5px; padding-left: 5px; vertical-align: middle; text-align: center;">offer(e, timeout, unit)</td></tr><tr style="border-width: 0px 0px 1px; border-bottom-style: solid; border-bottom-color: rgb(232, 232, 232); margin: 0px; padding: 0px;"><td style="border: 0px; margin: 0px; padding-right: 5px; padding-left: 5px; vertical-align: middle; text-align: center;">出队</td><td style="border: 0px; margin: 0px; padding-right: 5px; padding-left: 5px; vertical-align: middle; text-align: center;">remove()</td><td style="border: 0px; margin: 0px; padding-right: 5px; padding-left: 5px; vertical-align: middle; text-align: center;">poll()</td><td style="border: 0px; margin: 0px; padding-right: 5px; padding-left: 5px; vertical-align: middle; text-align: center;">take()</td><td style="border: 0px; margin: 0px; padding-right: 5px; padding-left: 5px; vertical-align: middle; text-align: center;">poll(timeout, unit)</td></tr><tr style="border-width: 0px 0px 1px; border-bottom-style: solid; border-bottom-color: rgb(232, 232, 232); margin: 0px; padding: 0px;"><td style="border: 0px; margin: 0px; padding-right: 5px; padding-left: 5px; vertical-align: middle; text-align: center;">查看</td><td style="border: 0px; margin: 0px; padding-right: 5px; padding-left: 5px; vertical-align: middle; text-align: center;">element()</td><td style="border: 0px; margin: 0px; padding-right: 5px; padding-left: 5px; vertical-align: middle; text-align: center;">peek()</td><td style="border: 0px; margin: 0px; padding-right: 5px; padding-left: 5px; vertical-align: middle; text-align: center;">无</td><td style="border: 0px; margin: 0px; padding-right: 5px; padding-left: 5px; vertical-align: middle; text-align: center;">无</td></tr></tbody></table><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);"><strong style="border: 0px; margin: 0px; padding: 0px;">ArrayBlockingQueue</strong></p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">定长的并发优化的BlockingQueue，基于循环数组实现。有一把公共的读写锁与notFull、notEmpty两个Condition管理队列满或空时的阻塞状态。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);"><strong style="border: 0px; margin: 0px; padding: 0px;">LinkedBlockingQueue/LinkedBlockingDeque</strong></p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">可选定长的并发优化的BlockingQueue，基于链表实现，所以可以把长度设为Integer.MAX_VALUE。利用链表的特征，分离了takeLock与putLock两把锁，继续用notEmpty、notFull管理队列满或空时的阻塞状态。</p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);"><strong style="border: 0px; margin: 0px; padding: 0px;">补充</strong></p><p style="border: 0px; margin-top: 0px; margin-bottom: 20px; padding: 0px; font-size: 14px; font-family: &quot;Microsoft YaHei&quot;, 宋体, &quot;Myriad Pro&quot;, Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);">JDK7有个<a href="http://ifeve.com/java-transfer-queue/" target="_blank" class="external" rel="nofollow" style="border: 0px; margin: 0px; padding: 0px; text-decoration: none; color: rgb(0, 153, 204);">LinkedTransferQueue</a>，transfer(e)方法保证Producer放入的元素，被Consumer取走了再返回，比SynchronousQueue更好，有空要学习下。</p><p><br/></p>'),
	(23, 23, '<p>服务热线：010-85251051</p>'),
	(24, 24, '<p>服务热线：010-85251051</p>'),
	(26, 26, '<p>服务热线：010-85251051</p>'),
	(27, 27, '<p>服务热线：010-85251051</p>'),
	(28, 28, '<p>服务热线：010-85251051</p>'),
	(29, 29, '<p>服务热线：010-85251051</p>');
/*!40000 ALTER TABLE `article_content` ENABLE KEYS */;

-- 导出  表 mycms.article_meta 结构
CREATE TABLE IF NOT EXISTS `article_meta` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `aid` int(11) unsigned NOT NULL COMMENT '文章id',
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'tag名',
  `value` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'tag值',
  `created_at` int(11) unsigned NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `index_aid` (`aid`),
  KEY `index_key` (`key`),
  CONSTRAINT `fk_article_meta_aid` FOREIGN KEY (`aid`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  mycms.article_meta 的数据：~2 rows (大约)
DELETE FROM `article_meta`;
/*!40000 ALTER TABLE `article_meta` DISABLE KEYS */;
INSERT INTO `article_meta` (`id`, `aid`, `key`, `value`, `created_at`) VALUES
	(50, 22, 'tag', 'IT与服务', 1530494256),
	(51, 22, 'tag', '网络通信', 1530494523);
/*!40000 ALTER TABLE `article_meta` ENABLE KEYS */;

-- 导出  表 mycms.auth_assignment 结构
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  mycms.auth_assignment 的数据：~0 rows (大约)
DELETE FROM `auth_assignment`;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;

-- 导出  表 mycms.auth_item 结构
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  mycms.auth_item 的数据：~118 rows (大约)
DELETE FROM `auth_item`;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/ad/create:GET', 2, '创建广告(查看)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22393131222C2263617465676F7279223A225C75356537665C7535343461227D223B, 1512383408, 1512722062),
	('/ad/create:POST', 2, '创建广告(确定)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22393132222C2263617465676F7279223A225C75356537665C7535343461227D223B, 1512383484, 1512722063),
	('/ad/delete:POST', 2, '删除广告', NULL, _binary 0x733A37353A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22393133222C2263617465676F7279223A225C75356537665C7535343461227D223B, 1512386749, 1512722063),
	('/ad/index:GET', 2, '广告列表', NULL, _binary 0x733A37353A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22393130222C2263617465676F7279223A225C75356537665C7535343461227D223B, 1512382866, 1512722062),
	('/ad/sort:POST', 2, '广告排序', NULL, _binary 0x733A37353A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22393136222C2263617465676F7279223A225C75356537665C7535343461227D223B, 1512399382, 1512722063),
	('/ad/update:GET', 2, '修改广告(查看)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22393134222C2263617465676F7279223A225C75356537665C7535343461227D223B, 1512386694, 1512722063),
	('/ad/update:POST', 2, '修改广告(确定)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22393135222C2263617465676F7279223A225C75356537665C7535343461227D223B, 1512386722, 1512722063),
	('/ad/view-layer:GET', 2, '广告详情', NULL, _binary 0x733A37353A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22393137222C2263617465676F7279223A225C75356537665C7535343461227D223B, 1519972316, 1519972316),
	('/admin-user/create:GET', 2, '创建后台用户(查看)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75373532385C7536323337222C22736F7274223A22333132222C2263617465676F7279223A225C75353430655C75353366305C75373532385C7536323337227D223B, 1505491145, 1505626626),
	('/admin-user/create:POST', 2, '创建后台用户(确定)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75373532385C7536323337222C22736F7274223A22333133222C2263617465676F7279223A225C75353430655C75353366305C75373532385C7536323337227D223B, 1505491177, 1505626626),
	('/admin-user/delete:POST', 2, '删除后台用户', NULL, _binary 0x733A37353A227B2267726F7570223A225C75373532385C7536323337222C22736F7274223A22333136222C2263617465676F7279223A225C75353430655C75353366305C75373532385C7536323337227D223B, 1505491283, 1505626626),
	('/admin-user/index:GET', 2, '后台用户列表', NULL, _binary 0x733A37353A227B2267726F7570223A225C75373532385C7536323337222C22736F7274223A22333130222C2263617465676F7279223A225C75353430655C75353366305C75373532385C7536323337227D223B, 1505491096, 1505626626),
	('/admin-user/update:GET', 2, '修改后台用户(查看)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75373532385C7536323337222C22736F7274223A22333134222C2263617465676F7279223A225C75353430655C75353366305C75373532385C7536323337227D223B, 1505491206, 1505626626),
	('/admin-user/update:POST', 2, '修改后台用户(确定)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75373532385C7536323337222C22736F7274223A22333135222C2263617465676F7279223A225C75353430655C75353366305C75373532385C7536323337227D223B, 1505491257, 1505626626),
	('/admin-user/view-layer:GET', 2, '后台用户详情', NULL, _binary 0x733A37353A227B2267726F7570223A225C75373532385C7536323337222C22736F7274223A22333137222C2263617465676F7279223A225C75353430655C75353366305C75373532385C7536323337227D223B, 1505491177, 1505626626),
	('/article/create:GET', 2, '创建文章(查看)', NULL, _binary 0x733A36333A227B2267726F7570223A225C75353138355C7535626239222C22736F7274223A22323031222C2263617465676F7279223A225C75363538375C7537616530227D223B, 1505486958, 1505626214),
	('/article/create:POST', 2, '创建文章(确定)', NULL, _binary 0x733A36333A227B2267726F7570223A225C75353138355C7535626239222C22736F7274223A22323032222C2263617465676F7279223A225C75363538375C7537616530227D223B, 1505486994, 1505626214),
	('/article/delete:POST', 2, '删除文章', NULL, _binary 0x733A36333A227B2267726F7570223A225C75353138355C7535626239222C22736F7274223A22323036222C2263617465676F7279223A225C75363538375C7537616530227D223B, 1505490012, 1505627558),
	('/article/index:GET', 2, '文章列表', NULL, _binary 0x733A36333A227B2267726F7570223A225C75353138355C7535626239222C22736F7274223A22323030222C2263617465676F7279223A225C75363538375C7537616530227D223B, 1505486821, 1505626214),
	('/article/sort:POST', 2, '文章排序', NULL, _binary 0x733A36333A227B2267726F7570223A225C75353138355C7535626239222C22736F7274223A22323035222C2263617465676F7279223A225C75363538375C7537616530227D223B, 1505627065, 1505627558),
	('/article/update:GET', 2, '修改文章(查看)', NULL, _binary 0x733A36333A227B2267726F7570223A225C75353138355C7535626239222C22736F7274223A22323033222C2263617465676F7279223A225C75363538375C7537616530227D223B, 1505487091, 1505626214),
	('/article/update:POST', 2, '修改文章(确定)', NULL, _binary 0x733A36333A227B2267726F7570223A225C75353138355C7535626239222C22736F7274223A22323034222C2263617465676F7279223A225C75363538375C7537616530227D223B, 1505487132, 1505626214),
	('/article/view-layer:GET', 2, '文章详情', NULL, _binary 0x733A36333A227B2267726F7570223A225C75353138355C7535626239222C22736F7274223A22323037222C2263617465676F7279223A225C75363538375C7537616530227D223B, 1505491177, 1505626626),
	('/banner/banner-create:GET', 2, '创建banner(查看)', NULL, _binary 0x733A36393A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383131222C2263617465676F7279223A2262616E6E6572227D223B, 1512391883, 1512400103),
	('/banner/banner-create:POST', 2, '创建banner(确定)', NULL, _binary 0x733A36393A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383132222C2263617465676F7279223A2262616E6E6572227D223B, 1512391917, 1512400103),
	('/banner/banner-delete:POST', 2, '删除banner', NULL, _binary 0x733A36393A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383136222C2263617465676F7279223A2262616E6E6572227D223B, 1512399348, 1512721982),
	('/banner/banner-sort:POST', 2, 'banner排序', NULL, _binary 0x733A36393A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383135222C2263617465676F7279223A2262616E6E6572227D223B, 1512399382, 1512400103),
	('/banner/banner-update:GET', 2, '修改banner(查看)', NULL, _binary 0x733A36393A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383133222C2263617465676F7279223A2262616E6E6572227D223B, 1512399264, 1512400103),
	('/banner/banner-update:POST', 2, '修改banner(确定)', NULL, _binary 0x733A36393A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383134222C2263617465676F7279223A2262616E6E6572227D223B, 1512399300, 1512400103),
	('/banner/banners:GET', 2, 'banner列表', NULL, _binary 0x733A36393A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383130222C2263617465676F7279223A2262616E6E6572227D223B, 1512391845, 1512400103),
	('/banner/create:GET', 2, '创建banner类型(查看)', NULL, _binary 0x733A38313A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383031222C2263617465676F7279223A2262616E6E65725C75376337625C7535373862227D223B, 1512383408, 1512400103),
	('/banner/create:POST', 2, '创建banner类型(确定)', NULL, _binary 0x733A38313A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383032222C2263617465676F7279223A2262616E6E65725C75376337625C7535373862227D223B, 1512383484, 1512400103),
	('/banner/delete:POST', 2, '删除banner类型', NULL, _binary 0x733A38313A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383033222C2263617465676F7279223A2262616E6E65725C75376337625C7535373862227D223B, 1512386749, 1512400103),
	('/banner/index:GET', 2, 'banner类型列表', NULL, _binary 0x733A38313A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383030222C2263617465676F7279223A2262616E6E65725C75376337625C7535373862227D223B, 1512382866, 1512400103),
	('/banner/sort:POST', 2, 'banner类型排序', NULL, _binary 0x733A38313A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383036222C2263617465676F7279223A2262616E6E65725C75376337625C7535373862227D223B, 1512399382, 1512721982),
	('/banner/update:GET', 2, '修改banner类型(查看)', NULL, _binary 0x733A38313A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383034222C2263617465676F7279223A2262616E6E65725C75376337625C7535373862227D223B, 1512386694, 1512400103),
	('/banner/update:POST', 2, '修改banner类型(确定)', NULL, _binary 0x733A38313A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383035222C2263617465676F7279223A2262616E6E65725C75376337625C7535373862227D223B, 1512386722, 1512400103),
	('/banner/view-layer:GET', 2, 'banner详情', NULL, _binary 0x733A36393A227B2267726F7570223A225C75386664305C75383432355C75376261315C7537343036222C22736F7274223A22383137222C2263617465676F7279223A2262616E6E6572227D223B, 1505491177, 1505626626),
	('/category/create:GET', 2, '创建分类(查看)', NULL, _binary 0x733A36333A227B2267726F7570223A225C75353138355C7535626239222C22736F7274223A22323131222C2263617465676F7279223A225C75353230365C7537633762227D223B, 1505489753, 1505626254),
	('/category/create:POST', 2, '创建分类(确定)', NULL, _binary 0x733A36333A227B2267726F7570223A225C75353138355C7535626239222C22736F7274223A22323132222C2263617465676F7279223A225C75353230365C7537633762227D223B, 1505489813, 1505626254),
	('/category/delete:POST', 2, '删除分类', NULL, _binary 0x733A36333A227B2267726F7570223A225C75353138355C7535626239222C22736F7274223A22323136222C2263617465676F7279223A225C75353230365C7537633762227D223B, 1505489938, 1505627558),
	('/category/index:GET', 2, '分类列表', NULL, _binary 0x733A36333A227B2267726F7570223A225C75353138355C7535626239222C22736F7274223A22323130222C2263617465676F7279223A225C75353230365C7537633762227D223B, 1505489718, 1505626254),
	('/category/sort:POST', 2, '分类排序', NULL, _binary 0x733A36333A227B2267726F7570223A225C75353138355C7535626239222C22736F7274223A22323135222C2263617465676F7279223A225C75353230365C7537633762227D223B, 1505627133, 1505627558),
	('/category/update:GET', 2, '修改分类(查看)', NULL, _binary 0x733A36333A227B2267726F7570223A225C75353138355C7535626239222C22736F7274223A22323133222C2263617465676F7279223A225C75353230365C7537633762227D223B, 1505489845, 1505626254),
	('/category/update:POST', 2, '修改分类(确定)', NULL, _binary 0x733A36333A227B2267726F7570223A225C75353138355C7535626239222C22736F7274223A22323134222C2263617465676F7279223A225C75353230365C7537633762227D223B, 1505489881, 1505626254),
	('/category/view-layer:GET', 2, '分类详情', NULL, _binary 0x733A36333A227B2267726F7570223A225C75353138355C7535626239222C22736F7274223A22323137222C2263617465676F7279223A225C75353230365C7537633762227D223B, 1505491177, 1505626626),
	('/clear/backend:GET', 2, '删除后台缓存', NULL, _binary 0x733A36333A227B2267726F7570223A225C75376631335C7535623538222C22736F7274223A22363031222C2263617465676F7279223A225C75376631335C7535623538227D223B, 1505491837, 1505626868),
	('/clear/frontend:GET', 2, '删除前台缓存', NULL, _binary 0x733A36333A227B2267726F7570223A225C75376631335C7535623538222C22736F7274223A22363030222C2263617465676F7279223A225C75376631335C7535623538227D223B, 1505491810, 1505626868),
	('/comment/index:GET', 2, '评论列表', NULL, _binary 0x733A36333A227B2267726F7570223A225C75353138355C7535626239222C22736F7274223A22323230222C2263617465676F7279223A225C75386263345C7538626261227D223B, 1505487310, 1505626296),
	('/comment/update:GET', 2, '修改评论(查看)', NULL, _binary 0x733A36333A227B2267726F7570223A225C75353138355C7535626239222C22736F7274223A22323231222C2263617465676F7279223A225C75386263345C7538626261227D223B, 1505488537, 1505626296),
	('/comment/update:POST', 2, '修改评论(确定)', NULL, _binary 0x733A36333A227B2267726F7570223A225C75353138355C7535626239222C22736F7274223A22323232222C2263617465676F7279223A225C75386263345C7538626261227D223B, 1505488570, 1505626296),
	('/comment/view-layer:GET', 2, '评论详情', NULL, _binary 0x733A36333A227B2267726F7570223A225C75353138355C7535626239222C22736F7274223A22323233222C2263617465676F7279223A225C75386263345C7538626261227D223B, 1505491177, 1505626626),
	('/friendly-link/create:GET', 2, '创建友情链接(查看)', NULL, _binary 0x733A38373A227B2267726F7570223A225C75353363625C75363063355C75393466655C7536336135222C22736F7274223A22353031222C2263617465676F7279223A225C75353363625C75363063355C75393466655C7536336135227D223B, 1505491474, 1505626848),
	('/friendly-link/create:POST', 2, '创建友情链接(确定)', NULL, _binary 0x733A38373A227B2267726F7570223A225C75353363625C75363063355C75393466655C7536336135222C22736F7274223A22353032222C2263617465676F7279223A225C75353363625C75363063355C75393466655C7536336135227D223B, 1505491511, 1505626848),
	('/friendly-link/delete:POST', 2, '删除友情链接', NULL, _binary 0x733A38373A227B2267726F7570223A225C75353363625C75363063355C75393466655C7536336135222C22736F7274223A22353036222C2263617465676F7279223A225C75353363625C75363063355C75393466655C7536336135227D223B, 1505491603, 1505627558),
	('/friendly-link/index:GET', 2, '友情链接列表', NULL, _binary 0x733A38373A227B2267726F7570223A225C75353363625C75363063355C75393466655C7536336135222C22736F7274223A22353030222C2263617465676F7279223A225C75353363625C75363063355C75393466655C7536336135227D223B, 1505491435, 1505626848),
	('/friendly-link/sort:POST', 2, '友情链接排序', NULL, _binary 0x733A38373A227B2267726F7570223A225C75353363625C75363063355C75393466655C7536336135222C22736F7274223A22353035222C2263617465676F7279223A225C75353363625C75363063355C75393466655C7536336135227D223B, 1505627295, 1505627558),
	('/friendly-link/update:GET', 2, '修改友情链接(查看)', NULL, _binary 0x733A38373A227B2267726F7570223A225C75353363625C75363063355C75393466655C7536336135222C22736F7274223A22353033222C2263617465676F7279223A225C75353363625C75363063355C75393466655C7536336135227D223B, 1505491547, 1505626848),
	('/friendly-link/update:POST', 2, '修改友情链接(确定)', NULL, _binary 0x733A38373A227B2267726F7570223A225C75353363625C75363063355C75393466655C7536336135222C22736F7274223A22353034222C2263617465676F7279223A225C75353363625C75363063355C75393466655C7536336135227D223B, 1505491571, 1505626848),
	('/friendly-link/view-layer:GET', 2, '友情链接详情', NULL, _binary 0x733A38373A227B2267726F7570223A225C75353363625C75363063355C75393466655C7536336135222C22736F7274223A22353037222C2263617465676F7279223A225C75353363625C75363063355C75393466655C7536336135227D223B, 1505491177, 1505626626),
	('/frontend-menu/create:GET', 2, '创建前台菜单(查看)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313031222C2263617465676F7279223A225C75353234645C75353366305C75383364635C7535333535227D223B, 1505490500, 1505626149),
	('/frontend-menu/create:POST', 2, '创建前台菜单(确定)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313032222C2263617465676F7279223A225C75353234645C75353366305C75383364635C7535333535227D223B, 1505490586, 1505626149),
	('/frontend-menu/delete:POST', 2, '删除前台菜单', NULL, _binary 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313036222C2263617465676F7279223A225C75353234645C75353366305C75383364635C7535333535227D223B, 1505490673, 1505627558),
	('/frontend-menu/index:GET', 2, '前台菜单列表', NULL, _binary 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313030222C2263617465676F7279223A225C75353234645C75353366305C75383364635C7535333535227D223B, 1505490468, 1505626149),
	('/frontend-menu/sort:POST', 2, '前台菜单排序', NULL, _binary 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313035222C2263617465676F7279223A225C75353234645C75353366305C75383364635C7535333535227D223B, 1505627002, 1505627558),
	('/frontend-menu/update:GET', 2, '修改前台菜单(查看)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313033222C2263617465676F7279223A225C75353234645C75353366305C75383364635C7535333535227D223B, 1505490617, 1505626149),
	('/frontend-menu/update:POST', 2, '修改前台菜单(确定)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313034222C2263617465676F7279223A225C75353234645C75353366305C75383364635C7535333535227D223B, 1505490643, 1505626149),
	('/frontend-menu/view-layer:GET', 2, '前台菜单详情', NULL, _binary 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313037222C2263617465676F7279223A225C75353234645C75353366305C75383364635C7535333535227D223B, 1505491177, 1505626626),
	('/log/delete:POST', 2, '删除日志', NULL, _binary 0x733A36333A227B2267726F7570223A225C75363565355C7535666437222C22736F7274223A22373032222C2263617465676F7279223A225C75363565355C7535666437227D223B, 1505491737, 1505626889),
	('/log/index:GET', 2, '日志列表', NULL, _binary 0x733A36333A227B2267726F7570223A225C75363565355C7535666437222C22736F7274223A22373030222C2263617465676F7279223A225C75363565355C7535666437227D223B, 1505491668, 1505626889),
	('/log/view-layer:GET', 2, '查看日志详情', NULL, _binary 0x733A36333A227B2267726F7570223A225C75363565355C7535666437222C22736F7274223A22373031222C2263617465676F7279223A225C75363565355C7535666437227D223B, 1505491709, 1505626889),
	('/menu/create:GET', 2, '创建前台菜单(查看)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313131222C2263617465676F7279223A225C75353430655C75353366305C75383364635C7535333535227D223B, 1505490290, 1505626149),
	('/menu/create:POST', 2, '创建后台菜单(确定)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313132222C2263617465676F7279223A225C75353430655C75353366305C75383364635C7535333535227D223B, 1505490326, 1505626149),
	('/menu/delete:POST', 2, '删除后台菜单', NULL, _binary 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313136222C2263617465676F7279223A225C75353430655C75353366305C75383364635C7535333535227D223B, 1505490424, 1505627558),
	('/menu/index:GET', 2, '后台菜单列表', NULL, _binary 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313130222C2263617465676F7279223A225C75353430655C75353366305C75383364635C7535333535227D223B, 1505490244, 1505626149),
	('/menu/sort:POST', 2, '后台菜单排序', NULL, _binary 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313135222C2263617465676F7279223A225C75353430655C75353366305C75383364635C7535333535227D223B, 1505627029, 1505627558),
	('/menu/update:GET', 2, '修改后台菜单(查看)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313133222C2263617465676F7279223A225C75353430655C75353366305C75383364635C7535333535227D223B, 1505490360, 1505626149),
	('/menu/update:POST', 2, '修改后台菜单(确定)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313134222C2263617465676F7279223A225C75353430655C75353366305C75383364635C7535333535227D223B, 1505490388, 1505626149),
	('/menu/view-layer:GET', 2, '后台菜单详情', NULL, _binary 0x733A37353A227B2267726F7570223A225C75383364635C7535333535222C22736F7274223A22313137222C2263617465676F7279223A225C75353430655C75353366305C75383364635C7535333535227D223B, 1505491177, 1505626626),
	('/page/create:GET', 2, '创建单页(查看)', NULL, _binary 0x733A36333A227B2267726F7570223A225C75353138355C7535626239222C22736F7274223A22323331222C2263617465676F7279223A225C75353335355C7539383735227D223B, 1505489298, 1505626318),
	('/page/create:POST', 2, '创建单页(确定)', NULL, _binary 0x733A36333A227B2267726F7570223A225C75353138355C7535626239222C22736F7274223A22323332222C2263617465676F7279223A225C75353335355C7539383735227D223B, 1505489334, 1505626318),
	('/page/delete:POST', 2, '删除单页', NULL, _binary 0x733A36333A227B2267726F7570223A225C75353138355C7535626239222C22736F7274223A22323336222C2263617465676F7279223A225C75353335355C7539383735227D223B, 1505489980, 1505627558),
	('/page/index:GET', 2, '单页列表', NULL, _binary 0x733A36333A227B2267726F7570223A225C75353138355C7535626239222C22736F7274223A22323330222C2263617465676F7279223A225C75353335355C7539383735227D223B, 1505489257, 1505626318),
	('/page/sort:POST', 2, '单页排序', NULL, _binary 0x733A36333A227B2267726F7570223A225C75353138355C7535626239222C22736F7274223A22323335222C2263617465676F7279223A225C75353335355C7539383735227D223B, 1505627165, 1505627558),
	('/page/update:GET', 2, '修改单页(查看)', NULL, _binary 0x733A36333A227B2267726F7570223A225C75353138355C7535626239222C22736F7274223A22323333222C2263617465676F7279223A225C75353335355C7539383735227D223B, 1505489549, 1505626318),
	('/page/update:POST', 2, '修改单页(确定)', NULL, _binary 0x733A36333A227B2267726F7570223A225C75353138355C7535626239222C22736F7274223A22323334222C2263617465676F7279223A225C75353335355C7539383735227D223B, 1505489617, 1505626318),
	('/page/view-layer:GET', 2, '单页详情', NULL, _binary 0x733A36333A227B2267726F7570223A225C75353138355C7535626239222C22736F7274223A22323337222C2263617465676F7279223A225C75353335355C7539383735227D223B, 1505491177, 1505626626),
	('/rbac/permission-create:GET', 2, '创建权限(查看)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343031222C2263617465676F7279223A225C75363734335C7539363530227D223B, 1505491973, 1505626728),
	('/rbac/permission-create:POST', 2, '创建权限(确定)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343032222C2263617465676F7279223A225C75363734335C7539363530227D223B, 1505492031, 1505626728),
	('/rbac/permission-delete:POST', 2, '删除权限', NULL, _binary 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343036222C2263617465676F7279223A225C75363734335C7539363530227D223B, 1505492312, 1505627558),
	('/rbac/permission-sort:POST', 2, '权限排序', NULL, _binary 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343035222C2263617465676F7279223A225C75363734335C7539363530227D223B, 1505627221, 1505627558),
	('/rbac/permission-update:GET', 2, '修改权限(查看)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343033222C2263617465676F7279223A225C75363734335C7539363530227D223B, 1505492199, 1505626728),
	('/rbac/permission-update:POST', 2, '修改权限(确定)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343034222C2263617465676F7279223A225C75363734335C7539363530227D223B, 1505492277, 1505626728),
	('/rbac/permission-view-layer:GET', 2, '权限详情', NULL, _binary 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343037222C2263617465676F7279223A225C75363734335C7539363530227D223B, 1505491177, 1505626626),
	('/rbac/permissions:GET', 2, '权限列表', NULL, _binary 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343030222C2263617465676F7279223A225C75363734335C7539363530227D223B, 1505491923, 1505626728),
	('/rbac/role-create:GET', 2, '创建角色(查看)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343131222C2263617465676F7279223A225C75383964325C7538323732227D223B, 1505492374, 1505626728),
	('/rbac/role-create:POST', 2, '创建角色(确定)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343132222C2263617465676F7279223A225C75383964325C7538323732227D223B, 1505492408, 1505626728),
	('/rbac/role-delete:POST', 2, '删除角色', NULL, _binary 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343136222C2263617465676F7279223A225C75383964325C7538323732227D223B, 1505492497, 1505627558),
	('/rbac/role-update:GET', 2, '修改角色(查看)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343133222C2263617465676F7279223A225C75383964325C7538323732227D223B, 1505492434, 1505626728),
	('/rbac/role-update:POST', 2, '修改角色(确定)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343134222C2263617465676F7279223A225C75383964325C7538323732227D223B, 1505492463, 1505626728),
	('/rbac/role-view-layer:GET', 2, '角色详情', NULL, _binary 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343137222C2263617465676F7279223A225C75383964325C7538323732227D223B, 1505491177, 1505626626),
	('/rbac/roles-sort:POST', 2, '角色排序', NULL, _binary 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343135222C2263617465676F7279223A225C75383964325C7538323732227D223B, 1505627246, 1505627558),
	('/rbac/roles:GET', 2, '角色列表', NULL, _binary 0x733A37353A227B2267726F7570223A225C75363734335C75393635305C75376261315C7537343036222C22736F7274223A22343130222C2263617465676F7279223A225C75383964325C7538323732227D223B, 1505492339, 1505626728),
	('/setting/custom-create:POST', 2, '创建自定义设置项(确定)', NULL, _binary 0x733A38313A227B2267726F7570223A225C75386262655C7537663665222C22736F7274223A22303135222C2263617465676F7279223A225C75383165615C75356239615C75346534395C75386262655C7537663665227D223B, 1505486899, 1505627612),
	('/setting/custom:GET', 2, '自定义设置(查看)', NULL, _binary 0x733A38313A227B2267726F7570223A225C75386262655C7537663665222C22736F7274223A22303133222C2263617465676F7279223A225C75383165615C75356239615C75346534395C75386262655C7537663665227D223B, 1505486625, 1505627612),
	('/setting/custom:POST', 2, '自定义设置(确定)', NULL, _binary 0x733A38313A227B2267726F7570223A225C75386262655C7537663665222C22736F7274223A22303134222C2263617465676F7279223A225C75383165615C75356239615C75346534395C75386262655C7537663665227D223B, 1505486664, 1505627612),
	('/setting/smtp:GET', 2, 'smpt设置(查看)', NULL, _binary 0x733A36373A227B2267726F7570223A225C75386262655C7537663665222C22736F7274223A22303130222C2263617465676F7279223A22736D74705C75386262655C7537663665227D223B, 1505486510, 1505626085),
	('/setting/smtp:POST', 2, 'smtp设置(确定)', NULL, _binary 0x733A36373A227B2267726F7570223A225C75386262655C7537663665222C22736F7274223A22303131222C2263617465676F7279223A22736D74705C75386262655C7537663665227D223B, 1505486562, 1505626920),
	('/setting/test-smtp:POST', 2, '测试smtp设置', NULL, _binary 0x733A36373A227B2267726F7570223A225C75386262655C7537663665222C22736F7274223A22303132222C2263617465676F7279223A22736D74705C75386262655C7537663665227D223B, 1505492827, 1505626085),
	('/setting/website:GET', 2, '网站设置(查看)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75386262655C7537663665222C22736F7274223A22303030222C2263617465676F7279223A225C75376635315C75376164395C75386262655C7537663665227D223B, 1505486405, 1505626028),
	('/setting/website:POST', 2, '网站设置(确定)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75386262655C7537663665222C22736F7274223A22303031222C2263617465676F7279223A225C75376635315C75376164395C75386262655C7537663665227D223B, 1505486444, 1505626055),
	('/user/create:GET', 2, '创建前台用户(查看)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75373532385C7536323337222C22736F7274223A22333031222C2263617465676F7279223A225C75353234645C75353366305C75373532385C7536323337227D223B, 1505490833, 1505626626),
	('/user/create:POST', 2, '创建前台用户(确定)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75373532385C7536323337222C22736F7274223A22333032222C2263617465676F7279223A225C75353234645C75353366305C75373532385C7536323337227D223B, 1505490875, 1505626626),
	('/user/delete:POST', 2, '删除前台用户', NULL, _binary 0x733A37353A227B2267726F7570223A225C75373532385C7536323337222C22736F7274223A22333035222C2263617465676F7279223A225C75353234645C75353366305C75373532385C7536323337227D223B, 1505491033, 1505627698),
	('/user/index:GET', 2, '前台用户列表', NULL, _binary 0x733A37353A227B2267726F7570223A225C75373532385C7536323337222C22736F7274223A22333030222C2263617465676F7279223A225C75353234645C75353366305C75373532385C7536323337227D223B, 1505490796, 1505626626),
	('/user/update:GET', 2, '修改前台用户(查看)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75373532385C7536323337222C22736F7274223A22333033222C2263617465676F7279223A225C75353234645C75353366305C75373532385C7536323337227D223B, 1505490922, 1505626626),
	('/user/update:POST', 2, '修改前台用户(确定)', NULL, _binary 0x733A37353A227B2267726F7570223A225C75373532385C7536323337222C22736F7274223A22333034222C2263617465676F7279223A225C75353234645C75353366305C75373532385C7536323337227D223B, 1505490999, 1505626626),
	('/user/view-layer:GET', 2, '前台用户详情', NULL, _binary 0x733A37353A227B2267726F7570223A225C75373532385C7536323337222C22736F7274223A22333036222C2263617465676F7279223A225C75353234645C75353366305C75373532385C7536323337227D223B, 1505491177, 1505626626);
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;

-- 导出  表 mycms.auth_item_child 结构
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  mycms.auth_item_child 的数据：~0 rows (大约)
DELETE FROM `auth_item_child`;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;

-- 导出  表 mycms.auth_rule 结构
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  mycms.auth_rule 的数据：~0 rows (大约)
DELETE FROM `auth_rule`;
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;

-- 导出  表 mycms.category 结构
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) unsigned NOT NULL DEFAULT '0',
  `remark` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` int(11) unsigned NOT NULL,
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  mycms.category 的数据：~3 rows (大约)
DELETE FROM `category`;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `parent_id`, `name`, `alias`, `sort`, `remark`, `created_at`, `updated_at`) VALUES
	(1, 0, '能源化工', 'nengyuan', 0, '', 1468293958, 1530494327),
	(2, 0, 'IT与服务', 'ITSERVICE', 0, '', 1468293965, 1530494505),
	(3, 0, '网络通信', 'network', 0, '', 1468293974, 1530494377);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- 导出  表 mycms.comment 结构
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `aid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '文章id',
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户id,游客为0',
  `admin_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '管理员id,其他人员对其回复为0',
  `reply_to` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '回复的评论id',
  `nickname` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '游客' COMMENT '昵称',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '邮箱',
  `website_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '个人网址',
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '回复内容',
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '回复ip',
  `status` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '状态,0.未审核,1.已通过',
  `created_at` int(11) unsigned NOT NULL COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最后修改时间',
  PRIMARY KEY (`id`),
  KEY `index_aid` (`aid`),
  CONSTRAINT `fk_comment_aid` FOREIGN KEY (`aid`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  mycms.comment 的数据：~2 rows (大约)
DELETE FROM `comment`;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` (`id`, `aid`, `uid`, `admin_id`, `reply_to`, `nickname`, `email`, `website_url`, `content`, `ip`, `status`, `created_at`, `updated_at`) VALUES
	(2, 22, 0, 0, 0, 'aaa', '', '', ' :mrgreen:  :roll: 哎哟，不错哟~', '127.0.0.1', 1, 1476066990, 0),
	(3, 22, 0, 0, 2, 'bbb', '', '', '呵呵哒', '127.0.0.1', 1, 1476067011, 0);
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;

-- 导出  表 mycms.friendly_link 结构
CREATE TABLE IF NOT EXISTS `friendly_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '网站名称',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '图片url',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '链接地址',
  `target` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '_blank' COMMENT '打开方式._blank新窗口,_self本窗口',
  `sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '状态.0禁用,1启用',
  `created_at` int(11) unsigned NOT NULL COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最后修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  mycms.friendly_link 的数据：~5 rows (大约)
DELETE FROM `friendly_link`;
/*!40000 ALTER TABLE `friendly_link` DISABLE KEYS */;
INSERT INTO `friendly_link` (`id`, `name`, `image`, `url`, `target`, `sort`, `status`, `created_at`, `updated_at`) VALUES
	(1, '飞嗨博客', '', 'http://blog.feehi.com', '_blank', 0, 1, 1468303851, 0),
	(2, '飞嗨网', '', 'http://www.feehi.com', '_blank', 0, 1, 1468303882, 0),
	(3, '36kr', '', 'http://www.36kr.com', '_blank', 0, 1, 1468303902, 0),
	(4, '破晓电影', '', 'http://www.poxiao.com', '_blank', 0, 1, 1468303938, 0),
	(5, '翠竹林主题', '', 'http://www.cuizl.com/', '_blank', 0, 1, 1468303974, 0);
/*!40000 ALTER TABLE `friendly_link` ENABLE KEYS */;

-- 导出  表 mycms.menu 结构
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `type` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '菜单类型.0后台,1前台',
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '上级菜单id',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '名称',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'url地址',
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '图标',
  `sort` float unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `target` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '_blank' COMMENT '打开方式._blank新窗口,_self本窗口',
  `is_absolute_url` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '是否绝对地址',
  `is_display` smallint(6) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示.0否,1是',
  `created_at` int(11) unsigned NOT NULL COMMENT '创建时间',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最后修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  mycms.menu 的数据：~32 rows (大约)
DELETE FROM `menu`;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `type`, `parent_id`, `name`, `url`, `icon`, `sort`, `target`, `is_absolute_url`, `is_display`, `created_at`, `updated_at`) VALUES
	(1, 0, 0, '设置', '', 'fa fa-cogs', 0, '_blank', 0, 1, 1505570067, 1505570067),
	(2, 0, 1, '网站设置', '/setting/website', '', 1, '_blank', 0, 1, 1505570108, 1505570108),
	(3, 0, 1, 'SMTP设置', 'setting/smtp', '', 2, '_blank', 0, 1, 1505570155, 1505570283),
	(4, 0, 1, '自定义设置', 'setting/custom', '', 4, '_blank', 0, 1, 1505570187, 1505570187),
	(5, 0, 0, '菜单', '', 'fa fa-th-list', 2, '_blank', 0, 1, 1505570320, 1512380045),
	(6, 0, 5, '前台菜单', 'frontend-menu/index', '', 0, '_blank', 0, 1, 1505570366, 1505570366),
	(7, 0, 5, '后台菜单', 'menu/index', '', 0, '_blank', 0, 1, 1505570382, 1505570382),
	(8, 0, 0, '内容', '', 'fa fa-edit', 3, '_blank', 0, 1, 1505570558, 1512380045),
	(9, 0, 8, '文章', 'article/index', '', 0, '_blank', 0, 1, 1505570610, 1505570610),
	(10, 0, 8, '分类', 'category/index', '', 0, '_blank', 0, 1, 1505570638, 1505570638),
	(11, 0, 8, '评论', 'comment/index', '', 0, '_blank', 0, 1, 1505570661, 1505570707),
	(12, 0, 8, '单页', 'page/index', '', 0, '_blank', 0, 1, 1505570687, 1505570687),
	(13, 0, 0, '用户', 'user/index', 'fa fa-users', 4, '_blank', 0, 1, 1505570745, 1512380045),
	(14, 0, 0, '权限管理', '', 'fa fa-th-large', 5, '_blank', 0, 1, 1505570819, 1512380045),
	(15, 0, 14, '权限', 'rbac/permissions', '', 0, '_blank', 0, 1, 1505570862, 1505570862),
	(16, 0, 14, '角色', 'rbac/roles', '', 0, '_blank', 0, 1, 1505570882, 1505570882),
	(17, 0, 14, '管理员', 'admin-user/index', '', 0, '_blank', 0, 1, 1505570902, 1505570902),
	(18, 0, 0, '友情链接', 'friendly-link/index', 'fa fa-link', 6, '_blank', 0, 1, 1505570934, 1512380045),
	(19, 0, 0, '缓存', '', 'fa fa-file', 7, '_blank', 0, 1, 1505570947, 1512380045),
	(20, 0, 19, '清除前台', 'clear/frontend', '', 0, '_blank', 0, 1, 1505570974, 1505570974),
	(21, 0, 19, '清除后台', 'clear/backend', '', 0, '_blank', 0, 1, 1505570994, 1505570994),
	(22, 0, 0, '日志', 'log/index', 'fa fa-history', 8, '_blank', 0, 1, 1505571212, 1512380045),
	(23, 1, 0, '首页', '/', '', 0, '_self', 0, 1, 1505636890, 1505637024),
	(24, 1, 0, '研究报告', '/page/report', '', 0, '_self', 0, 1, 1505636915, 1530457414),
	(25, 1, 0, '订购流程', '/page/order', '', 0, '_self', 0, 1, 1505636975, 1530457447),
	(26, 1, 0, '收费标准', '/page/shoufei', '', 0, '_self', 0, 1, 1505637000, 1530457486),
	(27, 0, 0, '运营管理', '', 'fa fa-ils', 1, '_self', 0, 1, 1505637000, 1505637000),
	(28, 0, 27, 'Banner管理', 'banner/index', '', 0, '_self', 0, 1, 1505637000, 1505637000),
	(29, 0, 27, '广告管理', 'ad/index', '', 0, '_self', 0, 1, 1505637000, 1505637000),
	(30, 1, 0, '会员中心', '/page/member', '', 0, '_self', 0, 1, 1530457507, 1530457507),
	(31, 1, 0, '关于我们', '/page/about', '', 0, '_self', 0, 1, 1530457529, 1530457529),
	(32, 1, 0, '联系我们', '/page/contact', '', 0, '_self', 0, 1, 1530457549, 1530457549);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- 导出  表 mycms.migration 结构
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 正在导出表  mycms.migration 的数据：~4 rows (大约)
DELETE FROM `migration`;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1530450899),
	('m130524_201442_init', 1530450933),
	('m140506_102106_rbac_init', 1530450934),
	('m180225_064210_add_view_detail_permissions', 1530450934);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;

-- 导出  表 mycms.options 结构
CREATE TABLE IF NOT EXISTS `options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `type` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '类型.0系统,1自定义,2banner,3广告',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '标识符',
  `value` text COLLATE utf8_unicode_ci NOT NULL COMMENT '值',
  `input_type` smallint(6) unsigned NOT NULL DEFAULT '1' COMMENT '输入框类型',
  `autoload` smallint(6) unsigned NOT NULL DEFAULT '1' COMMENT '自动加载.0否,1是',
  `tips` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '提示备注信息',
  `sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  mycms.options 的数据：~27 rows (大约)
DELETE FROM `options`;
/*!40000 ALTER TABLE `options` DISABLE KEYS */;
INSERT INTO `options` (`id`, `type`, `name`, `value`, `input_type`, `autoload`, `tips`, `sort`) VALUES
	(1, 0, 'seo_keywords', 'Land', 1, 0, '', 0),
	(2, 0, 'seo_description', 'Land，最好的cms之一', 1, 0, '', 0),
	(3, 0, 'website_title', 'Land', 1, 0, '', 0),
	(4, 0, 'website_description', 'Based on most popular php framework yii2', 1, 0, '', 0),
	(5, 0, 'website_email', '', 1, 0, '', 0),
	(6, 0, 'website_language', 'zh-CN', 1, 0, '', 0),
	(7, 0, 'website_icp', '粤ICP备16046946号-1', 1, 0, '', 0),
	(8, 0, 'website_statics_script', '', 1, 0, '', 0),
	(9, 0, 'website_status', '1', 1, 0, '', 0),
	(10, 0, 'website_comment', '1', 1, 0, '', 0),
	(11, 0, 'website_comment_need_verify', '0', 1, 0, '', 0),
	(12, 0, 'website_timezone', 'Asia/Shanghai', 1, 0, '', 0),
	(13, 0, 'website_url', 'http://mycms.cn', 1, 0, '', 0),
	(14, 0, 'smtp_host', '', 1, 0, '', 0),
	(15, 0, 'smtp_username', '', 1, 0, '', 0),
	(16, 0, 'smtp_password', '', 1, 0, '', 0),
	(17, 0, 'smtp_port', '', 1, 0, '', 0),
	(18, 0, 'smtp_encryption', '', 1, 0, '', 0),
	(19, 0, 'smtp_nickname', '', 1, 0, '', 0),
	(20, 1, 'weibo', 'http://www.weibo.com/feeppp', 1, 1, '新浪微博', 0),
	(21, 1, 'facebook', 'http://www.facebook.com/liufee', 1, 1, 'facebook', 0),
	(22, 1, 'wechat', '飞得更高', 1, 1, '微信', 0),
	(23, 1, 'qq', '1838889850', 1, 1, 'QQ号码', 0),
	(24, 1, 'email', 'admin@feehi.com', 1, 1, '邮箱', 0),
	(25, 2, 'index', '[{"sign":"5a251a3013586","img":"\\/uploads\\/setting\\/banner\\/5a251a301280d_1.png","target":"_blank","link":"\\/view\\/11","sort":"3","status":"1","desc":""},{"sign":"5a251a4932a52","img":"\\/uploads\\/setting\\/banner\\/5a251a4930fc2_2.jpg","target":"_blank","link":"\\/view\\/15","sort":"2","status":"1","desc":""},{"sign":"5a251a5690fe9","img":"\\/uploads\\/setting\\/banner\\/5a251a568f966_3.jpg","target":"_blank","link":"\\/view\\/16","sort":"1","status":"1","desc":""}]', 1, 1, '首页banner', 0),
	(26, 3, 'sidebar_right_1', '{"ad":"\\/uploads\\/setting\\/ad\\/5a292c0fda836_cms.jpg","link":"http://www.feehi.com","target":"_blank","desc":"FeehiCMS","created_at":1512641320,"updated_at":1512647776}', 1, 1, '网站右侧广告位1', 0),
	(27, 3, 'sidebar_right_2', '{"ad":"\\/uploads\\/setting\\/ad\\/5a291f9236479_22.jpg","link":"","target":"_blank","desc":"\\u6700\\u597d\\u7684\\u8fd0\\u52a8\\u624b\\u8868","created_at":1512644498,"updated_at":1512647586}', 1, 1, '网站右侧广告位2', 0);
/*!40000 ALTER TABLE `options` ENABLE KEYS */;

-- 导出  表 mycms.user 结构
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增用户id',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户名',
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT 'cookie验证auth_key',
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '加密后密码',
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '找回密码token',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户邮箱',
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '用户头像url',
  `status` smallint(6) NOT NULL DEFAULT '10' COMMENT '用户状态,10为正常',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL COMMENT '最后修改时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  mycms.user 的数据：~1 rows (大约)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `avatar`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'test', 'M-80HoIrwaOHC2U71DjXLXCEmuwA_nng', '$2y$13$/AhfSOOBvvgJysh66bzLLeStZZjdReZjimJ9KKn8Rm2e0gjIrt3bC', NULL, 'test@qq.com', '', 10, 1530457935, 1530457935);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
