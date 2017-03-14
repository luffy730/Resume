SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `Mall` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `Mall` ;

-- -----------------------------------------------------
-- Table `Mall`.`manager`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Mall`.`manager` (
  `uid` INT UNSIGNED NULL AUTO_INCREMENT COMMENT '主键 自增',
  `username` CHAR(50) NOT NULL DEFAULT '' COMMENT '用户名 非重非空（字符串）',
  `password` CHAR(32) NOT NULL DEFAULT '' COMMENT '密码 ',
  `identification` CHAR(50) NOT NULL DEFAULT '' COMMENT '账号',
  `loginTime` INT NOT NULL DEFAULT 0 COMMENT '登陆时间',
  `loginIp` CHAR(100) NOT NULL DEFAULT '' COMMENT '登陆IP',
  PRIMARY KEY (`uid`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC))
ENGINE = MyISAM
COMMENT = '管理员表';


-- ----------------------------
-- Table structure for `band`
-- ----------------------------
DROP TABLE IF EXISTS `band`;
CREATE TABLE `band` (
  `bid` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键自增',
  `bname` char(50) NOT NULL DEFAULT '' COMMENT '品牌名称',
  `logo` varchar(225) NOT NULL DEFAULT '' COMMENT 'logo图片路径',
  `bsort` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `is_hot` tinyint(5) NOT NULL DEFAULT '0' COMMENT '是否热门',
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='品牌表';

-- ----------------------------
-- Records of band
-- ----------------------------
INSERT INTO `band` VALUES ('1', '小米', 'Upload/63971464764423.jpg', '0', '1');
INSERT INTO `band` VALUES ('2', '联想', 'Upload/64361464764439.jpg', '0', '0');
INSERT INTO `band` VALUES ('3', '苹果', 'Upload/19261464764495.jpg', '0', '0');
INSERT INTO `band` VALUES ('4', '戴尔', 'Upload/79621464941586.jpg', '0', '0');
INSERT INTO `band` VALUES ('5', '华硕', 'Upload/47351464941612.jpg', '0', '0');
INSERT INTO `band` VALUES ('6', '宏基', 'Upload/34071464941673.jpg', '0', '0');

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `cid` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键自增分类ID',
  `cname` char(20) NOT NULL DEFAULT '' COMMENT '分类名称 非空-空字符串',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父级id 非空非负默认0',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序非空非负默认0',
  `type_tid` int(11) NOT NULL,
  PRIMARY KEY (`cid`),
  KEY `fk_category_type1_idx` (`type_tid`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COMMENT='分类表';

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('12', '手机', '0', '1', '0');
INSERT INTO `category` VALUES ('13', '手机通讯', '12', '100', '1');
INSERT INTO `category` VALUES ('14', '手机配件', '12', '100', '1');
INSERT INTO `category` VALUES ('15', '电脑', '0', '3', '0');
INSERT INTO `category` VALUES ('16', '笔记本', '15', '100', '1');
INSERT INTO `category` VALUES ('17', '平板', '15', '100', '1');
INSERT INTO `category` VALUES ('18', '品牌整机', '15', '100', '1');
INSERT INTO `category` VALUES ('19', '摄影', '0', '2', '0');
INSERT INTO `category` VALUES ('20', '摄影摄像', '19', '100', '1');
INSERT INTO `category` VALUES ('21', '相机配件', '19', '100', '1');
INSERT INTO `category` VALUES ('22', '电玩', '0', '4', '0');
INSERT INTO `category` VALUES ('23', '游戏电玩', '22', '100', '1');
INSERT INTO `category` VALUES ('24', '游戏本', '22', '100', '1');
INSERT INTO `category` VALUES ('25', '硬件', '0', '5', '0');
INSERT INTO `category` VALUES ('26', 'DIY硬件', '25', '100', '1');
INSERT INTO `category` VALUES ('27', ' 外设配件', '25', '100', '1');
INSERT INTO `category` VALUES ('28', '网络设备', '25', '100', '1');
INSERT INTO `category` VALUES ('29', '辅助', '0', '6', '0');
INSERT INTO `category` VALUES ('30', '智能生活', '29', '100', '1');
INSERT INTO `category` VALUES ('31', '数码配件', '29', '100', '1');
INSERT INTO `category` VALUES ('32', '平板配件', '29', '100', '1');
INSERT INTO `category` VALUES ('33', '共用设备', '0', '7', '0');
INSERT INTO `category` VALUES ('34', '家庭影音', '33', '100', '1');
INSERT INTO `category` VALUES ('35', '办公设备', '33', '100', '1');
INSERT INTO `category` VALUES ('36', '生活必备', '0', '8', '0');
INSERT INTO `category` VALUES ('37', '生活家电', '36', '100', '2');
INSERT INTO `category` VALUES ('38', '家庭影音', '36', '100', '2');
INSERT INTO `category` VALUES ('39', '个护', '36', '100', '2');
INSERT INTO `category` VALUES ('40', '华为', '13', '100', '1');
INSERT INTO `category` VALUES ('41', '三星', '13', '100', '1');

-- ----------------------------
-- Table structure for `goods`
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `gid` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键，自增',
  `gname` char(50) NOT NULL DEFAULT '' COMMENT '商品名称',
  `gcode` char(100) NOT NULL DEFAULT '' COMMENT '货号',
  `gunit` varchar(45) NOT NULL DEFAULT '' COMMENT '单位',
  `cprice` decimal(7,2) NOT NULL DEFAULT '0.00' COMMENT '市场价',
  `mprice` decimal(7,2) NOT NULL DEFAULT '0.00' COMMENT '商城价',
  `stock` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '总库存',
  `listpic` varchar(225) NOT NULL DEFAULT '' COMMENT '列表图',
  `click` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '点击率',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '上架时间',
  `category_cid` int(11) NOT NULL,
  `type_tid` int(11) NOT NULL,
  `band_bid` int(11) NOT NULL,
  `user_uid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`gid`),
  KEY `fk_goods_category1_idx` (`category_cid`),
  KEY `fk_goods_type1_idx` (`type_tid`),
  KEY `fk_goods_band1_idx` (`band_bid`),
  KEY `fk_goods_user1_idx` (`user_uid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='商品表';

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('2', '【顺丰包邮】联想 IdeaPad 710S（i5/4GB/128GB）轻薄时尚 13.3英寸 高分屏', '', '台', '5610.00', '4966.00', '56', 'Upload/Content/16/06/68421464868998.png', '545', '1464831442', '16', '1', '2', '1');
INSERT INTO `goods` VALUES ('7', '【顺丰包邮】戴尔 Inspiron 灵越 14 3000（INS14CD-4518B）', '', '台', '3648.00', '3349.00', '0', 'Upload/Content/16/06/83651465011241.jpg', '243', '1464944313', '16', '1', '4', '1');
INSERT INTO `goods` VALUES ('3', '【顺丰包邮】华硕 FL5500LD5500 15.6英吋笔记本 高清1920X1080P 大屏音影娱', '', '台', '4600.00', '4300.00', '0', 'Upload/Content/16/06/46241464942672.png', '323', '1464941912', '16', '1', '5', '1');
INSERT INTO `goods` VALUES ('4', '【 顺丰包邮】Acer VN7-591G-56ZA i5-4210H 4G内存 1TB硬盘 GTX8', '', '台', '5320.00', '5100.00', '0', 'Upload/Content/16/06/22011464942719.png', '32', '1464942125', '16', '1', '6', '1');
INSERT INTO `goods` VALUES ('5', '【顺丰包邮·官方授权】联想（Lenovo）N50-45-EON（双核E1-6010 4G 500G', '', '台', '5349.00', '5130.00', '0', 'Upload/Content/16/06/29371464942937.jpg', '243', '1464942942', '16', '1', '2', '1');
INSERT INTO `goods` VALUES ('6', '【顺丰包邮】华硕 VM510L5200  15.6英寸笔记本 强悍性能 影音娱乐 五代酷睿i5-52', '', '台', '3800.00', '3300.00', '0', 'Upload/Content/16/06/39201464943085.png', '432', '1464943094', '16', '1', '5', '1');

-- ----------------------------
-- Table structure for `goodslist`
-- ----------------------------
DROP TABLE IF EXISTS `goodslist`;
CREATE TABLE `goodslist` (
  `did` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键，自增',
  `grouppid` char(100) NOT NULL DEFAULT '' COMMENT '组合属性id',
  `dcode` char(100) NOT NULL DEFAULT '' COMMENT '货号',
  `dstock` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '库存',
  `goods_gid` int(11) NOT NULL,
  `glname` char(200) NOT NULL,
  PRIMARY KEY (`did`),
  KEY `fk_ description_goods1_idx` (`goods_gid`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='货品列表';

-- ----------------------------
-- Records of goodslist
-- ----------------------------
INSERT INTO `goodslist` VALUES ('14', '347,345', '54', '546', '2', '全新原装电脑+全国联保保修卡+说明书+电源适配器+电池（具体以厂家配置为准）');
INSERT INTO `goodslist` VALUES ('15', '347,343', '545', '533', '2', '官方标配+联想专用电脑包+联想专用鼠标+精美鼠标垫');
INSERT INTO `goodslist` VALUES ('16', '347,344', '657', '657', '2', '官方标配+联想专用电脑包+联想专用鼠标+高防炫光专用屏幕+防水硅胶键盘膜+内胆包+散热底座');
INSERT INTO `goodslist` VALUES ('17', '346,345', '65', '775', '2', '全新原装电脑+全国联保保修卡+说明书+电源适配器+电池（具体以厂家配置为准）');
INSERT INTO `goodslist` VALUES ('18', '346,343', '6567', '656', '2', '官方标配+联想专用电脑包+联想专用鼠标+精美鼠标垫');
INSERT INTO `goodslist` VALUES ('19', '346,344', '5454', '545', '2', '官方标配+联想专用电脑包+联想专用鼠标+高防炫光专用屏幕+防水硅胶键盘膜+内胆包+散热底座');
INSERT INTO `goodslist` VALUES ('31', '533,530', '546', '54654', '7', ' 官方标配+原装笔记电脑包+原装笔记本鼠标+原装屏幕保护膜+原装键盘保护膜+高级鼠标垫+笔记本专用清洁套装+游戏专用迷你便携耳机');
INSERT INTO `goodslist` VALUES ('30', '532,530', '6576', '657', '7', '笔记本电脑+笔记本充电器+笔记本保修卡+保修发票');
INSERT INTO `goodslist` VALUES ('29', '534,530', '657', '657', '7', ' 官方标配+原装笔记本电脑包+原装笔记本鼠标+高级鼠标垫');
INSERT INTO `goodslist` VALUES ('28', '533,531', '54', '6545', '7', '官方标配+原装笔记电脑包+原装笔记本鼠标+原装屏幕保护膜+原装键盘保护膜+高级鼠标垫+笔记本专用清洁套装+游戏专用迷你便携耳机');
INSERT INTO `goodslist` VALUES ('27', '534,531', '656', '765', '7', '官方标配+原装笔记本电脑包+原装笔记本鼠标+高级鼠标垫');
INSERT INTO `goodslist` VALUES ('26', '532,531', '6576', '76786', '7', '笔记本电脑+笔记本充电器+笔记本保修卡+保修发票');

-- ----------------------------
-- Table structure for `goods_property`
-- ----------------------------
DROP TABLE IF EXISTS `goods_property`;
CREATE TABLE `goods_property` (
  `gpid` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键，自增',
  `gpvalue` char(50) NOT NULL DEFAULT '' COMMENT '属性值',
  `appendprice` decimal(7,3) NOT NULL DEFAULT '0.000' COMMENT '附加价格',
  `goods_gid` int(11) NOT NULL,
  `property_pid` int(11) NOT NULL,
  PRIMARY KEY (`gpid`),
  KEY `fk_goods_property_goods1_idx` (`goods_gid`),
  KEY `fk_goods_property_property1_idx` (`property_pid`)
) ENGINE=MyISAM AUTO_INCREMENT=535 DEFAULT CHARSET=utf8 COMMENT='商品属性表';

-- ----------------------------
-- Records of goods_property
-- ----------------------------
INSERT INTO `goods_property` VALUES ('534', '套餐一', '100.000', '7', '14');
INSERT INTO `goods_property` VALUES ('533', '套餐二', '200.000', '7', '14');
INSERT INTO `goods_property` VALUES ('532', '官方套餐', '0.000', '7', '14');
INSERT INTO `goods_property` VALUES ('531', '皓月银', '100.000', '7', '2');
INSERT INTO `goods_property` VALUES ('530', '灰色', '80.000', '7', '2');
INSERT INTO `goods_property` VALUES ('529', '商城联保，享受三包', '0.000', '7', '13');
INSERT INTO `goods_property` VALUES ('528', '4GB（4GB×1）', '0.000', '7', '12');
INSERT INTO `goods_property` VALUES ('527', '双核心/二线程', '0.000', '7', '11');
INSERT INTO `goods_property` VALUES ('526', ' 2.9GHz', '0.000', '7', '10');
INSERT INTO `goods_property` VALUES ('525', '英特尔 酷睿i5 6代系列', '0.000', '7', '9');
INSERT INTO `goods_property` VALUES ('524', '预装Windows 10', '0.000', '7', '8');
INSERT INTO `goods_property` VALUES ('347', '香槟金', '100.000', '2', '2');
INSERT INTO `goods_property` VALUES ('346', '皓月银', '50.000', '2', '2');
INSERT INTO `goods_property` VALUES ('345', '官方套餐', '50.000', '2', '14');
INSERT INTO `goods_property` VALUES ('344', '套餐二', '100.000', '2', '14');
INSERT INTO `goods_property` VALUES ('343', '套餐一', '80.000', '2', '14');
INSERT INTO `goods_property` VALUES ('342', '全国联保，享受三包服务', '0.000', '2', '13');
INSERT INTO `goods_property` VALUES ('341', '4GB（4GB×1）', '0.000', '2', '12');
INSERT INTO `goods_property` VALUES ('340', '双核心/四线程', '0.000', '2', '11');
INSERT INTO `goods_property` VALUES ('339', ' 2.9GHz', '0.000', '2', '10');
INSERT INTO `goods_property` VALUES ('338', '英特尔 酷睿i5 6代系列', '0.000', '2', '9');
INSERT INTO `goods_property` VALUES ('337', '预装Windows 10', '0.000', '2', '8');
INSERT INTO `goods_property` VALUES ('336', '娱乐', '0.000', '2', '7');
INSERT INTO `goods_property` VALUES ('335', '时尚轻薄本', '0.000', '2', '6');
INSERT INTO `goods_property` VALUES ('334', '2016年04月', '0.000', '2', '5');
INSERT INTO `goods_property` VALUES ('333', '13寸', '0.000', '2', '1');
INSERT INTO `goods_property` VALUES ('387', '套餐一', '100.000', '3', '14');
INSERT INTO `goods_property` VALUES ('386', '官方套餐', '0.000', '3', '14');
INSERT INTO `goods_property` VALUES ('385', '钻石白', '80.000', '3', '2');
INSERT INTO `goods_property` VALUES ('384', '翡翠绿', '50.000', '3', '2');
INSERT INTO `goods_property` VALUES ('383', '全国联保，享受三包服务', '0.000', '3', '13');
INSERT INTO `goods_property` VALUES ('382', '4GB（4GB×1）', '0.000', '3', '12');
INSERT INTO `goods_property` VALUES ('381', '双核心/二线程', '0.000', '3', '11');
INSERT INTO `goods_property` VALUES ('380', ' 2.9GHz', '0.000', '3', '10');
INSERT INTO `goods_property` VALUES ('379', '英特尔 酷睿i5 6代系列', '0.000', '3', '9');
INSERT INTO `goods_property` VALUES ('378', '   预装Windows 8', '0.000', '3', '8');
INSERT INTO `goods_property` VALUES ('377', '家用', '0.000', '3', '7');
INSERT INTO `goods_property` VALUES ('376', '时尚轻薄本', '0.000', '3', '6');
INSERT INTO `goods_property` VALUES ('375', '2016年04月', '0.000', '3', '5');
INSERT INTO `goods_property` VALUES ('401', '套餐一', '100.000', '4', '14');
INSERT INTO `goods_property` VALUES ('400', '官方套餐', '0.000', '4', '14');
INSERT INTO `goods_property` VALUES ('399', '白色', '10.000', '4', '2');
INSERT INTO `goods_property` VALUES ('398', '金色', '100.000', '4', '2');
INSERT INTO `goods_property` VALUES ('397', '全国联保，享受三包服务', '0.000', '4', '13');
INSERT INTO `goods_property` VALUES ('396', '8GB（8GB×1）', '0.000', '4', '12');
INSERT INTO `goods_property` VALUES ('395', '四核心/四线程', '0.000', '4', '11');
INSERT INTO `goods_property` VALUES ('394', ' 2.9GHz', '0.000', '4', '10');
INSERT INTO `goods_property` VALUES ('393', '英特尔 酷睿i5 6代系列', '0.000', '4', '9');
INSERT INTO `goods_property` VALUES ('392', '预装Windows 10', '0.000', '4', '8');
INSERT INTO `goods_property` VALUES ('391', '办公', '0.000', '4', '7');
INSERT INTO `goods_property` VALUES ('390', '影音娱乐本', '0.000', '4', '6');
INSERT INTO `goods_property` VALUES ('389', '2016年04月', '0.000', '4', '5');
INSERT INTO `goods_property` VALUES ('388', '13寸', '0.000', '4', '1');
INSERT INTO `goods_property` VALUES ('402', '14寸', '0.000', '5', '1');
INSERT INTO `goods_property` VALUES ('403', '2016年04月', '0.000', '5', '5');
INSERT INTO `goods_property` VALUES ('404', '影音娱乐本', '0.000', '5', '6');
INSERT INTO `goods_property` VALUES ('405', '家用', '0.000', '5', '7');
INSERT INTO `goods_property` VALUES ('406', '   预装Windows 8', '0.000', '5', '8');
INSERT INTO `goods_property` VALUES ('407', '英特尔 酷睿i5 2代系列', '0.000', '5', '9');
INSERT INTO `goods_property` VALUES ('408', ' 1.8GHz', '0.000', '5', '10');
INSERT INTO `goods_property` VALUES ('409', '双核心/二线程', '0.000', '5', '11');
INSERT INTO `goods_property` VALUES ('410', '8GB（8GB×1）', '0.000', '5', '12');
INSERT INTO `goods_property` VALUES ('411', '商城联保，享受三包', '0.000', '5', '13');
INSERT INTO `goods_property` VALUES ('412', '皓月银', '80.000', '5', '2');
INSERT INTO `goods_property` VALUES ('413', '翡翠绿', '100.000', '5', '2');
INSERT INTO `goods_property` VALUES ('414', '官方套餐', '0.000', '5', '14');
INSERT INTO `goods_property` VALUES ('523', '家用', '0.000', '7', '7');
INSERT INTO `goods_property` VALUES ('522', '时尚轻薄本', '0.000', '7', '6');
INSERT INTO `goods_property` VALUES ('521', '2016年04月', '0.000', '7', '5');
INSERT INTO `goods_property` VALUES ('520', '14寸', '0.000', '7', '1');

-- ----------------------------
-- Table structure for `product_detail`
-- ----------------------------
DROP TABLE IF EXISTS `product_detail`;
CREATE TABLE `product_detail` (
  `pdid` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键，自增',
  `gallery` varchar(225) NOT NULL DEFAULT '' COMMENT '图册',
  `detail` text COMMENT '商品详细',
  `service` text COMMENT '售后服务',
  `goods_gid` int(11) NOT NULL,
  PRIMARY KEY (`pdid`),
  KEY `fk_product_detail_goods1_idx` (`goods_gid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='商品详细表';

-- ----------------------------
-- Records of product_detail
-- ----------------------------
INSERT INTO `product_detail` VALUES ('7', 'Upload/Content/16/06/77431465011257.jpg,Upload/Content/16/06/68501465011256.jpg,Upload/Content/16/06/84221465011255.jpg,Upload/Content/16/06/33681465011254.jpg,', '<p><br/></p><p></p><p><img src=\"/Mall/Publi/Upload/ueditor/image/20160604/1465011601932326.jpg\" style=\"width: 340px; height: 261px;\" width=\"340\" height=\"261\"/></p><p><img src=\"/Mall/Publi/Upload/ueditor/image/20160604/1465011601186499.jpg\" style=\"width: 348px; height: 274px;\" width=\"348\" height=\"274\"/></p><p><br/></p><p><span class=\"title\">48小时发货</span><span class=\"english-title\">48 Hours</span>\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p><p>购买带有&quot;Z<span class=\"add-plus\">+</span>&quot;标识店铺的商品时，商家承诺您所下的订单，将在48小时内进行发货（部分商家节假日不发货），让您尽快收到商品。</p><ul class=\" list-paddingleft-2\"><li><p>1、赔付保障权益</p></li><li><p>如您的收货地址在商家承诺的服务区域内，商家承诺在下单后的48小时内将商品发出，从您下单时间开始计算，如超时未发出，您可根据ZOL商城“先行赔付”进行维权、获得赔偿。</p></li></ul><ul class=\" list-paddingleft-2\"><li><p>2、如何跟踪配送信息</p></li><li><p>配送信息可直接在您购买的商品订单中查看。或直接与卖家联系确认。您\r\n可以在商品详细页面查看入驻卖家联系信息，订单状态变为&quot;已发货&quot;后，点击查询&quot;物流状态&quot;即可查询到您所购买的商品的在途情况。或请您点击对应的物流承\r\n运商网站进行查询，快递单号可以登陆ZOL商城账号的订单管理中获取，建议发货后48小时后进行查询。查询方式如下： &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/>顺丰快递：服务热线&nbsp;&nbsp;&nbsp;&nbsp;95338&nbsp;&nbsp;&nbsp;&nbsp;快递单号由&quot;10&quot;或&quot;01&quot;开头的12位数字组成，例如：10******8888或01******9999。</p></li></ul><p><span class=\"title\">发票保障</span><span class=\"english-title\">Invoice</span>\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p><p>指买家在zol购买商品时，店铺内带有&quot;Z<span class=\"add-plus\">+</span>&quot;标识的店铺内所购买商品均带有正规商品发票。且使用该服务不向买家收取任何其他费用。</p><ul class=\" list-paddingleft-2\"><li><p>1、赔付保障权益</p></li><li><p>如商家未履行所承诺的发票保障服务，您可根据ZOL商城&quot;先行赔付&quot;进行维权、获得赔偿。</p></li></ul><ul class=\" list-paddingleft-2\"><li><p>2、发票的开具</p></li><li><p>1. 开具发票的金额以实际支付的金额为准。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/>2. ZOL提供的发票种类有为&quot;普通发票&quot;。</p></li></ul><ul class=\" list-paddingleft-2\"><li><p>3、普通发票</p></li><li><p>1. 个人及不具有一般纳税人资格的企业客户，均开具普通发票 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 2. 开具普通发票时，抬头默认为收货人&quot;个人姓名&quot;，请需要更改抬头的客户在修改信息中进行修改。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 3. 普通发票信息与您输入的信息一致的情况下，发票一经开出，恕不退换。</p></li></ul><ul class=\" list-paddingleft-2\"><li><p>4、开发票的注意事项</p></li><li><p>1.发票金额不能高于订单金额。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 2.为了享受厂商提供的质保服务，请您将商品发票开具为明细。如果您购买的是数码类、手机及配件、笔记本、台式机、家电类商品，为了保证您能充分享受生产厂家提供的售后服务（售后服务需根据发票确认您的购买日期），发票内容默认为您订购的商品明细。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 3.不同物流中心开具的发票无法合并。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 4.使用优惠券、积分的金额不开具发票。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 5.一个包裹对应一张发票或多张发票。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 6、销售产品均可开具正规机打发票（普通增值税发票），无需加税点，但为了保证发票不遗漏和错开，请下订单时在补充说明（或者卖家留言），留言注明：需开发票抬头XXX公司或者XXX人名。如忘记注明，请及时联系客服帮助备注。</p></li></ul><ul class=\" list-paddingleft-2\"><li><p>5、发票的退换</p></li><li><p>1. 如果您收到的发票与您输入的开票信息、订单信息不一致，请及时联系我们的客服人员，我们会及时为您联系商家解决您的问题。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> \r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;2.未经易ZOL商城人员的允许，客服部门将不接受电话、传真、邮件、邮寄等形式的重开发票申请，如您擅自将发票寄到我公司的任一办公地址，在寄送过程中\r\n发生的发票遗失、缺失等情况，恕我们概不负责。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/></p></li></ul><p><span class=\"title\">物流配送</span><span class=\"english-title\">Logistics</span>\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p><p>当您购买ZOL带有&quot;Z<span class=\"add-plus\">+</span>&quot;\r\n标识店铺，商家承诺全店商品满399元，如收货地址在顺丰速运(即顺丰速运（集团）有限公司及其子公司)所覆盖的派送区域内，均采用顺丰速运为消费者提供\r\n免费物流配送服务；如收货地址不在顺丰速运派送范围内时，商家需使用其它可送达快递为消费者提供免费物流配送服务。如在商家店铺未购买达到399元，除商\r\n家优惠外，物流费用由买家自己承担。</p><ul class=\" list-paddingleft-2\"><li><p>1、赔付保障权益</p></li><li><p>如商家向您收取物流费用，您可根据ZOL商城&quot;先行赔付&quot;进行维权、获得赔偿。</p></li></ul><ul class=\" list-paddingleft-2\"><li><p>2、因以下原因导致延误或退回的，不在此服务保障范围内：</p></li><li><p>1)&nbsp;&nbsp;&nbsp;&nbsp;部份城市的偏远地区因交通等问题，配送时间可能在预计到达时间基础上延后1-2天。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 2)&nbsp;&nbsp;&nbsp;&nbsp;因买家原因（更改收货地址、地址不详、地址错误、联系不上、拒收、无代收人等）导致包裹延误派送或无法送达的； &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 3)&nbsp;&nbsp;&nbsp;&nbsp;因不可抗力造成延误的（&quot;不可抗力&quot;指不可预见、不可避免或不可克服的客观情况以及其他影响配送时间、造成包裹配送延误的客观情况，包括但不\r\n限于全国性或区域性空中或地面交通系统管制或中断（如天气原因等）、或通讯系统干扰或故障、或政府行为、邮政主管部门政策变化、战争、地震、台风、洪水、\r\n火灾、大雨、大雾等其他类似事件） &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 4)&nbsp;&nbsp;&nbsp;&nbsp;航空违禁品、手机、电子类产品、易碎品等因航空安检查验导致无法正常配载航班或改走陆路运输的； &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 5)&nbsp;&nbsp;&nbsp;&nbsp;寄递物品违反禁、限寄规定或有关运输管理条例，经有关部门没收或依照有关法规、规定处理的； &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 6)&nbsp;&nbsp;&nbsp;&nbsp;收件人地址为机关、单位等机构，而周六、周日和公众节假日不接收邮件、包裹，造成延误的； &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 7)&nbsp;&nbsp;&nbsp;&nbsp;收件人学校、单位或住宅小区不允许投递人员入内，或买家代收方原因，导致造成延误的；</p></li></ul><ul class=\" list-paddingleft-2\"><li><p>3、买家须知</p></li><li><p>1)&nbsp;&nbsp;&nbsp;&nbsp;如收货地址不在顺丰速运派送范围内时，且在商家店铺购买达到399元，商家需使用其它可送达快递为消费者提供免费物流配送服务； &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 2)&nbsp;&nbsp;&nbsp;&nbsp;寄递物品违反禁、限寄规定或有关运输管理条例，经有关部门没收或依照有关法规、规定处理的，不在补偿范围内； &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 3)&nbsp;&nbsp;&nbsp;&nbsp;顺丰速运的配送范围以本页公示的范围为准。港澳台及海外地区，大陆地区的部队（含武警）或受部队（含武警）管制的等顺丰不予收送快件的机构不在配送范围内。</p></li></ul><p><span class=\"title\">签收与验货</span><span class=\"english-title\">Receipt and inspection</span>\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p><ul class=\" list-paddingleft-2\"><li><p>1、开箱验货</p></li><li><p>签收时在付款后与配送人员当面核对：商品及配件、应付金额、商品数量\r\n及发货清单、发票（如有）、赠品（如有）等；如存在包装破损、商品错误、商品短缺、商品 \r\n存在质量问题等影响签收的因素，请您可以拒收全部或部分商品，相关的赠品，配件或捆绑商品应一起当场拒收；为了保护您的权益，建议您尽量不要委托他人代为\r\n签收；如由他人代为签收商品而没有在配送人员在场的情况下验货，则视为您所订购商品的包装无任何问题。</p></li></ul><ul class=\" list-paddingleft-2\"><li><p>2、签收与验货流程</p></li><li><p><img src=\"/Upload/ueditor/image/20160604/1465011453660021.jpg\" height=\"124\" width=\"624\"/>\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 1）&nbsp;&nbsp;&nbsp;&nbsp;付款及签收完毕后，请在配送人员在场的情况下，参照顾客签收单对商品数量、型号、外观、配件等依次进行核对验收； &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 2）&nbsp;&nbsp;&nbsp;&nbsp;若发现异常（如商品缺失、损坏、渗漏等），请务必让配送人员在顾客签收单上签字确认，并立即联系商家进行反馈和登记处理。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 3）&nbsp;&nbsp;&nbsp;&nbsp;如您在配送人员离开后再提出包裹外包装或封带异常，以及商品的型号、数量或外观等存在异常而要求退换货，此时因无法确认责任，将无法为您做进一步处理，请您谅解。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 4）&nbsp;&nbsp;&nbsp;&nbsp;货到付款的商品送达时，请您当面与配送员核对商品与款项，确保货、款两清；若您在配送员离开后发现款项有误，将无法为您核实处理。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 5）&nbsp;&nbsp;&nbsp;&nbsp;如配送人员以公司没有规定或着急送货等借口，不配合您进行验货和签字确认，请及时联系ZOL商城客服进行投诉，客服人员将会在第一时间为您处理；一旦出现此情况，为了维护您的权益，建议您先不要拆开包裹。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 6）&nbsp;&nbsp;&nbsp;&nbsp;为了保护您的权益，建议您尽量不要委托他人签收；如由他人代为签收商品而没有在配送人员在场的情况下验货，则视为您所订购商品的包装无任何问题。</p></li></ul><p><span class=\"title\">售后服务</span><span class=\"english-title\">After-sales Service</span>\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p><p>购买带有&quot;Z<span class=\"add-plus\">+</span>&quot;标识店铺的商品，售出产品有非人为质量问题凭有效检测报告、不影响商家二次销售的情况下可享受商品在自售出之日（以实际收货日期为准）起7日内无理由退换货、15日内换货的服务。如商家未履行所承诺的售后服务，您可根据ZOL商城&quot;先行赔付&quot;进行维权、获得赔偿。</p><ul class=\" list-paddingleft-2\"><li><p>内容声明</p></li><li><p>ZOL商城为第三方交易平台及互联网信息服务提供者，ZOL商城（含\r\n网站、移动端等）所展示的商品的标题、价格、详情等信息内容系由店铺经营者发布，其真实性、准确性和合法性均由店铺经营者负责。ZOL商城提醒用户购买商\r\n品前注意谨慎核实。如用户对商品的标题、价格、详情等任何信息有任何疑问的，请在购买前与店铺经营者沟通确认；ZOL商城存在海量店铺，如用户发现店铺内\r\n有任何违法/侵权信息，请立即向ZOL商城举报并提供有效线索。</p></li></ul><ul class=\" list-paddingleft-2\"><li><p>权利声明</p></li><li><p>注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！</p></li></ul><p><br/></p><p><br/></p>', '<h4 class=\"zbz-sevice-title\">售后服务</h4><p>购买带有&quot;Z&quot;标识店铺的商品，售出产品有非人为质量问题凭有效检测报告、不影响商家二次销售的情况下可享受商品在自售出之日（以实际收货日期为准）起7日内无理由退换货、15日内换货的服务。</p><ul class=\" list-paddingleft-2\"><li><p>1、赔付保障权益</p></li><li><p>如商家未履行所承诺的售后服务，您可根据ZOL商城&quot;先行赔付&quot;进行维权、获得赔偿。</p></li></ul><h4 class=\"zbz-sevice-title\" id=\"tuihuo\"><em class=\"ico-8\"></em>退换货说明</h4><ul class=\" list-paddingleft-2\"><li><p>1、退换货成立条件：</p></li><li><p>1）&nbsp;&nbsp;商品在国家三包政策范围内并且不影响二次销售。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 2）&nbsp;&nbsp;经由生产厂家认可的售后服务中心或国家认可的第三方质检平台检测确认的非人为商品质量问题，并出具检测报告(检测报告需由维权方出具，如维权方当地无检测条件的请联系卖家是否提供代检测服务)。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 3）&nbsp;&nbsp;当您购买的商品需要办理退换货时，商家会根据退换货规则在24小时内为您审核。</p></li></ul><ul class=\" list-paddingleft-2\"><li><p>2、退换货服务流程：</p></li><li><p><img src=\"/Upload/ueditor/image/20160604/1465011890261418.png\" height=\"271\" width=\"650\"/></p></li></ul><ul class=\" list-paddingleft-2\"><li><p>3、退换货规则说明：</p></li><li><table class=\"return-instructions\"><tbody><tr class=\"firstRow\"><th class=\"cell-1\">申请退换货的基本条件</th><th class=\"cell-2\">不允许申请退换货的情况</th></tr><tr><td class=\"cell-1\">退换商品应保持你收到商品时候的原貌</td><td class=\"cell-2\">除商品本身原因外的个人原因，如不喜欢、产品降价等</td></tr><tr><td class=\"cell-1\">退换商品应保持全新，相关附属配件齐全</td><td class=\"cell-2\">商品自身携带的商品序列号与商户售出时约定的不符（商户售出的商品序列号应与售出时约定的相符）</td></tr><tr><td class=\"cell-1\">保修卡等随货的书面材料没有填写和任何的污损、折叠</td><td class=\"cell-2\">商品质保标签、机身、包装、保修卡条码（S/N码）被涂改、撕毁、移动或无法辨认</td></tr><tr><td class=\"cell-1\">退换商品本身原包装应保持完整</td><td class=\"cell-2\">商品购买凭证、保修卡被退改、撕毁或丢失</td></tr><tr><td class=\"cell-1\">所退换的商品要求具有完整的外包装、原商品、附带商品</td><td class=\"cell-2\">未经同意自行拆卸、修理或升级引起的机器损坏</td></tr><tr><td class=\"cell-1\">收到商品与订单产品颜色、尺码、型号等不一致情</td><td class=\"cell-2\">未按商品说明要求使用、维护、保管而引起的机器损坏</td></tr><tr><td class=\"cell-1\">经由品牌商认可的售后服务中心或国家认可的第三方质检平台检测确认的商品问题，并出具有效测凭证</td><td class=\"cell-2\">机器结构因移动、跌落、碰撞、挤压而造成的故障或破损等人为损坏痕迹</td></tr><tr><td class=\"cell-1\">收到商品存在外观变形、损伤、少件等情况。少件指缺失主件或配件。提供第三方物流有效凭证（证明签收货物时商品即存在破损、少件等情况）</td><td class=\"cell-2\">商品配件缺损或包装有污染和严重积压痕迹</td></tr><tr><td rowspan=\"3\" class=\"cell-1\"><br/></td><td class=\"cell-2\">商品返回商户的过程中由于包装或运输操作不当造成损坏</td></tr><tr><td class=\"cell-2\">商品出厂时外包装有封条（以店铺及商品描述内容为准）</td></tr><tr><td class=\"cell-2\">因市场原因导致商品价格变动(以商品价格以拍下价格为准)</td></tr><tr><td colspan=\"2\">附注：买产品所赠礼品，不在本店退换货商品之列，且所送赠品不予折扣现金，抵价与退换！</td></tr></tbody></table></li></ul><ul class=\" list-paddingleft-2\"><li><p>4、退换货商品引起的运费问题:</p></li><li><p>1）&nbsp;&nbsp;非商品质量问题而由买家发起的七天无理由退换货行为，买家退货的商品应当完好，退回商品的来回所有运费由买家承担。如因商品质量问题而导致的7天\r\n退货，15天换货行为，退回商品的所有来回运费均由卖家承担。卖家和买家另有约定的，按照约定。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 2）&nbsp;&nbsp;售后商品经过检测后无质量问题，可以正常使用，商家一律使用顺丰到付返回。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 3）&nbsp;&nbsp;退、换商品经售后检测无质量问题寄回后，如在7天内问题依然出现，将按上次的申请生效，请联系商家说明并将商品寄回，商家承担来回运费。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 4）&nbsp;&nbsp;商城会根据检测结果判定谁来支付检测费用。</p></li></ul><ul class=\" list-paddingleft-2\"><li><p>5、赔付保障权益</p></li><li><p>如商家未履行所承诺的无理由退换货服务，您可根据ZOL商城&quot;先行赔付&quot;进行维权、获得赔偿。</p></li></ul><h4 class=\"zbz-sevice-title\"><em class=\"ico-9\"></em>如何退款</h4><ul class=\" list-paddingleft-2\"><li><p>1、退款流程：</p></li><li><p><img src=\"/Upload/ueditor/image/20160604/1465011890883399.png\" height=\"346\" width=\"650\"/></p></li></ul><ul class=\" list-paddingleft-2\"><li><p>2、退款说明</p></li><li><p>取消订单退款：如果您完成支付后取消订单，ZOL商城会在订单取消完成后1天内处理您的退款。如果您只取消了部分商品，会在剩余商品发货完成后1天内处理您的退款。</p></li></ul><ul class=\" list-paddingleft-2\"><li><p>3、赔付保障权益</p></li><li><p>如商家未履行所承诺的退款服务，您可根据ZOL商城&quot;先行赔付&quot;进行维权、获得赔偿。</p></li></ul><ul class=\" list-paddingleft-2\"><li><p>4、退款方式</p></li><li><table class=\"refund-way\"><tbody><tr class=\"firstRow\"><th class=\"cell-1\">支付方式</th><th class=\"cell-2\">退款方式</th><th class=\"cell-3\">退款处理时限</th></tr><tr><td class=\"cell-1\">支付宝</td><td class=\"cell-2\">支付宝账户</td><td class=\"cell-3\">1-2个工作日</td></tr><tr><td class=\"cell-1\">网上银行</td><td class=\"cell-2\">原借记卡帐户</td><td class=\"cell-3\">5-7个工作日</td></tr><tr><td class=\"cell-1\">信用卡</td><td class=\"cell-2\">原借记卡帐户</td><td class=\"cell-3\">7-15个工作日</td></tr></tbody></table><p><strong>注意：</strong>银行退款处理时限仅供您参考，具体退款到账时间依各银行、支付机构等的具体操作处理时间而定。</p><p><strong>各银行退款限制</strong>\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p></li><ul class=\"refund-limit list-paddingleft-2\" style=\"list-style-type: square;\"><li><p>支付宝不受理90天以前支付成功订单的退款申请</p></li><li><p>建设银行不受理148天以前支付成功订单的退款申请</p></li><li><p>中信银行信用卡不受理228天以前支付成功订单的退款申请</p></li><li><p>浦发银行不受理同一支付成功订单的多次退款申请</p></li><li><p>民生银行、浦发银行、中国邮政、中国农业银行不受理85天以前支付成功订单的退款申请</p></li><li><p>其他银行不受理365天前支付成功订单的退款申请</p></li><li><p>浦发银行、华夏银行、中国邮政不受理同一支付成功订单的多次退款申请</p></li></ul></ul><h4 class=\"zbz-sevice-title\"><em class=\"ico-10\"></em>交易条款</h4><p>Zol商城为增加买家与商家双方之间的信任与交流，规避交易过程中的风险和受骗可能，确保您和商家不受损失。ZOL商城采用统一收款方式来保障买家与卖家的双方利益。</p><p>1、客户在接受商品订购与送货的同时，在您消费之前有义务遵守以下交易条款。请您仔细阅读以下条款。</p><ul class=\" list-paddingleft-2\"><li><p>1）&nbsp;&nbsp;变化性</p></li><li><p>由于价格波动不可预知，以订单提交付款时的价格为标准；</p></li></ul><ul class=\" list-paddingleft-2\"><li><p>2）&nbsp;&nbsp;准确性</p></li><li><p>清楚准确地填写您的真实姓名、送货地址及联系方式；因如下情况造成订单延迟或无法配送等，ZOL商城将不承担责任； &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 1.客户提供错误信息和不详细的地址； &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 2.货物送达无人签收，由此造成的重复配送所产生的费用及相关的后果； &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 3.不可抗力，例如：自然灾害、交通戒严、突发战争等。</p></li></ul><ul class=\" list-paddingleft-2\"><li><p>3）&nbsp;&nbsp;安全性</p></li><li><p>我们会保证交易信息的安全。</p></li></ul><ul class=\" list-paddingleft-2\"><li><p>4）&nbsp;&nbsp;&nbsp;&nbsp;隐私权</p></li><li><p>ZOL商城尊重您的隐私权，在任何情况下，我们都不会将您的个人和订单信息出售或泄露给任何第三方（国家司法机关调取除外）。我们从线上得到的所有客户信息仅用来处理您的相关订单。</p></li></ul><ul class=\" list-paddingleft-2\"><li><p>5）&nbsp;&nbsp;免责</p></li><li><p>如因不可抗力或其它ZOL商城无法控制的原因使本平台销售系统崩溃或无法正常使用导致网上交易无法完成或丢失有关的信息、记录等，ZOL商城会尽可能合理地协助处理善后事宜，并努力使客户免受经济损失。</p></li></ul><ul class=\" list-paddingleft-2\"><li><p>6）&nbsp;&nbsp;客户监督</p></li><li><p>ZOL商城希望通过不懈努力，为客户提供优质服务，我们在给客户提供服务的全过程中接受客户的监督。</p></li></ul><ul class=\" list-paddingleft-2\"><li><p>7）&nbsp;&nbsp;争议处理</p></li><li><p>如果客户与ZOL商家之间发生任何争议，可依据当时双方所认定的协议或相关法律来解决。</p></li></ul><h4 class=\"zbz-sevice-title\" id=\"chengnuo\"><em class=\"ico-11\"></em>服务承诺</h4><p>网站所售产品均为正品，如有任何问题可与我们客服人员联系，我们会在第一时间跟您沟通处\r\n理。我们将争取以低的价格、优质的服务来满足您的需求。 \r\n由于部分商品包装更换较为频繁，因此您收到的货品有可能与图片不完全一致，请您以收到的商品实物为准，同时我们会尽量做到及时更新，由此给您带来不便多多\r\n谅解，谢谢！</p><p><br/></p>', '7');
INSERT INTO `product_detail` VALUES ('2', 'Upload/Content/16/06/93801464868049.png,Upload/Content/16/06/44861464868049.png,Upload/Content/16/06/21451464868048.png,Upload/Content/16/06/93791464868047.png,Upload/Content/16/06/10061464868046.png', '<p><a href=\"http://go.zol.com/topic/5062097.html\" target=\"_blank\">\r\n </a>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p><p><br/></p><p><img src=\"http://i3.mercrt.fd.zol-img.com.cn/g5/M00/0E/02/ChMkJlclnV2IMzbYAATNOgsEhl0AAQ3FQMNSoEABM1S879.png\" style=\"width: 443px; height: 345px;\" height=\"345\" width=\"443\"/></p><p><span class=\"title\">48小时发货</span><span class=\"english-title\">48 Hours</span>\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p><p>购买带有&quot;Z<span class=\"add-plus\">+</span>&quot;标识店铺的商品时，商家承诺您所下的订单，将在48小时内进行发货（部分商家节假日不发货），让您尽快收到商品。</p><ul class=\" list-paddingleft-2\"><li><p>1、赔付保障权益</p></li><li><p>如您的收货地址在商家承诺的服务区域内，商家承诺在下单后的48小时内将商品发出，从您下单时间开始计算，如超时未发出，您可根据ZOL商城“先行赔付”进行维权、获得赔偿。</p></li></ul><ul class=\" list-paddingleft-2\"><li><p>2、如何跟踪配送信息</p></li><li><p>配送信息可直接在您购买的商品订单中查看。或直接与卖家联系确认。您\r\n可以在商品详细页面查看入驻卖家联系信息，订单状态变为&quot;已发货&quot;后，点击查询&quot;物流状态&quot;即可查询到您所购买的商品的在途情况。或请您点击对应的物流承\r\n运商网站进行查询，快递单号可以登陆ZOL商城账号的订单管理中获取，建议发货后48小时后进行查询。查询方式如下： &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/>顺丰快递：服务热线&nbsp;&nbsp;&nbsp;&nbsp;95338&nbsp;&nbsp;&nbsp;&nbsp;快递单号由&quot;10&quot;或&quot;01&quot;开头的12位数字组成，例如：10******8888或01******9999。</p></li></ul><p><span class=\"title\">发票保障</span><span class=\"english-title\">Invoice</span>\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p><p>指买家在zol购买商品时，店铺内带有&quot;Z<span class=\"add-plus\">+</span>&quot;标识的店铺内所购买商品均带有正规商品发票。且使用该服务不向买家收取任何其他费用。</p><ul class=\" list-paddingleft-2\"><li><p>1、赔付保障权益</p></li><li><p>如商家未履行所承诺的发票保障服务，您可根据ZOL商城&quot;先行赔付&quot;进行维权、获得赔偿。</p></li></ul><ul class=\" list-paddingleft-2\"><li><p>2、发票的开具</p></li><li><p>1. 开具发票的金额以实际支付的金额为准。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/>2. ZOL提供的发票种类有为&quot;普通发票&quot;。</p></li></ul><ul class=\" list-paddingleft-2\"><li><p>3、普通发票</p></li><li><p>1. 个人及不具有一般纳税人资格的企业客户，均开具普通发票 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 2. 开具普通发票时，抬头默认为收货人&quot;个人姓名&quot;，请需要更改抬头的客户在修改信息中进行修改。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 3. 普通发票信息与您输入的信息一致的情况下，发票一经开出，恕不退换。</p></li></ul><ul class=\" list-paddingleft-2\"><li><p>4、开发票的注意事项</p></li><li><p>1.发票金额不能高于订单金额。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 2.为了享受厂商提供的质保服务，请您将商品发票开具为明细。如果您购买的是数码类、手机及配件、笔记本、台式机、家电类商品，为了保证您能充分享受生产厂家提供的售后服务（售后服务需根据发票确认您的购买日期），发票内容默认为您订购的商品明细。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 3.不同物流中心开具的发票无法合并。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 4.使用优惠券、积分的金额不开具发票。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 5.一个包裹对应一张发票或多张发票。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 6、销售产品均可开具正规机打发票（普通增值税发票），无需加税点，但为了保证发票不遗漏和错开，请下订单时在补充说明（或者卖家留言），留言注明：需开发票抬头XXX公司或者XXX人名。如忘记注明，请及时联系客服帮助备注。</p></li></ul><ul class=\" list-paddingleft-2\"><li><p>5、发票的退换</p></li><li><p>1. 如果您收到的发票与您输入的开票信息、订单信息不一致，请及时联系我们的客服人员，我们会及时为您联系商家解决您的问题。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> \r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;2.未经易ZOL商城人员的允许，客服部门将不接受电话、传真、邮件、邮寄等形式的重开发票申请，如您擅自将发票寄到我公司的任一办公地址，在寄送过程中\r\n发生的发票遗失、缺失等情况，恕我们概不负责。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/></p></li></ul><p><span class=\"title\">物流配送</span><span class=\"english-title\">Logistics</span>\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p><p>当您购买ZOL带有&quot;Z<span class=\"add-plus\">+</span>&quot;\r\n标识店铺，商家承诺全店商品满399元，如收货地址在顺丰速运(即顺丰速运（集团）有限公司及其子公司)所覆盖的派送区域内，均采用顺丰速运为消费者提供\r\n免费物流配送服务；如收货地址不在顺丰速运派送范围内时，商家需使用其它可送达快递为消费者提供免费物流配送服务。如在商家店铺未购买达到399元，除商\r\n家优惠外，物流费用由买家自己承担。</p><ul class=\" list-paddingleft-2\"><li><p>1、赔付保障权益</p></li><li><p>如商家向您收取物流费用，您可根据ZOL商城&quot;先行赔付&quot;进行维权、获得赔偿。</p></li></ul><ul class=\" list-paddingleft-2\"><li><p>2、因以下原因导致延误或退回的，不在此服务保障范围内：</p></li><li><p>1)&nbsp;&nbsp;&nbsp;&nbsp;部份城市的偏远地区因交通等问题，配送时间可能在预计到达时间基础上延后1-2天。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 2)&nbsp;&nbsp;&nbsp;&nbsp;因买家原因（更改收货地址、地址不详、地址错误、联系不上、拒收、无代收人等）导致包裹延误派送或无法送达的； &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 3)&nbsp;&nbsp;&nbsp;&nbsp;因不可抗力造成延误的（&quot;不可抗力&quot;指不可预见、不可避免或不可克服的客观情况以及其他影响配送时间、造成包裹配送延误的客观情况，包括但不\r\n限于全国性或区域性空中或地面交通系统管制或中断（如天气原因等）、或通讯系统干扰或故障、或政府行为、邮政主管部门政策变化、战争、地震、台风、洪水、\r\n火灾、大雨、大雾等其他类似事件） &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 4)&nbsp;&nbsp;&nbsp;&nbsp;航空违禁品、手机、电子类产品、易碎品等因航空安检查验导致无法正常配载航班或改走陆路运输的； &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 5)&nbsp;&nbsp;&nbsp;&nbsp;寄递物品违反禁、限寄规定或有关运输管理条例，经有关部门没收或依照有关法规、规定处理的； &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 6)&nbsp;&nbsp;&nbsp;&nbsp;收件人地址为机关、单位等机构，而周六、周日和公众节假日不接收邮件、包裹，造成延误的； &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 7)&nbsp;&nbsp;&nbsp;&nbsp;收件人学校、单位或住宅小区不允许投递人员入内，或买家代收方原因，导致造成延误的；</p></li></ul><ul class=\" list-paddingleft-2\"><li><p>3、买家须知</p></li><li><p>1)&nbsp;&nbsp;&nbsp;&nbsp;如收货地址不在顺丰速运派送范围内时，且在商家店铺购买达到399元，商家需使用其它可送达快递为消费者提供免费物流配送服务； &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 2)&nbsp;&nbsp;&nbsp;&nbsp;寄递物品违反禁、限寄规定或有关运输管理条例，经有关部门没收或依照有关法规、规定处理的，不在补偿范围内； &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 3)&nbsp;&nbsp;&nbsp;&nbsp;顺丰速运的配送范围以本页公示的范围为准。港澳台及海外地区，大陆地区的部队（含武警）或受部队（含武警）管制的等顺丰不予收送快件的机构不在配送范围内。</p></li></ul><p><span class=\"title\">签收与验货</span><span class=\"english-title\">Receipt and inspection</span>\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p><ul class=\" list-paddingleft-2\"><li><p>1、开箱验货</p></li><li><p>签收时在付款后与配送人员当面核对：商品及配件、应付金额、商品数量\r\n及发货清单、发票（如有）、赠品（如有）等；如存在包装破损、商品错误、商品短缺、商品 \r\n存在质量问题等影响签收的因素，请您可以拒收全部或部分商品，相关的赠品，配件或捆绑商品应一起当场拒收；为了保护您的权益，建议您尽量不要委托他人代为\r\n签收；如由他人代为签收商品而没有在配送人员在场的情况下验货，则视为您所订购商品的包装无任何问题。</p></li><li><p>2、签收与验货流程</p></li><li><p><img src=\"http://icon.zol-img.com.cn/newshop/shop/detail/youdian/img-2.jpg\" height=\"124\" width=\"624\"/>\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 1）&nbsp;&nbsp;&nbsp;&nbsp;付款及签收完毕后，请在配送人员在场的情况下，参照顾客签收单对商品数量、型号、外观、配件等依次进行核对验收； &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 2）&nbsp;&nbsp;&nbsp;&nbsp;若发现异常（如商品缺失、损坏、渗漏等），请务必让配送人员在顾客签收单上签字确认，并立即联系商家进行反馈和登记处理。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 3）&nbsp;&nbsp;&nbsp;&nbsp;如您在配送人员离开后再提出包裹外包装或封带异常，以及商品的型号、数量或外观等存在异常而要求退换货，此时因无法确认责任，将无法为您做进一步处理，请您谅解。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 4）&nbsp;&nbsp;&nbsp;&nbsp;货到付款的商品送达时，请您当面与配送员核对商品与款项，确保货、款两清；若您在配送员离开后发现款项有误，将无法为您核实处理。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 5）&nbsp;&nbsp;&nbsp;&nbsp;如配送人员以公司没有规定或着急送货等借口，不配合您进行验货和签字确认，请及时联系ZOL商城客服进行投诉，客服人员将会在第一时间为您处理；一旦出现此情况，为了维护您的权益，建议您先不要拆开包裹。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/> 6）&nbsp;&nbsp;&nbsp;&nbsp;为了保护您的权益，建议您尽量不要委托他人签收；如由他人代为签收商品而没有在配送人员在场的情况下验货，则视为您所订购商品的包装无任何问题。</p></li></ul>', '<p>购买带有&quot;Z<span class=\"add-plus\">+</span>&quot;标识店铺的商品，售出产品有非人为质量问题凭有效检测报告、不影响商家二次销售的情况下可享受商品在自售出之日（以实际收货日期为准）起7日内无理由退换货、15日内换货的服务。如商家未履行所承诺的售后服务，您可根据ZOL商城&quot;先行赔付&quot;进行维权、获得赔偿。</p><ul class=\" list-paddingleft-2\"><li><p>内容声明</p></li><li><p>ZOL商城为第三方交易平台及互联网信息服务提供者，ZOL商城（含\r\n网站、移动端等）所展示的商品的标题、价格、详情等信息内容系由店铺经营者发布，其真实性、准确性和合法性均由店铺经营者负责。ZOL商城提醒用户购买商\r\n品前注意谨慎核实。如用户对商品的标题、价格、详情等任何信息有任何疑问的，请在购买前与店铺经营者沟通确认；ZOL商城存在海量店铺，如用户发现店铺内\r\n有任何违法/侵权信息，请立即向ZOL商城举报并提供有效线索。</p></li></ul><ul class=\" list-paddingleft-2\"><li><p>权利声明</p></li><li><p>注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！</p></li></ul><p><br/></p>', '2');
INSERT INTO `product_detail` VALUES ('3', '', '<p>87987</p>', '<p>89789</p>', '3');
INSERT INTO `product_detail` VALUES ('4', '', '<p>878</p>', '<p>89</p>', '4');
INSERT INTO `product_detail` VALUES ('5', '', '<p>76</p>', '<p>7687</p>', '5');
INSERT INTO `product_detail` VALUES ('6', '', '<p>67</p>', '<p>76</p>', '6');

-- ----------------------------
-- Table structure for `property`
-- ----------------------------
DROP TABLE IF EXISTS `property`;
CREATE TABLE `property` (
  `pid` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键自增',
  `pname` char(50) NOT NULL DEFAULT '' COMMENT '属性名称',
  `value` varchar(45) NOT NULL DEFAULT '' COMMENT '属性值',
  `ptype` char(100) NOT NULL DEFAULT '',
  `type_tid` int(11) NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `fk_property_type_idx` (`type_tid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='类型属性表';

-- ----------------------------
-- Records of property
-- ----------------------------
INSERT INTO `property` VALUES ('1', '屏幕尺寸', '4寸|4.5寸|5寸|5.3寸|5.7寸|7寸|13寸|14寸|20寸|29寸', '0', '1');
INSERT INTO `property` VALUES ('2', '颜色', '星空灰|钻石白|翡翠绿|金色|灰色|黄色|白色|香槟金|皓月银', '1', '1');
INSERT INTO `property` VALUES ('3', '手机类型', '3G手机|4G手机|拍照手机|音乐手机', '0', '1');
INSERT INTO `property` VALUES ('4', '触摸屏类型', '电容屏|多点触控', '0', '1');
INSERT INTO `property` VALUES ('5', '上市时间', '2016年04月|2015年01月2014年09月', '0', '1');
INSERT INTO `property` VALUES ('6', '产品定位   ', '时尚轻薄本|影音娱乐本|Ultrabook笔记本', '0', '1');
INSERT INTO `property` VALUES ('7', '产品类型', '家用|办公|娱乐', '0', '1');
INSERT INTO `property` VALUES ('8', '操作系统', '预装Windows 10|  预装Windows 8| 预装Windows 7', '0', '1');
INSERT INTO `property` VALUES ('9', 'CPU系列', '英特尔 酷睿i5 6代系列|英特尔 酷睿i5 2代系列|英特尔 酷睿i5 1代系列', '0', '1');
INSERT INTO `property` VALUES ('10', 'CPU主频', '2.3GHz| 2.9GHz| 1.3GHz| 1.8GHz', '0', '1');
INSERT INTO `property` VALUES ('11', '核心/线程数', '双核心/四线程|双核心/二线程|四核心/四线程', '0', '1');
INSERT INTO `property` VALUES ('12', '内存容量  ', '4GB（4GB×1）|8GB（8GB×1）', '0', '1');
INSERT INTO `property` VALUES ('13', '保修政策', '全国联保，享受三包服务|商城联保，享受三包', '0', '1');
INSERT INTO `property` VALUES ('14', '套餐', '官方套餐|套餐一|套餐二', '1', '1');

-- ----------------------------
-- Table structure for `type`
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `tid` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键，自增',
  `tname` char(30) NOT NULL DEFAULT '' COMMENT '分类名称',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='类型表';

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES ('1', '数码类');
INSERT INTO `type` VALUES ('2', '生活类');
INSERT INTO `type` VALUES ('3', '其他类');

-- -----------------------------------------------------
-- Table `Mall`.`client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Mall`.`client` (
  `clid` INT NULL AUTO_INCREMENT COMMENT '主键',
  `cIdentification` CHAR(50) NOT NULL DEFAULT '' COMMENT '用户账号',
  `nickname` CHAR(50) NOT NULL DEFAULT '' COMMENT '昵称',
  `pwd` CHAR(32) NOT NULL DEFAULT '' COMMENT '密码',
  `mail` CHAR(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `address` CHAR(100) NOT NULL DEFAULT '' COMMENT '地址',
  `ceilphone` TINYINT NOT NULL DEFAULT 0 COMMENT '手机号',
  `fixphone` TINYINT NOT NULL DEFAULT 0 COMMENT '固话',
  PRIMARY KEY (`clid`))
ENGINE = MyISAM
COMMENT = '前台用户表';


-- -----------------------------------------------------
-- Table `Mall`.`order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Mall`.`order` (
  `orid` INT NULL AUTO_INCREMENT COMMENT '主键',
  `orderNumber` CHAR(50) NOT NULL DEFAULT '' COMMENT '订单号',
  `consignee` CHAR(50) NOT NULL DEFAULT '' COMMENT '收货人',
  `recieveAddress` VARCHAR(150) NOT NULL DEFAULT '' COMMENT '收货地址',
  `priceAggregate` DECIMAL(7,2) NOT NULL DEFAULT 0 COMMENT '价格总计',
  `riseTime` INT NOT NULL DEFAULT 0 COMMENT '生成时间',
  `remark` VARCHAR(150) NOT NULL DEFAULT '',
  `orderStatus` CHAR(50) NOT NULL DEFAULT '' COMMENT '订单状态',
  `client_clid` INT NOT NULL,
  PRIMARY KEY (`orid`),
  INDEX `fk_order_client1_idx` (`client_clid` ASC))
ENGINE = MyISAM
COMMENT = '订单表';


-- -----------------------------------------------------
-- Table `Mall`.`orderList`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Mall`.`orderList` (
  `oid` INT NULL AUTO_INCREMENT COMMENT '主键，自增',
  `amount` SMALLINT NOT NULL DEFAULT 0 COMMENT '数量',
  `subtotalPrice` DECIMAL(7,2) NOT NULL DEFAULT 0 COMMENT '价格小计',
  `descr` VARCHAR(300) NOT NULL DEFAULT '' COMMENT '备注说明',
  `goods_gid` INT NOT NULL,
  `order_orid` INT NOT NULL,
  PRIMARY KEY (`oid`),
  INDEX `fk_orderList_goods1_idx` (`goods_gid` ASC),
  INDEX `fk_orderList_order1_idx` (`order_orid` ASC))
ENGINE = MyISAM
COMMENT = '订单列表';


-- -----------------------------------------------------
-- Table `Mall`.`comment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Mall`.`comment` (
  `coid` INT NULL AUTO_INCREMENT COMMENT '主键',
  `title` CHAR(100) NOT NULL DEFAULT '' COMMENT '标题',
  `content` TEXT NULL COMMENT '内容',
  `stars` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '星级',
  `commentTime` INT NOT NULL DEFAULT 0 COMMENT '评论时间',
  `status` CHAR(50) NOT NULL DEFAULT '' COMMENT '审核状态',
  `goods_gid` INT NOT NULL,
  `client_clid` INT NOT NULL,
  PRIMARY KEY (`coid`),
  INDEX `fk_comment_goods1_idx` (`goods_gid` ASC),
  INDEX `fk_comment_client1_idx` (`client_clid` ASC))
ENGINE = MyISAM
COMMENT = '评论表';


-- -----------------------------------------------------
-- Table `Mall`.`receiptAddress`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Mall`.`receiptAddress` (
  `rid` INT NULL AUTO_INCREMENT COMMENT '主键自增',
  `consignee` CHAR(50) NOT NULL DEFAULT '' COMMENT '收货人',
  `inplace` CHAR(100) NOT NULL DEFAULT '' COMMENT '所在地区',
  `FullAddress` CHAR(150) NOT NULL DEFAULT '' COMMENT '详细地址',
  `rphone` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '手机号码',
  `rfixphone` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '固话',
  `client_clid` INT NOT NULL,
  PRIMARY KEY (`rid`),
  INDEX `fk_receiptAddress_client1_idx` (`client_clid` ASC))
ENGINE = MyISAM
COMMENT = '收货地址表';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
