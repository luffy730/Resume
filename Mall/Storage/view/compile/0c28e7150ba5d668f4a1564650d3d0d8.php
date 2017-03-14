<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>ZOL商城</title>
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/style.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/animate.min.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/iconfonts/iconfont.css">
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/iconfont/iconfont.css">
		<script src="./Public/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="./Public/Home/js/index.js">
		</script>
		<script src="./Public/images/js/jquery.js?ver=v1.6.4"></script>
<script src="./Public/images/js/html5zoo.js?ver=v0.0.1"></script>
<script src="./Public/images/js/lovelygallery.js?ver=v0.0.1"></script>
	</head>
	<body>
		<!--公共头部-->
		<div id="head">
			<div class="top">
				<div class="zc-login-info">
					<span class="zc-back-home">
						<a href="">商城首页</a>
					</span>
					<?php if(isset($_SESSION['nickname'])): ?>
					<span class="zc-login" title="qq_482s79c1638u">您好，<a href="" target="_blank"><?php echo $_SESSION['nickname']?></a></span>
					<a href="<?php echo U('Index/out')?>" class="login_act">退出</a>
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
							购物车<?php echo $_SESSION['cart']['total_rows']?>件
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
							<img src="./Public/Home/images/images//2.png" alt="" height="130" width="130"/>
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
		
		<!--中间部分-->
		<div style="background:url(./Public/Home/images/images//1.jpg) top center scroll no-repeat;">
			<!--索引区域-->
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
						<a class="animated dropdown" target="_blank" title="苹果iPhone SE">苹果iPhone SE</a>
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
						<img src="./Public/Home/images/images//2.jpg" alt=""  height="60" width="180"/>
					</a>
				</div>
			</div>
			<!--索引区域结束-->
			<!--//实例化分类模型-->
			<!--导航条部分开始-->
			<div class="nav-box">
				<div class="category-nav-container">
					<h2 class="category-nav-title">商品分类</h2>
					<div class="category-menu-nav">
						<ul class="menu-nav-container">
							<?php foreach ($newCats as $v){?>
							<li>
								<div class="item">
									<!--<i class="iconfont"></i>-->
									<?php foreach ($v['_data'] as $va){?>
									<a href="<?php echo U('List/index',array('cid'=>$va['cid']))?>" target="_blank"><?php echo $va['cname']?></a>
									<?php }?>
								</div>
								<div class="catCon category-1" style="display: none;">
                                        <dl class="service">
                                            <dt>
                                            	<a href="" target="_blank">服务保障</a>
                                            </dt>
                                            <dd class="clearfix">
                                            	<a href="" target="_blank">
                                            		<i class="iconfont">&#xe602;</i>
                                            		行货保证
                                            	</a>
                                            	<a href="#">
                                            		<i class="iconfont">&#xe64b;</i>
                                            		发票保障
                                            	</a>
                                            	<a href="" target="_blank">
                                            		<i class="iconfont">&#xe68f;</i>
                                            		顺丰包邮
                                            	</a>
                                            	<a href="" target="_blank">
                                            		<i class="iconfont">&#xe607;</i>
                                            		无忧退换
                                            	</a>
                                            	<a href="" target="_blank">
                                            		<i class="iconfont">&#xe62f;</i>先行赔付
                                            	</a>
                                            </dd>
                                        </dl> 
                                        	<?php foreach ($v['_data'] as $ve){?>
                                        <dl>
                                                <dt>
                                                	<a href="<?php echo U('List/index',array('cid'=>$ve['cid']))?>" target="_blank">
                                                		<?php echo $ve['cname']?>
                                                	</a>
                                                	
                                                </dt>
												
                                                <dd> 
                                                    <p><?php foreach ($ve['_data'] as $vz){?>
				                                        <a href="<?php echo U('List/index',array('cid'=>$vz['cid']))?>" target="_blank"><?php echo $vz['cname']?></a><?php }?> 
				                                    </p>                            
                                                </dd>
                                            </dl> 
                                            	 
                                	
                                            <?php }?>    
								</div>
							</li>
							<?php }?>
							</ul>
					</div>
					<div class="ad-div">
						<a href="">
							<img src="./Public/Home/images/images//1.gif" alt="特惠限时抢" height="70" width="200"/>
						</a>
					</div>
				</div>
				<ul class="nav clearfix">
					<li class="current">
						<a href="">首页</a>
					</li>
					<?php foreach ($oldCats as $va){?>
					<li>
						<a href="<?php echo U('List/index',array('cid'=>$va['cid']))?>"><?php echo $va['cname']?></a>
					</li>
					<?php }?>
				</ul>
				<div class="nav-tips">
					<a href="">CES新品惠 智能穿戴低至89元</a>
				</div>
			</div>
			<!--导航结束-->
			<div class="wrapper clearfix">
				<div class="side">
					<div class="ad-div">
						<div>
							<a href="">
								<img src="./Public/Home/images/images//3.jpg" alt="" height="210" width="240"/>
							</a>
						</div>
					</div>
					<div class="module mall-notice">
						<div class="module-title">商城公告</div>
						<ul>
							<li>
								<a href="">[五一]iPhone 6s阶梯团 低至4680元</a>
							</li>
							<li>
								<a href="">[五一]iPhone 6s阶梯团 低至4680元</a>
							</li>
							<li>
								<a href="">[五一]iPhone 6s阶梯团 低至4680元</a>
							</li>
							<li>
								<a href="">[五一]iPhone 6s阶梯团 低至4680元</a>
							</li>
							<li>
								<a href="">[五一]iPhone 6s阶梯团 低至4680元</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="foucs-box">
					<div class="focus-inner">
						<a href="">
							<img src="./Public/Home/images/lun1.jpg" alt="" height="400" width="740" style="display: block;"/>
							<img src="./Public/Home/images/lun2.jpg" alt="" height="400" width="740"/>
							<img src="./Public/Home/images/lun3.jpg" alt="" height="400" width="740"/>
							<img src="./Public/Home/images/lun4.jpg" alt="" height="400" width="740"/>
							<img src="./Public/Home/images/lun5.jpg" alt="" height="400" width="740"/>
							<img src="./Public/Home/images/lun6.jpg" alt="" height="400" width="740"/>
							
						</a>
						<ul id="ul">
				    		<li style="background:#A6E1EC;">1</li>
				    		<li>2</li>
				    		<li>3</li>
				    		<li>4</li>
				    		<li>5</li>
				    		<li>6</li>
				    	</ul>
				    	<div id="click">
				    		<div class="left">&lt;</div>
				    		<div class="right">&gt;</div>
				    	</div>
				    	<!--<div>-->
<!--
    <div id="html5zoo-1" style="display:block;position:relative;">
        <ul class="html5zoo-slides" style="display:none;">
            <li><a href="http://html5zoo.com/" target="_blank"><img src="./Public/images/001/001.png" alt="001" data-description="这是第1张幻灯" /></a></li>
            <li><img src="./Public/images/001/002.png" alt="Big Buck Bunny" />
                <video preload="none" src="http://player.youku.com/player.php/sid/XMzQwODIwMDEy/v.swf"></video>
            </li>
            <li><a href="http://html5zoo.com/web/course" target="_blank"><img src="./Public/images/001/003.png" alt="003" data-description="第3张" /></a></li>
            <li><a href="http://html5zoo.com/web/3d" target="_blank"><img src="./Public/images/001/004.png" alt="004" data-description="第4张" /></a></li>
            <li><a href="http://html5zoo.com/" target="_blank"><img src="./Public/images/001/005.png" alt="005" data-description="第5张" /></a></li>
            <li><img src="./Public/images/001/006.png" alt="006" data-description="第6张，这是全景图哦" /></li>
            <li><img src="./Public/images/001/007.png" alt="007" data-description="第7张，这是全景图哦" /></li>
            <li><a href="http://html5zoo.com/" target="_blank"><img src="./Public/images/001/008.png" alt="008" /></a></li>
            <li><a href="http://html5zoo.com/web/explorer" target="_blank"><img src="./Public/images/001/009.png" alt="009" data-description="漂亮的动画效果！" /></a></li>
            <li><a href="http://html5zoo.com/" target="_blank"><img src="./Public/images/001/010.png" alt="010" /></a></li>
            <li><img src="./Public/images/001/011.png" alt="011" /></li>
            <li><img src="./Public/images/001/012.png" alt="012" data-description="好多食物哈哈：）" /></li>
            <li><a href="http://html5zoo.com/" target="_blank"><img src="./Public/images/001/013.png" alt="013" data-description="好多食物哈哈：）快来哟" /></a></li>
            <li><img src="./Public/images/001/014.png" alt="014" data-description="嗯，味道看上去挺美的" /></li>
            <li><a href="http://html5zoo.com/" target="_blank"><img src="./Public/images/001/015.png" alt="015" /></a></li>
        </ul>
        <ul class="html5zoo-thumbnails" style="display:none;">
            <li><img src="./Public/Home/images/lun1.jpg" style="width:740px;height:400px;"/></li>
            <li><img src="./Public/Home/images/lun2.jpg" style="width:740px;height:400px;"/></li>
            <li><img src="./Public/Home/images/lun3.jpg" style="width:740px;height:400px;"/></li>
            <li><img src="./Public/Home/images/lun4.jpg" style="width:740px;height:400px;"/></li>
            <li><img src="./Public/Home/images/lun5.jpg" style="width:740px;height:400px;"/></li>
            <li><img src="./Public/Home/images/lun6.jpg" style="width:740px;height:400px;"/></li>
            <li><img src="./Public/Home/images/lun7.jpg" style="width:740px;height:400px;"/></li>
            <li><img src="./Public/Home/images/lun8.jpg" style="width:740px;height:400px;"/></li>
            <li><img src="./Public/Home/images/lun9.jpg" style="width:740px;height:400px;"/></li>
            <li><img src="./Public/Home/images/lun10.jpg" style="width:740px;height:400px;"/></li>
            <li><img src="./Public/Home/images/lun11.jpg" style="width:740px;height:400px;"/></li>
            <li><img src="./Public/Home/images/lun12.jpg" style="width:740px;height:400px;"/></li>
            <li><img src="./Public/Home/images/lun13.jpg" style="width:740px;height:400px;"/></li>
            <li><img src="./Public/Home/images/lun14.jpg" style="width:740px;height:400px;"/></li>
            <li><img src="./Public/Home/images/lun15.jpg" style="width:740px;height:400px;"/></li>
        </ul>
    </div>

    
</div>-->
					</div>
				</div>
			</div>
		</div>
		<!--中间部分结束-->
		
		<!--精品团购-->
		<div class="wrapper">
			<div class="section ztuan-section">
				<div class="section-title clearfix">
					<h2 class="title">Z团</h2>
					<p class="more">
						<a href="">
							更多团购
							<span>></span>
						</a>
					</p>
				</div>
				<div class="z-tuan-list">
					<ul class="clearfix">
						<?php foreach ($go as $vaa){?>
						<li>
							<a href="<?php echo U('Content/index',array('gid'=>$vaa['gid']))?>">
								<img src="<?php echo $vaa['listpic']?>" alt="" width="300" height="180"/>
							</a>
						</li>
						<?php }?>
					</ul>
				</div>
			</div>
			<!--特色购-->
			<div class="section feature-section">
				<div class="section-title clearfix">
					<h2 class="title">特色购</h2>
				</div>
				<div class="feature-list">
					<ul class="clearfix" id="special">
						<li class="first">
							<a href="<?php echo U('Content/index',array('gid'=>$go[1]['gid']))?>">
								<img src="<?php echo $go[1]['listpic']?>" alt="" height="372" width="200"/>
							</a>
						</li>
						<li>
							<a href="<?php echo U('Content/index',array('gid'=>$first[1]['gid']))?>">
								<img src="<?php echo $first[1]['listpic']?>" alt="" height="218" width="370" alt="" />
							</a>
						</li>
						<?php foreach ($fifth as $vee){?>
						<li>
							<a href="<?php echo U('Content/index',array('gid'=>$vee['gid']))?>">
								<img src="<?php echo $vee['listpic']?>" alt="" height="218" width="208" alt="" />
							</a>
						</li>
						<?php }?>
						<li>
							<a href="<?php echo U('Content/index',array('gid'=>$second[1]['gid']))?>">
								<img src="<?php echo $second[1]['listpic']?>" alt="" height="151" width="370" alt="" />
							</a>
						</li>
						<?php foreach ($fourth as $vef){?>
						<li>
							<a href="<?php echo U('Content/index',array('gid'=>$vef['gid']))?>">
								<img src="<?php echo $vef['listpic']?>" alt="" height="151" width="208" alt="" />
							</a>
						</li>
						<?php }?>
					</ul>
				</div>
				<div class="ad-div">
					<a href="">
						<img src="./Public/Home/images/images//12.jpg" alt="" height="90" width="1200" alt=""/>
					</a>
				</div>
			</div>
			<!--1F 手机通讯-->
			<div class="section mobile-section">
				<div class="section-title clearfix">
					<h2 class="title">1F 手机通讯</h2>
					<p class="more">
						<a href="">魅蓝note2</a>
						|
						<a href="">华为荣耀6 Plus</a>
						|
						<a href="">努比亚Z9</a>
						|
						<a href="">魅蓝note</a>
					</p>
				</div>
				<div class="clearfix">
					<div class=" main-figure">
						<a href="<?php echo U('Content/index',array('gid'=>$new[0]['gid']))?>">
							<img src="<?php echo $new[0]['listpic']?>" alt="" height="420" width="360"/>
						</a>
					</div>
					<ul class="figure-list clearfix">
						<li class="item wide box1">
							<button class="bt" id="bt1"><</button>
							<button class="bt" id="bt2">></button>
							<div class="all1">
								<?php foreach ($new as $vabf){?>
								<a href="<?php echo U('Content/index',array('gid'=>$vabf['gid']))?>">
								<img src="<?php echo $vabf['listpic']?>" alt="" height="209" width="419"/>
							<?php }?>	</a>
							</div>
							<div class="ul1">
								<div></div>
								<div></div>
								<div></div>
							</div>
						</li>
						<?php foreach ($new as $vab){?>
						<li class="item tall move">
							<div class="title outside">
								<a href="<?php echo U('Content/index',array('gid'=>$vab['gid']))?>"><?php echo $vab['gname']?></a>
							</div>
							<a class="pic" href="<?php echo U('Content/index',array('gid'=>$vab['gid']))?>">
								<img class="picture"src="<?php echo $vab['listpic']?>" alt="" height="120" width="160"/>
							</a>
						</li>
						<?php }?>
					</ul>
				</div>
				<ul class="brands-list clearfix">
					<?php foreach ($brand as $vabc){?>
					<li>
						<a href="<?php echo U('List/index',array('bid'=>$vabc['bid']))?>">
							<img src="<?php echo $vabc['logo']?>" alt="" height="60" width="118"/>
						</a>
					</li>
					<?php }?>
				</ul>
			</div>
			<!--2F 手机通讯-->
			<div class="section mobile-section">
				<div class="section-title clearfix">
					<h2 class="title team">2F 电脑数码/配件</h2>
					<p class="more">
						<a href="">魅蓝note2</a>
						|
						<a href="">华为荣耀6 Plus</a>
						|
						<a href="">努比亚Z9</a>
						|
						<a href="">魅蓝note</a>
					</p>
				</div>
				<div class="clearfix">
					<div class=" main-figure">
						<a href="<?php echo U('Content/index',array('gid'=>$first[0]['gid']))?>">
							<img src="<?php echo $first[0]['listpic']?>" alt="" height="420" width="360"/>
						</a>
					</div>
					<ul class="figure-list clearfix">
							<li class="item wide box1">
							<button class="bt" id="bt1"><</button>
							<button class="bt" id="bt2">></button>
							<div class="all1">
								<?php foreach ($first as $vabg){?>
								<a href="<?php echo U('Content/index',array('gid'=>$vabg['gid']))?>">
								<img src="<?php echo $vabg['listpic']?>" alt="" height="209" width="419"/></a>
								<?php }?>
							</div>
							<div class="ul1">
								<div></div>
								<div></div>
								<div></div>
							</div>
						</li>
						<?php foreach ($first as $vabh){?>
						<li class="item tall move">
							<div class="title outside">
								<a href=""><?php echo $vabh['gname']?></a>
							</div>
							<a class="pic" href="<?php echo U('Content/index',array('gid'=>$vabh['gid']))?>">
								<img class="picture"src="<?php echo $vabh['listpic']?>" alt="" height="120" width="160"/>
							</a>
						</li>
						<?php }?>
					</ul>
				</div>
				<ul class="brands-list clearfix">
					<?php foreach ($brand as $vabd){?>
					<li>
						<a href="<?php echo U('List/index',array('bid'=>$vabd['bid']))?>">
							<img src="<?php echo $vabd['logo']?>" alt="" height="60" width="118"/>
						</a>
					</li>
					<?php }?>
				</ul>
			</div>
			<!--1F 手机通讯-->
			<div class="section mobile-section">
				<div class="section-title clearfix">
					<h2 class="title team3">3F 手机通讯</h2>
					<p class="more">
						<a href="">魅蓝note2</a>
						|
						<a href="">华为荣耀6 Plus</a>
						|
						<a href="">努比亚Z9</a>
						|
						<a href="">魅蓝note</a>
					</p>
				</div>
				<div class="clearfix">
					<div class=" main-figure">
						<a href="<?php echo U('Content/index',array('gid'=>$second[0]['gid']))?>">
							<img src="<?php echo $second[0]['listpic']?>" alt="" height="420" width="360"/>
						</a>
					</div>
					<ul class="figure-list clearfix">
							<li class="item wide box1">
							<button class="bt" id="bt1"><</button>
							<button class="bt" id="bt2">></button>
							<div class="all1">
								<?php foreach ($second as $vbb){?>
								<a href="<?php echo U('Content/index',array('gid'=>$vbb['gid']))?>">
								<img src="<?php echo $vbb['listpic']?>" alt="" height="209" width="419"/></a>
								<?php }?>
							</div>
							<div class="ul1">
								<div></div>
								<div></div>
								<div></div>
							</div>
						</li>
						<?php foreach ($second as $vbc){?>
						<li class="item tall move">
							<div class="title outside">
								<a href=""><?php echo $vbc['gname']?></a>
							</div>
							<a class="pic" href="<?php echo U('Content/index',array('gid'=>$vbc['gid']))?>">
								<img class="picture"src="<?php echo $vbc['listpic']?>" alt="" height="120" width="160"/>
							</a>
						</li>
						<?php }?>
					</ul>
				</div>
				<ul class="brands-list clearfix">
					<?php foreach ($brand as $vabe){?>
					<li>
						<a href="<?php echo U('List/index',array('bid'=>$vabe['bid']))?>">
							<img src="<?php echo $vabe['logo']?>" alt="" height="60" width="118"/>
						</a>
					</li>
					<?php }?>
				</ul>
			</div>
			<!--1F 手机通讯-->
			<div class="section mobile-section">
				<div class="section-title clearfix">
					<h2 class="title team4">4F 手机通讯</h2>
					<p class="more">
						<a href="">魅蓝note2</a>
						|
						<a href="">华为荣耀6 Plus</a>
						|
						<a href="">努比亚Z9</a>
						|
						<a href="">魅蓝note</a>
					</p>
				</div>
				<div class="clearfix">
					<div class=" main-figure">
						<a href="<?php echo U('Content/index',array('gid'=>$third[0]['gid']))?>">
							<img src="<?php echo $third[0]['listpic']?>" alt="" height="420" width="360"/>
						</a>
					</div>
					<ul class="figure-list clearfix">
							<li class="item wide box1">
							<button class="bt" id="bt1"><</button>
							<button class="bt" id="bt2">></button>
							<div class="all1">
								<?php foreach ($third as $vcc){?>
								<a href="<?php echo U('Content/index',array('gid'=>$vcc['gid']))?>">
								<img src="<?php echo $vcc['listpic']?>" alt="" height="209" width="419"/></a>
								<?php }?>
							</div>
							<div class="ul1">
								<div></div>
								<div></div>
								<div></div>
							</div>
						</li>
						<?php foreach ($third as $vcd){?>
						<li class="item tall move">
							<div class="title outside">
								<a href="<?php echo U('Content/index',array('gid'=>$vcd['gid']))?>"><?php echo $vcd['gname']?></a>
							</div>
							<a class="pic" href="<?php echo U('Content/index',array('gid'=>$vcd['gid']))?>">
								<img class="picture"src="<?php echo $vcd['listpic']?>" alt="" height="120" width="160"/>
							</a>
						</li>
						<?php }?>
					</ul>
				</div>
				<ul class="brands-list clearfix">
					<?php foreach ($brand as $vabf){?>
					<li>
						<a href="<?php echo U('List/index',array('bid'=>$vabf['bid']))?>">
							<img src="<?php echo $vabf['logo']?>" alt="" height="60" width="118"/>
						</a>
					</li>
					<?php }?>
				</ul>
			</div>
			<div class="ces">
				<img src="./Public/Home/images/images//17.jpg" alt="" />
			</div>
		</div>
		<!--底部-->
		<div class="footer">
			<div class="wrapper">
				<ul class="footer-service clearfix">
					<li>
						<a href="">
							<i class="iconfont">&#xe602;</i>
							行货保证
						</a>
					</li>
					<li>
						<a href="">
							<i class="iconfont">&#xe64b;</i>
							发票保障
						</a>
					</li>
					<li>
						<a href="">
							<i class="iconfont">&#xe68f;</i>
							顺丰包邮
						</a>
					</li>
					<li>
						<a href="">
							<i class="iconfont">&#xe607;</i>
							无忧退换
						</a>
					</li>
					<li>
						<a href="">
							<i class="iconfont">&#xe62f;</i>
							先行赔付
						</a>
					</li>
				</ul>
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
							<img src="./Public/Home/images/images//18.jpg" alt="" height="32" width="85"/>
						</a>
						<a href="">
							<img src="./Public/Home/images/images//19.jpg" alt="" height="32" width="85"/>
						</a>
						<a href="">
							<img src="./Public/Home/images/images//20.jpg" alt="" height="32" width="85"/>
						</a>
					</div>
				</div>
			</div>
		</div>
		<!--侧边栏-->
		<div class="zc-side-toolbar-box">
			<div class="zc-toolbar-tabbar">
				<div class="zc-operation-tabbox">
					<!--订单-->
					<div class="zc-tab-order">
						<div class="zc-tab-ico"></div>
					</div>
					<!--足迹-->
					<div class="zc-tab-footprint">
						<div class="zc-tab-ico"></div>
					</div>
					<!--购物车-->
					<div class="zc-tab-cart">
						<div class="zc-tab-ico"></div>
						<span class="zc-number">0</span>
					</div>
				</div>
				<div class="zc-toolbar-tool">
					<a href="" class="zc-feedback">建议反馈</a>
					<a href="" class="zc-backtop"></a>
				</div>	
			</div>
		</div>
	</body>
</html>







