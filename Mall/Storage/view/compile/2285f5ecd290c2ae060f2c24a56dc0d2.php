<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>ZOL商城-内容页</title>
	<link rel="stylesheet" type="text/css" href="./Public/Home/css/common.css"/>
	<link rel="stylesheet" type="text/css" href="./Public/Home/css/content.css"/>
	<link rel="stylesheet" type="text/css" href="./Public/Home/css/iconfont/iconfont.css"/>
	<script>
		var addPriceUrl = '<?php echo U('getPrice')?>';
	</script>
	<script src="./Public/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="./Public/Home/js/content.js" type="text/javascript" charset="utf-8"></script>
	<script src="./Public/Home/js/index.js" type="text/javascript" charset="utf-8"></script>
	<style>
		.glname:first-child{margin-top: 10px; display: block;border: 2px solid #C0C0C0;}
		.glname{display: none;}
		.act{border:2px solid red;}
	</style>
</head>
<body>
	<!--公共头部-->
	<div id="head">
		<div class="top">
			<div class="zc-login-info">
				<span class="zc-back-home">
					<a href="<?php echo U('Index/index')?>">商城首页</a>
				</span>
				<?php if(isset($_SESSION['nickname'])): ?>
				<span class="zc-login" title="qq_482s79c1638u">您好，<a href="" target="_blank"><?php echo $_SESSION['nickname']?></a></span>
				<a href="<?php echo U('Content/out')?>" class="login_act">退出</a>
				<?php else: ?>
				<span class="zc-login">
					Hi~欢迎来到ZOL商城，请
					<a href="<?php echo U('Login/index')?>">登录</a>
				</span>
				<span class="zc-register">
					<a href="<?php echo U('Reg/index')?>">免费注册</a>
				</span>
				<?php endif ?>
			</div>
			<ul class="zc-quick-menu">
				<li>
					<a href="<?php echo U('MyOrder/index')?>">我的订单</a>
				</li>
				<li class="zc-my-center">
					<a href="<?php echo U('MyOrder/center')?>" class="zc-hd">
						买家中心
						<i class="ico"></i>
					</a>
					<div class="zc-my-center-bd">
						<a href="" style="display: none;">
							我的优惠券
							<em>8</em>
						</a>
						<a href="">
							关注的店铺
							<em>29</em>
						</a>
						<a href="">
							关注的商品
							<em>47</em>
						</a>
					</div>
				</li>
				<li>
					<?php if(isset($_SESSION['cart'])): ?>
						<a href="<?php echo U('Cart/index')?>">
							购物车<em id="em"><?php echo $_SESSION['cart']['total_rows']?></em>件
						</a>
						<?php else: ?>
						<a href="<?php echo U('Cart/index')?>">
							购物车0件
						</a>
						<?php endif ?>
				</li>
				<li>
					<a href="">帮助中心</a>
				</li>
				<li class="zc-separator">|</li>
				<li class="zc-mobile">
					<a href="" class="zc-hd">
						手机商城
						<i class="ico"></i>
					</a>
					<div class="zc-mobile-bd">
						<img src="./Public/Home/images/2.png" alt="" height="130" width="130"/>
					</div>
				</li>
				<li>
					<a href="">中关村在线</a>
				</li>
				<li>
					<a href="">商家入驻</a>
				</li>
				<li class="lianxikefu">
					<a href="" class="zc-hd">
						联系客服
						<i class="ico"></i>
					</a>
					<div class="zc-service-tel">400-678-0068</div>
				</li>
			</ul>
		</div>
	</div>
	<!--头部结束-->
	<!--索引区域开始-->
	<div class="header">
		<div class="logo">
			<h1>
				<a href="" class="mall-logo" title="商城"></a>
			</h1>
			<p>
				中关村在线旗下网上商城	
			</p>
		</div>
		<div class="search-box">
			<form action="" method="get">
				<input type="hidden" value="List"/>
				<div class="search">
					<input class="search-text" type="text" name="" value="" />
					<input class="search-btn" type="submit" name="" value="搜索" />
				</div>
			</form>
			<!--搜索热词，搜索推荐-->
			<div class="hot-search">
				<a href="" target="_blank" title="苹果iPhone SE">苹果iPhone SE</a>
				<a href="" target="_blank" title="魅蓝metal">魅蓝metal</a>
				<a href="" target="_blank" title="乐视1S">乐视1S</a>
				<a href="" target="_blank" title="iPhone6">iPhone6</a>
				<a href="" target="_blank" title="三星A8000">三星A8000</a>
				<a href="" target="_blank" title="iPhone 6s">iPhone 6s</a>
			</div>
			<!--结束-->
		</div>
		<div class="ad-div">
			<a href="" target="_blank">
				<img src="./Public/Home/images/1.jpg" alt=""  height="60" width="180"/>
			</a>
		</div>
	</div>
	<!--索引区域结束-->
	<?php 
	 $cateModel= new \Common\Model\Cate;
	 $cateData=$cateModel->where("pid = 0")->get();
	
	 ?>
	<!--导航条部分开始-->
	<div class="nav-box">
		<div class="category-nav-container">
			<h2 class="category-nav-title">
				全部商品分类
				<i class="ico"></i>
			</h2>
		</div>
		<ul class="nav clearfix">
			<?php foreach ($cateData as $vo){?>
			<li class="current">
				<a href="<?php echo U('List/index',array('cid'=>$vo['cid']))?>"><?php echo $vo['cname']?></a>
			</li>
			<?php }?>
		</ul>
		<div class="nav-tips">
			<a href="">CES新品惠 智能穿戴低至89元</a>
		</div>
	</div>
	<!--导航结束-->
	
	<!--内容-->
	<div class="zs-wrapper">
		<?php 
		$gid=Q('get.gid',0,'intval');
		$goodsModel= new \Common\Model\Goods;
		$bandModel= new \Common\Model\Band;
		$newData=$goodsModel
		->join('band','band_bid','=','bid')
		->join('category','goods.category_cid','=','category.cid')
		->where("gid={$gid}")
		->get();
		 ?>
		<div class="zs-bread-crumbs">
			<?php foreach ($newData as $vb){?>
			<a href="./Public/Home/Index/index.html">首页</a>
			>
			<a href="./Public/Home/List/index.html"><?php echo $vb['cname']?></a>
			>
			<a href=""><?php echo $vb['bname']?></a>
			<?php }?>
		</div>
		<!--公共导航-->
		<form action="<?php echo U('Content/buynow')?>" class="forml"  method="post">
		<?php foreach ($goods as $v){?>
		<div class="zs-inner clearfix">
			<div class="zs-deal-detail">
				<div class="zs-focus">
					<div class="zs-big-pic left">
						<div class="box">
							
						</div>
						<div class="cover">
							
						</div>
						<a class="MagicZoom" href="">
							<img class="mid-img" src="<?php echo pathinfo($v['gallerys'][0]['mid'],PATHINFO_DIRNAME).'/'.pathinfo($v['gallerys'][0]['mid'],PATHINFO_BASENAME)?>" alt="" style="width:400px;height:400px;"  list="<?php echo $v['listpic'][0]?>"/>
							<input type="hidden" name="listpic" value="<?php echo pathinfo($v['gallerys'][0]['mid'],PATHINFO_DIRNAME).'/'.pathinfo($v['gallerys'][0]['mid'],PATHINFO_BASENAME)?>" />
						</a>
					</div>
					 <div class="right">
    					<img class="big-img img" src="<?php echo pathinfo($v['gallerys'][0]['big'],PATHINFO_DIRNAME).'/'.pathinfo($v['gallerys'][0]['big'],PATHINFO_BASENAME)?>" alt="" class="large"/>
    				 </div>
					<div class="zs-focus-thumb">
						<div class="zs-focus-list">
							<ul>
							<?php foreach ($v['gallerys'] as $v2){?>
								<li class="show">
									<?php 
										$info = pathinfo($v2['mid']);
										$big = $info['dirname'].'/big'.$info['basename'];
										$mid = $info['dirname'].'/mid'.$info['basename'];
										?>
									<a class="lit" imgs="<?php echo $mid?>,<?php echo $big?>" href="javascript:;"><img src="<?php echo pathinfo($v2['sml'],PATHINFO_DIRNAME).'/'.pathinfo($v2['sml'],PATHINFO_BASENAME)?>" alt=""  /></a>
									<i style="width:-4px;"></i>
								</li>
								<?php }?>
							</ul>
						</div>
					</div>
					<div class="zs-action clearfix">
						<a class="zs-collect" href="">
							<i></i>
							关注商品
						</a>
						<div class="zs-share-box">
							<a class="zs-complain" href="">
								<i></i>
								分享
							</a>
						</div>
					</div>
				</div>
				<div class="zs-deal-wrap">
					<!--商品标题-->
					<h3 class="zs-commodity-title" name="<?php echo $v['gname']?>" id="<?php echo $v['gid']?>" >
						<input type="hidden" name="gname" value="<?php echo $v['gname']?>" />
						<?php echo $v['gname']?>
					</h3>
					<!--价格-->
					<div class="zs-price-panel">
						<dl class="zs-sale-price">
							<dt>价格：</dt>
							<dd>
								<span class="zs-price">
									￥
									<em price="<?php echo $v['mprice']?>" class="mprice" ><?php echo $v['mprice']?></em>
									<input type="hidden" name="mprice" value="<?php echo $v['mprice']?>" />
								</span>
							</dd>
						</dl>
					</div>
					<!--交易区块-->
					<div class="zs-detail-infor">
						<dl class="zs-freight-a">
							<dt>配&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;送：</dt>
							<dd class="clearfix">
								<div class="zs-freight-area">
									<div class="area-selected-wrap clearfix">
										<div class="area-selected">
											<span class="area-name">北京</span>
										</div>
										<div class="area-selected-infor" style="display: block;">
											可送达，
											<strong class="bold">
												顺丰包邮
											</strong>
										</div>
									</div>
								</div>
							</dd>
						</dl>
						<dl class="zs-evaluate">
							<dt>评&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;价：</dt>
							<dd>
								<a href="">
									购买评价 
									<em>0</em>
								</a>
								<span class="line">|</span>
								<a href="">
									成交记录 
									<em>1</em>
								</a>
							</dd>
						</dl>
						<dl class="zs-service-bar">
							<dt>服务保障：</dt>
							<dd class="clearfix">
								由 
								<span style="color:#ff0000;">
									<a class="link" href="">盛通数码专营店</a>
								</span>
								 发货并承诺提供以下服务保障
							</dd>
							<dd>
								<ul class="clearfix">
									<li>
										<a href="">
											<i class="icon iconfont">&#xe602;</i>
                    <div class="name">行货保证</div>
											
										</a>
									</li>
									<li>
										<a href="">
											 <i class="icon iconfont">&#xe64b;</i>
                    <div class="name">发票保障</div>
										</a>
									</li>
									<li>
										<a href="">
											 <i class="icon iconfont">&#xe68f;</i>
                    <div class="name">顺丰包邮</div>
										</a>
									</li>
									<li>
										<a href="">
											  <i class="icon iconfont">&#xe607;</i>
                    <div class="name">无忧退换</div>
										</a>
									</li>
								</ul>
							</dd>
						</dl>
						<div class="zs-skin-inner">
							<!--颜色-->
							<?php foreach ($pro as $v4){?>
							<dl class="zs-colour-type zs-suit">
								<dt name="pname"><?php echo $v4[0]['pname']?>：</dt>
								<dd>
									<ul class="zs-options clearfix">
										<?php foreach ($v4 as $k=>$v3){?>
										<li class='cur<?php if($k==0){?>
                active
               <?php }?>' gpid="<?php echo $v3['gpid']?>">
											<input type="hidden" name="gpid" value="<?php echo $v3['gpid']?>" class="korea" />
											<input type="hidden" name="options" value="" />
											<span class="attr can-buy"  name="gpvalue">
												<input type="hidden" name="<?php echo $v4[0]['pname']?>" value="<?php echo $v3['gpvalue']?>" />
												<?php echo $v3['gpvalue']?>
												<i></i>
											</span>
										</li>
										<?php }?>
									</ul>
								</dd>
							</dl>
							<?php }?>
							<?php foreach ($list as $v5){?>
								<div class="zs-suit-infor glname" groupid="<?php echo $v5['grouppid']?>" name="glname"><?php echo $v5['glname']?></div>
								<input type="hidden" name="glname" value="<?php echo $v5['glname']?>" />
								<?php }?>
							<!--套餐-->
							
							<!--购买数量-->
							<dl class="zs-quantity">
								<dt>购买数量：</dt>
								<dd class="clearfix">
									<div class="amount-widget" id="count">
										<span class="zs-decrease zs-no-decrease  subtract"></span>
										<input name="num" class="zs-goods-number" type="text" value="1" num="num"/>
										<span class="zs-increase zs-no-increase plus"></span>
									</div>
									<span class="zs-part">
										件
										<em class="zs-goods-number-show">（限购2件）</em>
									</span>
								</dd>
							</dl>

							<div class="zs-deal-btn clearfix">
									<input type="hidden" name="gid" value="<?php echo $_GET['gid']?>" />
									<input class="zs-buy-now" type="submit" value="立即购买"/>
								</form>
								<!--<a class="zs-buy-now" href="">立即购买</a>-->
								
								
								<input type="hidden" name="gid" value="<?php echo $_GET['gid']?>" />
								<a  class="zs-store-buy cartIn" style="cursor: pointer;">加入购物车</a>
							</div>
							<!--加入购物车-->
	<div class="zs-layer-box" id="zs-shop-cart-box" style="display:none; ">
            <div class="zs-layer-body">
                <div class="zs-layer-hd"><i class="zs-close" ></i></div>
                <?php if(isset($_SESSION['clid'])){ ?>
                <div class="zs-layer-content">
                    <div class="zs-success">

                        <h3>商品已成功添加至购物车</h3>
                        <p>购物车共有<em id="zs-cart-number"></em>件商品，总价<em class="zs-total-price" id="zs-total-price"></em>元</p>
                    </div>
                </div>
                <div class="zs-layer-foot">
                    <!--form action="http://order.zol.com/index.php?c=Cart" method="post"-->
                    <form action="<?php echo U('Cart/index')?>" method="post">
                        <input name="buyType" type="hidden" value="2">
                        <input name="submit" type="submit" value="去购物车结算" class="zs-settlement-btn">
                        <a href="javascript:void(0)"class="shopstill">继续购物</a>
                        
                    </form>
                </div>
                <?php }else{?>
                	<h3>请点击登录</h3>
                	<a href="<?php echo U('Login/index')?>">登录</a>
                <?php } ?>
            </div>
        </div>
	<!--加入购物车-->
						</div>
					</div>
				</div>
			</div>
			
			<div class="zs-store-infor">
				<div class="zs-store-name">
					<h3>
						<a href="">盛通数码专营店</a>
					</h3>
				</div>
				<div class="zs-modbox">
					<div class="zs-modbox-hd">在线客服：</div>
					<ul class="zs-custom-service">
						<li>
							<a href="">
								<img src="./Public/Home/images/2.gif" alt="" />
							</a>
							<span>和我联系</span>
						</li>
						<li>
							<a href="">
								<img src="./Public/Home/images/2.gif" alt="" />
							</a>
							<span>和我联系</span>
						</li>
						<li>
							<a href="">
								<img src="./Public/Home/images/2.gif" alt="" />
							</a>
							<span>和我联系</span>
						</li>
					</ul>
				</div>
				<div class="zs-modbox">
					<ul class="zs-contact-way">
						<li>
							<span class="zs-label">客服电话：</span>
							<p>400-810-7771</p>
							<p>010-62684549</p>
						</li>
					</ul>
				</div>
				<div class="zs-modbox">
					<ul class="zs-contact-way">
						<li>
							<span class="zs-label">接待时间：</span>
							<p>9:00-17:30</p>
						</li>
					</ul>
				</div>
				<div class="zs-modbox">
					<ul class="zs-contact-way">
						<li>
							<span class="zs-label">店铺30天退款率：</span>
							<p style="margin-left: 40px;">27.27%</p>
						</li>
					</ul>
				</div>
				<div class="zs-modbox">
					<div class="zs-modbox-hd">店铺动态评分：</div>
					<ul class="zs-store-score">
						<li>
							描述:
							<em class="below">4.9</em>
							<span class="below">低于</span>
							同行2.50%
						</li>
						<li>
							服务:
							<em class="below">4.9</em>
							<span class="below">低于</span>
							同行2.50%
						</li>
						<li>
							物流:
							<em class="flat">4.9</em>
							<span class="flat">持平</span>
							同行2.50%
						</li>
					</ul>
				</div>
				<div class="zs-collect-box">
					<a class="zs-btn" href="">进入店铺</a>
					<a class="zs-btn" href="">关注店铺</a>
				</div>
			</div>
		</div>
		<?php }?>
		<!--店铺热卖-->
		<div class="zs-box">
			<div class="zs-modbox-hd">店铺热卖</div>
			<ul class="zs-product-list clearfix">
				<?php foreach ($newGoods as $v7){?>
				<li>
					<a href="<?php echo U('Content/index',array('gid'=>$v7['gid']))?>">
						<span class="zs-pic">
							<img src="<?php echo $v7['listpic']?>" alt="" style="width: 150px;height: 150px;"/>
						</span>
						<span class="zs-title"><?php echo $v7['gname']?></span>
					</a>
					<div class="zs-price">
						￥
						<span><?php echo $v7['mprice']?></span>
					</div>
				</li>
				<?php }?>
				
			</ul>
		</div>
	</div>
	<!--店铺优惠-->
	<div class="wrapper clearfix dianpu">
		<!--左边内容-->
		<div class="zs-side">
			<!--搜索店内商品--> 
			<div class="zs-modbox">
				<div class="zs-modbox-hd">搜索店内商品</div>
				<div class="searchgoods">
					<dl>
						<dt>商品名：</dt>
						<dd>
							<input class="text" type="text" />
						</dd>
					</dl>
					<dl class="searchprice">
						<dt>价&nbsp;&nbsp;&nbsp;格：</dt>
						<dd>
							<input class="text" type="text" />
							<span>到</span>
							<input class="text" type="text" />
						</dd>
					</dl>
					<input class="goodsbtn" value="搜索" type="submit" />
				</div>
			</div>
			<!--商品分类-->
			<div class="zs-modbox">
				<h2 class="zs-modbox-hd">商品分类</h2>
				<div class="goods-category">
					<dl class="all-goods">
						<dt class="dt">
							<a class="manu-url" href="" style="cursor: pointer; text-decoration: none; color: rgb(51, 51, 51);font-weight: bold;font-size: 14px;">查看全部商品</a>
						</dt>
						<dd>
							<a href="">按关注</a>
							<a href="">按价格</a>
							<a href="">按时间</a>
						</dd>
					</dl>
					<dl class="unfold zp-goods-category">
						<dt>
							<h3>手机</h3>
						</dt>
						<dd>
							<ul>
								<li>
									<a href="">Apple（苹果）</a>
								</li>
								<li>
									<a href="">MEIZU（魅族）</a>
								</li>
								<li>
									<a href="">华为</a>
								</li>
								<li>
									<a href="">Samsung（三星）</a>
								</li>
							</ul>
							
						</dd>
					</dl>
				</div>
			</div>
			<!--看了还看-->
			<div class="zs-modbox">
				<div class="zs-modbox-hd">看了还看</div>
				<ul class="zs-sales-news">
					<li>
						<a class="z_lookmore_class" href="<?php echo U('Content/index',array('gid'=>$newGoods[0]['gid']))?>">
							<img src="<?php echo $newGoods[0]['listpic']?>" alt="" style="width:168px;"/>
						</a>
						<div class="zs-price">
							<span class="zs-sale-price">
								￥
								<em><?php echo $newGoods[0]['mprice']?></em>
							</span>
						</div>
						<span class="title">
							<a href="<?php echo U('Content/index',array('gid'=>$newGoods[0]['gid']))?>"><?php echo $newGoods[0]['gname']?></a>
						</span>
					</li>
				</ul>
			</div>
			<!--宝贝排行榜-->
			<div class="zs-modbox">
				<div class="zs-modbox-hd">宝贝排行榜</div>
				<ul class="side-tab clearfix zs-rankingtab ">
					<li class="current">热销TOP5</li>
					<li>人气TOP5</li>
				</ul>
				<ul class="ranking-list" style="display: block;">
					<?php foreach ($newGoods as $var){?>
					<li>
						<a class="pic" href="<?php echo U('Content/index',array('gid'=>$var['gid']))?>">
							<img src="<?php echo $var['listpic']?>" alt="" style="width: 60px;height: 60px;"/>
						</a>
						<div class="title">
							<a href="<?php echo U('Content/index',array('gid'=>$var['gid']))?>"><?php echo $var['gname']?></a>
						</div>
						<span class="price"><?php echo $var['mprice']?></span>
						<span class="sale-number">
							已售出
							<em><?php echo $var['click']?></em>
						</span>
					</li>
					<?php }?>
				</ul>
			</div>
		</div>
		<!--右侧内容-->
		<div class="zs-main zs-suck-top">
			<div class="zs-tabbar zs-tabbar-nav clearfix">
				<ul class="clearfix">
					<li class="cur">
						<a href="">商品详情</a>
					</li>
					<li>
						<a href="">参数</a>
					</li>
					<li>
						<a href="">
							购买评价
							<em>0</em>
						</a>
					</li>
					<li>
						<a href="">
							成交记录
							<em>1</em>
						</a>
					</li>
					<li>
						<a href="">留言</a>
					</li>
					<li>
						<a href="">商城服务承诺</a>
					</li>
					<li>
						<div class="phone-purchase">
							<a href="">
								手机购买
								<i class="ico"></i>
							</a>
							<div class="code">
								<img src="./Public/Home/images/20.png" alt="" height="91" width="91"/>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<!--中间内容-->
			<div class="zs-container">
				<div class="zs-goods-detail">
					<ul class="zs-attributes-list">
						<li>
							<span>官方标配：</span>
							主机x1 耳机x1 数据线x1 充电器x1 保修卡x1 说明书x1 取卡针x1 保护壳x1
						</li>
					</ul>
					<!--<?php foreach ($goods as $v6){?>
						<div class="sevice-banner">
								<?php echo $v6['detail']?>
						</div>
					<?php }?>-->
					<div class="sevice-title">
						<span class="title">商品介绍</span>
						<span class="english-title">Products</span>
					</div>
					<div class="service-content">
						<div class="zs-goods-content">
							<p>
								<img src="./Public/Home/images/43.jpg" alt="" />
							</p>
						</div>
					</div>
				</div>
				<div class="zs-comment-mod">
					<div class="detail-head">
						<div class="title">
							<h4>累计评价(0)</h4>
						</div>
						<div class="detail-head-filter clearfix">
							<div class="checks">
								<label class="cur" for="">
									<input checked="" type="radio" />
									全部评价 (0)
								</label>
								<label for="">
									<input type="radio" />
									好评 (0)
								</label>
								<label for="">
									<input type="radio" />
									中评 (0)
								</label>
								<label for="">
									<input type="radio" />
									差评 (0)
								</label>
							</div>
						</div>
					</div>
					<div class="intro_cont">
						<div id="review_list">
							<div class="zs-no-comment-prompt">
								新品上架，暂未有人评价过，
								<a href="">返回顶部</a>
								看看商品怎么样
							</div>
						</div>
					</div>
				</div>
				<!--交易记录-->
				<div class="zs-purchase-record">
					<div class="detail-head">
						<div class="title">
							<h4>累计成交记录(1)</h4>
						</div>
						<div class="detail-head-filter clearfix">
							<div class="checks">
								<label for="">
									<input type="radio" />
									近30天成交记录(1件)
								</label>
								<label class="cur" for="">
									<input checked="" type="radio" />
									累计成交记录(1件)
								</label>
							</div>
						</div>
					</div>
					<div style="display:block;">
						<table>
							<tbody>
								<tr>
									<th class="zs-cell-buyer">买家</th>
									<th class="zs-cell-sku">款式和型号</th>
									<th class="zs-cell-amount">数量</th>
									<th class="zs-cell-time">成交时间</th>
								</tr>
								<tr>
									<td class="zs-cell-buyer">qq_****6f8wg2</td>
									<td class="zs-cell-type">
										<p>【顺丰包邮+送蓝牙耳机和精美自拍杆】华为 P9（高配版/全网通）主屏尺寸：5.2英寸 主屏分辨率：1920x1080徕卡摄像头 华为P9</p>
										<p>官方标配：陶瓷白</p>
									</td>
									<td class="zs-cell-amount">1</td>
									<td class="zs-cell-time">2016-04-28成交 </td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!--用户留言-->
				<div class="zs-message-mod" style="display:block">
					<div class="detail-head">
						<div class="title">
							<h4>留言咨询(0)</h4>
						</div>
						<div class="detail-head-filter clearfix">
							<div class="checks">
								<label class="cur" for="">
									<input checked="" type="radio" />
									商品咨询
								</label>
								<label for="">
									<input type="radio" />
									库存与配送
								</label>
								<label for="">
									<input type="radio" />
									支付问题
								</label>
								<label for="">
									<input type="radio" />
									发票与保修
								</label>
								<label for="">
									<input type="radio" />
									促销及赠品
								</label>
								<label for="">
									<input type="radio" />
									其他
								</label>
							</div>
							<a class="ask-link" href="" style="float: right;line-height: 26px;color: #36c;">我要咨询</a>
						</div>
					</div>
					<ul class="ask-list">
						<div class="zs-no-comment-prompt">暂无咨询记录，有问题可以在下面留言给商家</div>
					</ul>
					<div class="zs-enter-message">
						<div class="detail-head">
							<div class="title">
								<h4>咨询框</h4>
								<span class="close"></span>
							</div>
							<div class="detail-head-filter clearfix">
							<div class="checks">
								<label class="cur" for="">
									<input checked="" type="radio" />
									全部咨询
								</label>
								<label for="">
									<input type="radio" />
									商品咨询
								</label>
								<label for="">
									<input type="radio" />
									库存与配送
								</label>
								<label for="">
									<input type="radio" />
									支付问题
								</label>
								<label for="">
									<input type="radio" />
									发票与保修
								</label>
								<label for="">
									<input type="radio" />
									促销及赠品
								</label>
								<label for="">
									<input type="radio" />
									其他
								</label>
							</div>
						</div>
						<div class="zs-messagebox">
							<textarea name="" rows="" cols=""></textarea>
							<div class="zs-question-foot clearfix">
								<label for="">
									<input type="checkbox" />
									仅商家可见
								</label>
								<span>（选择后，您的留言只有商家可以看到，建议您在询问价格等隐私信息时选择）</span>
								<a class="zs-publish-btn" href="">发表留言</a>
								<span class="zs-number">
									<em>0</em>
									/200
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--右侧导航栏-->
		<div class="zs-sidebar">
			<div class="zs-quick-menu">
				<ul style="display: block;">
					<li class="cur">
						<a href="">商品介绍</a>
					</li>
					<li>
						<a href="">48小时发货</a>
					</li>
					<li>
						<a href="">发票保障</a>
					</li>
					<li>
						<a href="">物流配送</a>
					</li>
					<li>
						<a href="">签收与验货</a>
					</li>
					<li>
						<a href="">售后服务</a>
					</li>
					<li>
						<a href="">服务详情</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
	<!--底部-->
	<div class="footer">
		<div class="wrapper">
			<div class="footer-service-relate clearfix">
				<dl class="cooperation">
					<dt>商家合作</dt>
					<dd>
						<p>错过天猫？别再错过我们！</p>
						<p>ZOL商城开启全新旅程！</p>
						<a href="" class="btn">
							<span>关于入驻</span>
							>
						</a>
					</dd>
				</dl>
				<dl class="hotline">
					<dt>400-678-0068</dt>
					<dd>
						<p>工作日 9:00 - 18:00</p>
						<a class="weibo" href="">关注新浪微博</a>
					</dd>
				</dl>
				<dl>
					<dt>购物指南</dt>
					<dd>
						<p>
							<a href="">帐号注册</a>
						</p>
						<p>
							<a href="">购物流程</a>
						</p>
						<p>
							<a href="">付款方式</a>
						</p>
					</dd>
				</dl>
				<dl>
					<dt>购物指南</dt>
					<dd>
						<p>
							<a href="">帐号注册</a>
						</p>
						<p>
							<a href="">购物流程</a>
						</p>
						<p>
							<a href="">付款方式</a>
						</p>
					</dd>
				</dl>
				<dl>
					<dt>购物指南</dt>
					<dd>
						<p>
							<a href="">帐号注册</a>
						</p>
						<p>
							<a href="">购物流程</a>
						</p>
						<p>
							<a href="">付款方式</a>
						</p>
					</dd>
				</dl>
				<dl>
					<dt>购物指南</dt>
					<dd>
						<p>
							<a href="">帐号注册</a>
						</p>
						<p>
							<a href="">购物流程</a>
						</p>
						<p>
							<a href="">付款方式</a>
						</p>
					</dd>
				</dl>
			</div>
		</div>
		<div class="footer-nav-bar">
			<div class="wrapper">
				<div class="footer-nav">
					<a href="">中关村在线</a>
					|
					<a href="">中关村在线</a>
					|
					<a href="">中关村在线</a>
					|
					<a href="">中关村在线</a>
					|
					<a href="">中关村在线</a>
					|
					<a href="">中关村在线</a>
				</div>
				<div class="copyright">
					<a href="">关于ZOL商城</a>
					|
					<a href="">关于ZOL商城</a>
					|
					<a href="">关于ZOL商城</a>
					|
					<a href="">关于ZOL商城</a>
					<span>©2016 中关村在线 版权所有. 京ICP备09041801号-182 京ICP证010391号</span>
				</div>
				<div class="authentication clearfix">
					<a href="">
						<img src="./Public/Home/images/18.jpg" alt="" height="32" width="85"/>
					</a>
					<a href="">
						<img src="./Public/Home/images/19.jpg" alt="" height="32" width="85"/>
					</a>
					<a href="">
						<img src="./Public/Home/images/20.jpg" alt="" height="32" width="85"/>
					</a>
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>














