<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>ZOL商城-买家中心-订单中心</title>
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/myorder.css"/>
		<script src="./Public/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/Home/js/sweetalert.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="./Public/Home/js/sweetalert.css"/>
		<script src="./Public/Home/js/myorder.js" type="text/javascript" charset="utf-8"></script>
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
							<?php if(isset($_SESSION['cart'])): ?>
							<a href="<?php echo U('Cart/index')?>">
							购物车<?php echo $_SESSION['cart']['total_rows']?>件
						</a>
						<?php else: ?>
							<a href="<?php echo U('Cart/index')?>">
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
				<a class="index" href="./Public/Home/./Public/Home/Index/Index.html">首页</a>
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
					<a href="./Public/Home/center.html">订单中心</a>
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
							<a href="./Public/Home/Myziliao/index.html">ZOL个人中心</a>
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
			<div class="right-content order-section">
				<div class="self-detail">
					<div class="order-block">
						<ul class="order-tab clearfix">
							<li>
								<a class="selected" href="<?php echo U('MyOrder/index')?>">我的订单</a>
							</li>
							<li>
								<a href="">团购订单</a>
							</li>
						</ul>
					</div>
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
					<table class="order-title order-table">
						<tbody>
							<tr>
								<td class="cell1">商品信息</td>
								<td class="cell2">单价（元）</td>
								<td class="cell3">数量</td>
								<td class="cell4">售后</td>
								<td class="cell5">实付款（元）</td>	
								<td class="cell6 status">
									<span>
										全部状态
										<i></i>
									</span>
								</td>
								<td class="cell7">操作</td>
							</tr>
						</tbody>
					</table>
					<?php foreach ($list as $v){?>
					<div class="addition clearfix">
                        <p class="message">
                        	<span class="gray orid" orid="<?php echo $v['orid']?>">订单号：</span>
                        	<span><?php echo $v['orderNumber']?></span>
                        	<input type="hidden" class="hao" value="<?php echo $v['orderNumber']?>" />
                        </p>
                        <p class="message time">
                        	<span class="gray">下单时间：</span>
                        	<?php echo date('Y-m-d H:i:s',$v['riseTime'])?>
                        </p>
                        <div class="message store">
                            <span class="gray">店铺：</span>
                            <span class="store-name"><i></i>诚实青年数码专营店</span>
                            <a class="bao" title="点击“生意宝”开始交谈" href="">
                            	<img alt="" width="21" height="21" src="./Public/Home/images/33.png">
                            </a>
                            <a class="bao" href="" target="_blank">
                            	<img border="0" title="点击这里给我发消息" alt="点击这里给我发消息" src="./Public/Home/images/2.gif">
                            </a>
                        </div>
                        <span class="cancel-order" orid="<?php echo $v['orid']?>" orderNumber="<?php echo $v['orderNumber']?>" consignee="<?php echo $v['consignee']?>" recieveAddress="<?php echo $v['recieveAddress']?>" riseTime="<?php echo $v['riseTime']?>" orderStatus="<?php echo $v['orderStatus']?>" clid="<?php echo $_SESSION['clid']?>" remark="<?php echo $v['remark']?>" priceAggregate="<?php echo $v['priceAggregate']?>">
                            <a class="order-cancel" href="javascript:void(0)" onclick="">
                             	   取消订单
                            </a>
                        </span>
                </div>
                <table class="order-content order-table">
                        <tbody>
                        <?php foreach ($v['son'] as $vttt){?>
                            <tr>
                                <td class="product-detail">
                                    <div class="clearfix">
                                    <a href="" class="pic" target="_blank">                                     
                                        <img alt="" src="<?php echo $vttt['goods_listpic']?>" style="width: 60px;height: 60px;">                                       
                                    </a>
                                    <div class="des">
                                        <a href="" target="_blank">
                                        	<?php echo $vttt['goods_gname']?>
                                        </a>
                                     	<a target="_blank" href="">
                                     		[交易快照]
                                     	</a>
                                     <?php 
                                     	$a=Db::table('orderlist as o')
										->join('goods_property as gp','o.goods_gid','=','gp.goods_gid')
										->join('property as p','property_pid','=','pid')
										->where("gpid in({$vttt['goods_options']})")
										->groupBy("gpid")
										->get();
                                      ?>
                                      <?php foreach ($a as $va){?>
	                                <p>
	                                       <span><?php echo $va['pname']?>：</span>
	                                       		<?php echo $va['gpvalue']?>
	                                </p>
	                                <?php }?>
                                    </div>
                                    <p class="price"><?php echo $vttt['goods_price']?></p>
                                    <p class="num"><?php echo $vttt['amount']?></p>
                                    </div>
                                    </td>
                                <td class="cell5 order-money">
                                    <p class="price"><?php echo $vttt['subtotalPrice']?></p>
                                    <p class="free">
                                        （免运费）                                    </p>
                                </td>
                                <td class="cell6" orderStatus="<?php echo $v['orderStatus']?>">
                                		<?php if($v['orderStatus']==0){?>
                
										<p class="red" style="color:#FF5500">等待买家付款</p>
										<?php }else if($v['orderStatus']==1){?>	
										<p class="red" style="color:#FF5500">已付款，待发货</p>
										<?php }else if($v['orderStatus']==2){?>
										<p class="red" style="color:#FF5500">已发货，待收货</p>
										<?php }else if($v['orderStatus']==3){?>
										<p class="red" style="color:#FF5500">已收货，待评价</p>
										<?php }else if($v['orderStatus']==4){?>
										<p class="red" style="color:#FF5500">订单已失效</p>
										
               <?php }?>
                                   
                                </td>
                                <td class="cell7" orid="<?php echo $v['orid']?>" orderNumber="<?php echo $v['orderNumber']?>" consignee="<?php echo $v['consignee']?>" recieveAddress="<?php echo $v['recieveAddress']?>" riseTime="<?php echo $v['riseTime']?>" orderStatus="<?php echo $v['orderStatus']?>" clid="<?php echo $_SESSION['clid']?>" remark="<?php echo $v['remark']?>" priceAggregate="<?php echo $v['priceAggregate']?>">
                                    <p>
                                    	<a target="" class="pay-btn" href="javascript:;">立即付款</a>
                                    </p>
                                    <a href="">订单详情</a>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                    <?php }?>
					<p style="text-align:center;">您还没有订单</p>
					<div class="page"></div>
				</div>
				<!--猜你喜欢-->
				<div class="buyer-section shadow">
					<div class="section-title recommend-tab clearfix">
						<h4>猜你喜欢</h4>
					</div>
					<div id="zp-goods-recommend">
						<ul style="list-style-type: none; overflow: hidden;" class="clearfix buyer-list recommend-content">
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
											<em>0</em>人已购买
										</span>
								</a>
							</li>
							<?php }?>
						</ul>
						<ul class="clearfix buyer-list recommend-content">
						</ul>
					</div>
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
							<img src="./Public/Home/images/images/18.jpg" alt="" height="32" width="85"/>
						</a>
						<a href="">
							<img src="./Public/Home/images/images/19.jpg" alt="" height="32" width="85"/>
						</a>
						<a href="">
							<img src="./Public/Home/images/images/20.jpg" alt="" height="32" width="85"/>
						</a>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>













