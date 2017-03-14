<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>ZOL商城-买家中心</title>
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/center.css"/>
	</head>
	<body>
		<!--顶部-->
		<div class="topbar">
			<div class="wrapper clearfix">
				<div class="znav_link">
					<a href="">中关村在线</a>
					|
					<a href="<?php echo U('Index/index')?>">中关村商城</a>
					|
					<a href="">Z团</a>
					|
					<a href="">经销商</a>
				</div>
				<ul class="zlogin clearfix" style=" display:block;">
					<li class="login">
						您好,
						<a href=""><?php echo $_SESSION['nickname']?></a>
						!
						<span class="login_act">
							[
							<a href="<?php echo U('Index/out')?>">退出</a>
							]
						</span>
					</li>
					<li class="buyer_center">
						<span>
							<a href="<?php echo U('MyOrder/center')?>">买家中心</a>
						</span>
					</li>
					<li>
						<span class="my-cart">
							<a href="<?php echo U('Cart/index')?>">
								<?php if(isset($_SESSION['cart'])): ?>
							<a href="<?php echo U('Cart/index')?>">
							购物车<?php echo $_SESSION['cart']['total_rows']?>件
							</a>
							<?php else: ?>
								我的购物车(
								<em>0</em>
								)
							</a>
							<?php endif ?>
						</span>
					</li>
					<li>
						<span class="my-cart">
							<a href="">
								消息中心(
								<em>0</em>
								)
							</a>
						</span>
					</li>
					<li>
						<a href="">帮助中心</a>
					</li>
				</ul>
			</div>
		</div>
		<!--头部-->
		<div class="header">
			<div class="wrapper clearfix">
				<a class="logo" href=""></a>
				<a class="index" href="./index.html">首页</a>
				<a class="message" href="">
					消息
					<i class="no-read-message">0</i>
				</a>
				<div class="searchbox">
					<form action="" method="GET">
						<div class="searchmod">
							<input class="searchtext" type="text" placeholder="搜索商品/店铺"/>
						</div>
						<input class="searchbtn" type="submit" value="搜索"/>
					</form>
				</div>
			</div>
		</div>
		<!--内容-->
		<div class="wrapper clearfix contain">
			<ul class="left-bar shadow">
				<li class="item-name">
					<i class="item-icon icon1"></i>
					<a href="">订单中心</a>
					<ul class="item-branch">
						<li>
							<a href="<?php echo U('MyOrder/index')?>">我的订单</a>
						</li>
						<li>
							<a href="">团购订单</a>
						</li>
						<li>
							<a href="">评价管理</a>
						</li>
					</ul>
				</li>
				<li class="item-name">
					<i class="item-icon icon2"></i>
					<a href="">我的关注</a>
					<ul class="item-branch">
						<li>
							<a href="">关注的商家</a>
						</li>
						<li>
							<a href="">关注的商品</a>
						</li>
					</ul>
				</li>
				<li class="item-name">
					<i class="item-icon icon3"></i>
					<a href="">我的优惠</a>
					<ul class="item-branch">
						<li>
							<a href="">团购优惠卷</a>
						</li>
						<li>
							<a href="">我的红包</a>
						</li>
					</ul>
				</li>
				<li class="item-name">
					<i class="item-icon icon4"></i>
					<a href="">消息中心</a>
					<ul class="item-branch">
						<li>
							<a href="">我的信息</a>
						</li>
					</ul>
				</li>
				<li class="item-name">
					<i class="item-icon icon5"></i>
					<a href="">个人设置</a>
					<ul class="item-branch">
						<li>
							<a href="<?php echo U('MyOrder/address')?>">收货地址管理</a>
						</li>
						<li>
							<a href="./selfInfo.html">ZOL个人中心</a>
						</li>
					</ul>
				</li>
				<li class="item-name">
					<i class="item-icon icon6"></i>
					<a href="">售后服务</a>
					<ul class="item-branch">
						<li>
							<a href="">投诉维权</a>
						</li>
					</ul>
				</li>
				<li class="item-name">
					<i class="item-icon icon7"></i>
					<a href="">特色频道</a>
					<ul class="item-branch">
						<li>
							<a href="">Z团</a>
						</li>
						<li>
							<a href="">DIY攒机馆</a>
						</li>
						<li>
							<a href="">手机馆</a>
						</li>
						<li>
							<a href="">限时抢购</a>
						</li>
						<li>
							<a href="">ZOL商城服务说明</a>
						</li>
					</ul>
				</li>
			</ul>
			<div class="right-content">
				<div class="self-detail">
					<ul class="self-tab clearfix">
						<li class="user-name">
							<i>
								<img src="./Public/Home/images/37.jpg" alt="" height="60" width="60"/>
							</i>
							zol_207yl436160h83t
						</li>
						<li>
							<a href="">
								关注的商品
								<em>0</em>
							</a>
						</li>
						<li>
							<a href="">
								关注的店铺
								<em>0</em>
							</a>
						</li>
					</ul>
					<ul class="order-tab clearfix">
						<li>
							<a class="selected" href="<?php echo U('MyOrder/index')?>">我的订单</a>
						</li>
						<li>
							<a href="">团购订单</a>
						</li>
					</ul>
					<ul class="classify clearfix">
						<li>
							<a href="">
								<span>
									待付款
									<em>0</em>
								</span>
								<i class="icon1"></i>
							</a>
						</li>
						<li>
							<a href="">
								<span>
									待发货
									<em>0</em>
								</span>
								<i class="icon2"></i>
							</a>
						</li>
						<li>
							<a href="">
								<span>
									待收货
									<em>0</em>
								</span>
								<i class="icon3"></i>
							</a>
						</li>
						<li>
							<a href="">
								<span>
									待评价
									<em>0</em>
								</span>
								<i class="icon4"></i>
							</a>
						</li>
					</ul>
				</div>
				<!--我关注的商品-->
				<div class="buyer-section">
					<div class="section-title clearfix">
						<h4>
							我关注的商品
							<em>0</em>
						</h4>
						<a class="refresh" href="">查看全部</a>
					</div>
					<div class="clearfix selection">
						<label for=""></label>
					</div>
					<ul class="clearfix buyer-list">
						<li></li>
					</ul>
				</div>
				<!--猜你喜欢-->
				<div class="shadow">
					<div class="section-title recommend-tab clearfix">
						<ul>
							<li>
								<a class="selected" href="">猜你喜欢</a>
							</li>
							<li>
								<a class="track" class="selected" href="">我的足迹</a>
							</li>
							<li>
								<a href="">活动推荐</a>
							</li>
						</ul>
					</div>
				</div>
				<!--猜你喜欢-->
					<div id="zp-goods-recommend" style="overflow: hidden; padding: 0 15px;">
					    <ul style="dispaly:none;list-style-type: none;">
					        <li></li>
					    </ul>
					    <ul class="clearfix buyer-list recommend-content" id="zs-you-like" style="display: block;">
					    	<?php foreach ($go as $v){?>
					    	<li>
					    		<a href="<?php echo U('Content/index',array('gid'=>$v['gid']))?>" target="_blank">
					    			<img src="<?php echo $v['listpic']?>" alt="" width="180" height="180">
					    				<p class="price">
					    					<em>￥</em> 
					    					<?php echo $v['mprice']?>
					    				</p>
					    				<p class="des">
					    					<?php echo $v['gname']?>
					    				</p>
					    				<span class="num">
					    					<em>0</em>
					    					人已购买
					    				</span>
					    		</a>
					    	</li>
					    	<?php }?>
					    </ul>
					</div>
					<!--猜你喜欢-->
					
				<div class="try-block shadow">
					<h4>没找到想要的？  可以试试这些</h4>
					<ul class="clearfix">
						<li>
							<a href="">苹果iPhone SE</a>
						</li>
						<li>
							<a href="">苹果iPhone SE</a>
						</li>
						<li>
							<a href="">苹果iPhone SE</a>
						</li>
						<li>
							<a href="">苹果iPhone SE</a>
						</li>
						<li>
							<a href="">苹果iPhone SE</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!--底部-->
		<div class="footer ">
			<div class="footer-nav-bar">
				<div class="wrapper">
					<div class="partners" style="height:auto;">
						<span class="label">合作伙伴：</span>
						<p>
							<a href="">卷皮网</a>
							|
							<a href="">卷皮网</a>
							|
							<a href="">卷皮网</a>
							|
							<a href="">卷皮网</a>
							|
							<a href="">卷皮网</a>
							|
							<a href="">卷皮网</a>
							|
							<a href="">卷皮网</a>
							|
							<a href="">卷皮网</a>
							|
							<a href="">卷皮网</a>
							|
							<a href="">卷皮网</a>
							|
							<a href="">卷皮网</a>
							|
							<a href="">卷皮网</a>
							|
							<a href="">卷皮网</a>
							|
							<a href="">卷皮网</a>
							|
							
							<a href="">卷皮网</a>
							|
							<a href="">卷皮网</a>
							|
							<a href="">卷皮网</a>
						</p>
					</div>
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













