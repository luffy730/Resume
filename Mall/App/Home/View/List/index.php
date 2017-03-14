<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/index.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/iconfonts/iconfont.css">
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/iconfont/iconfont.css">
		<script src="./Public/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script>
			$(function(){
				var data=$('.gidhide').val();
				console.log(data);
				if(!data){
					$('.sorry').fadeIn('fast');
					$('.no_result_list').fadeIn('fast');
					$('.here').fadeOut('fast');
					$('.page').fadeOut('fast');
				}
				$('.open-up').click(function(){
					$('.selectebox').css({height:'auto'});
					$('.open-up').fadeOut('fast');
					$('.open-down').fadeIn('fast');
				});
				$('.open-down').click(function(){
					$('.selectebox').css({height:'150px'});
					$('.open-up').fadeIn('fast');
					$('.open-down').fadeOut('fast');
				})
			})
		</script>
		<title>【笔记本】产品报价大全-ZOL商城</title>
	</head>
	<body>
		<!--topbar开始-->
			<div class="zc-topbar" >
			<div class="wrapper clearfix">
				<div class="zc-login-info">
					<span class="zc-back-home">
						<a href="{{U('Index/index')}}">商城首页</a>
					</span>
					<?php if(isset($_SESSION['nickname'])): ?>
					<span class="zc-login" title="qq_482s79c1638u">您好，<a href="" target="_blank">{{$_SESSION['nickname']}}</a></span>
					<a href="{{U('List/out')}}" class="login_act">退出</a>
					<?php else: ?>
					<span class="zc-login">
						Hi~欢迎来到ZOL商城，请
						<a href="{{U('Login/index')}}">登录</a>
					</span>
					<span class="zc-register">
						<a href="{{U('Reg/index')}}">免费注册</a>
					</span>
					<?php endif ?>
				</div>
				<ul class="zc-quick-menu">
					<li>
						<a href="{{U('MyOrder/index')}}">
							我的订单
						</a>
					</li>
					<li class="zc-my-center">
						<a href="{{U('MyOrder/center')}}">
							买家中心
						</a>
							<i class="glyphicon glyphicon-chevron-down" ></i>
						
						<div id="zc-my-center-bd" class="zc-my-center-bd" style="display: none;">
							<a href="" style="display: none;">我的优惠券
							<em>8</em>
							</a>
							<a href="">关注额店铺
								<em id="focusShopNum">29</em>
							</a>
							
							<a href="">关注的商品
							<em id="focusGoodsNum">47</em>
							</a>
						</div>
					</li>
					<li>
						<?php if(isset($_SESSION['cart'])): ?>
						<a href="{{U('Cart/index')}}">
							购物车{{$_SESSION['cart']['total_rows']}}件
						</a>
						<?php else: ?>
						<a href="{{U('Cart/index')}}">
							购物车0件
						</a>
						<?php endif ?>
					</li>
					<li>
						<a href="">
							帮助中心
						</a>
					</li>
					<li class="zc-separator">|</li>
					<li class="zc-mobile">
						<a class="zc-hd zc-mobile-hd">
							手机商城
							<div id="zc-mobile-bd" class="zc-mobile-bd" style="display: none;">
								<img src="./Public/Home/images/shop_wechat.png"/>
							</div>
							<i class="glyphicon glyphicon-chevron-down" ></i>
						</a>
					</li>
					<li>
						<a href="">
							中关村在线
						</a>
					</li>
					<li>
						<a href="">
							商家入驻
						</a>
					</li>
					<li class="lianxikefu">
						<a href="">
							联系客服
						</a>
							<i class="glyphicon glyphicon-chevron-down" ></i>
						
						<div class="zc-service-tel">
							400-678-0068
						</div>
					</li>
				</ul>
			</div>
		</div>
		<!--topbar结束-->
		<!--logo区域开始-->
			<div class="header clearfix">
				<div class="logo">
					<h1>
						<a class="mall-logo" title="ZOL商城"></a>
					</h1>
						<p>中关村在线旗下网上商城</p>
				</div>
				<div class="search-box">
					<form action="" method="post">
						<input value="List" type="hidden" name="c" />
						<div class="search">
							<input type="text" name="keyword" class="search-text" autocomplete="off" value=""/>
							<input type="submit" value="搜索" hidefocus="true" class="search-btn"/>
						</div>
						<input value="921" type="hidden" name="spm" />
					</form>
						<!--搜索热词 搜索推荐-->
						<div class="hot-search" id="noresearch_keyword">
						<a href=""  >苹果iPhone SE</a>	
						<a href=""  >苹果iPhone SE</a>	
						<a href=""  >苹果iPhone SE</a>	
						<a href=""  >苹果iPhone SE</a>	
						<a href=""  >苹果iPhone SE</a>	
						<a href=""  >苹果iPhone SE</a>	
						</div>
				</div>
				<div class="ad-div">
					<a href=""  >
						<img src="./Public/Home/images/1.jpg" alt="ZOL商城承诺" width="180px"height="60px"/>
					</a>
				</div>
			</div>
			
		<!--logo区域结束-->
		<!--nav-box区域开始-->
			<div class="nav-box" style="z-index: 20;">
				<div class="category-nav-container">
					<h2 class="category-nav-title">
						全部商品分类
						<i class=""></i>
					</h2>
					<div id="category-menu-nav" class="category-menu-nav" style="display: none;">
					<ul class="menu-nav-container">
						<li id="subCateKey1" class=""rel="1">
							<div class="item">
								<i class="iconfont iconfont-phone"></i>
								<a href=""  >手机通讯</a>
								<a href=""  >手机配件</a>
							</div>
							<div class="category-menu-content category-1">
								<dl class="service">
									<dt>
										<a href=""  >服务保障</a>
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
								<dl>
                                    <dt>
                                    	<a href=""  >手机通讯</a>
                                    </dt>
                                    <dd>
	                                    <p>		                                                       											<a href=""  >手机</a>
											|<a href=""  >自拍神器</a>
											|<a href=""  >百元超值</a>
											|<a href=""  >千元高配</a>
											|<a href=""  >超薄机身</a>
											|<a href=""  >双卡双待</a>
											|<a href=""  >4G手机</a>
											|<a href=""  >Android</a>
                                         </p>    						
                                        <p>
                                              <a href="">联想</a>
                                              |<a href=""  >HTC</a>
                                              |<a href=""  >三星</a>
                                              |<a href=""  >小米</a>
                                              |<a href=""  >魅族</a>
                                              |<a href=""  >中兴/努比亚</a>
                                              |<a href=""  >华为</a>
                                              |<a href=""  >iPhone</a>
                                         </p>                                                                   
                                    </dd>
                                </dl>
								<dl>
									<dt>
										<a href="" target="">手机配件</a>
									</dt>
									<dd>
										<p>
											<a href="" target="">充电器</a>
											<a href="" target="">充电器</a>
											<a href="" target="">充电器</a>
											<a href="" target="">充电器</a>
											
										</p>
										<p></p>
									</dd>
								</dl>	
								<dl>
									<dt>
										<a href="" target="">通讯产品</a>
									</dt>
									<dd>
										<p>
											<a href="" target="">充电器</a>
											<a href="" target="">充电器</a>
										</p>
										<p></p>
									</dd>
								</dl>
							</div>
						</li>
						
						
					</ul>
						
						<div class="ad-div">
							<a href=""  >
							<img src="./Public/Home/images/1.gif" alt="特惠限时抢" width="200px"height="70px" />
							</a>
						</div>
						
					</div>


				</div>
				<ul class="nav clearfix">
					{{foreach from="$oldCate" value="$v"}}
					<li>
						<a href="{{U('List/index',array('cid'=>$v['cid']))}}"  >{{$v['cname']}}</a>
					</li>
					{{endforeach}}
				</ul>
				<div class="nav-tips">
					<a href=""  >CES新品惠 智能穿戴低至89元</a>
				</div>
			</div>
		<!--nav-box区域结束-->
		<!--分类输出区域-->
			<div class="wra" id="wra">
            <!-- 极米商家 add by wangzilong 2016-5-11 -->
            <div class="crumbs-bar">
                <div class="total">共<em>15731</em>件</div>                
                <ul class="crumbs-nav clearfix">
                    <li>
                    	<a href="" class="home">首页</a>
                    </li>                                        
                    <li class="arrow">&gt;</li>                         
                    <li class="main-cate">
                        <div class="menu-drop">
                            <span class="current">
                            	笔记本                                                               
                               <i class="ico"></i>
                            </span>
                            <div class="menu-drop-list">
                                <ul>
                                  	<li>
                                        <a href="">手机/手机配件</a>
                                    </li>
                                    <li>
                                        <a href="">手机/手机配件</a>
                                    </li>
                                    <li>
                                        <a href="">手机/手机配件</a>
                                    </li>
                                    <li>
                                        <a href="">手机/手机配件</a>
                                    </li>
                                    <li>
                                        <a href="">手机/手机配件</a>
                                    </li>

                                </ul>
                                <ul>
                                    <li>
                                        <a href="">手机/手机配件</a>
                                    </li>
                                    <li>
                                        <a href="">手机/手机配件</a>
                                    </li>
                                    <li>
                                        <a href="">手机/手机配件</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="arrow">&gt;</li>
                    <li>
                        <div class="menu-drop">
                            <span class="current">
                            	请选择子类
                               <i class="ico"></i>
                            </span>
                            <div class="menu-drop-list">
                                <a href="">笔记本电脑</a>
                                <a href="">笔记本电脑</a>
                                <a href="">笔记本包</a>                               
                            </div>
                        </div>
                    </li>
                </ul>  
            </div> 
            <div class="selector here">
                <div class="selectebox">                    
                    <div class="prop-item">
                    	{{foreach from="$attr" key="$k" value="$vaa"}}
                        <dl> 
                            <dt>{{$vaa['name']}}：</dt>                        
                            <dd style="height:auto;">
                                <ul class="clearfix">
                                	<?php 
                                		$temp=$param;
										$temp[$k]=0;
                                	 ?>
                                	 <li>
                                		<a href="{{U('List/index',array('cid'=>$_GET['cid'],'param'=>implode('_',$temp)))}}" <?php if($param[$k] == 0): ?> class="hover" <?php endif ?>>不限</a>
                                	</li>
                                	{{foreach from="$vaa['value']" value="$vbb"}}
                                		<?php 
                                			$temp[$k]=$vbb['gpid'];
                                		 ?>
                                    <li>
                                    	<a href="{{U('List/index',array('cid'=>$_GET['cid'],'param'=>implode('_',$temp)))}}" <?php if($param[$k] ==$vbb['gpid']): ?> class="hover" <?php endif ?> title="笔记本电脑">{{$vbb['gpvalue']}}</a></li>
                                    {{endforeach}}
                                </ul>
                            </dd>
                        </dl>
                        {{endforeach}}    
                    </div>
                </div>
            </div>
            <!--showmore-->
            <div class="show-more" style="
">
                    <a class="more-select open-up" href="javascript:void(0)" style="display:block">
                    	<span>更多选项</span>
                    </a>
                    <a class="more-select open-down" href="javascript:void(0)" style="display:none;">
                    	<span class="top-icon">收起</span>
                    </a>
                </div>
            <!--showmore-->
        </div>
		<!--分类输出区域-->
			<div class="wra" id="content">
				<div class="z-security-service clearfix">
                <span class="z-security-logo">ZOL商城服务保障：</span>
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
            	</div>
            	<div class="toolbar clearfix">
                <ul class="sort">
                    <li class="current">
                        <a href="" class="default">默认</a>
                    </li>
                    <li class="">
                        <a href="" class="default">高人气</a>
                    </li>
                    <li class="">
                        <a href="" class="default">高销量</a>
                    </li>
                    <li class="">
                        <a href="" class="default">价格由低到高</a>
                    </li>
                    <li class="">
                        <a href="" class="default">价格由高到低</a>
                    </li>
                    <li class="comm-dress">
                    <span class="delivery-origin">
                            发货地                            <i class="ico"></i>
                    </span>
                    <div style="display: none;" class="commdress-list">
                        <dl>
                            <dt>华北</dt>
                            <dd>
                               <ul>
                                   <li>
                                   	<a href="">北京</a>
                                   </li>
                                   <li>
                                   	<a href="">北京</a>
                                   </li>
                                   <li>
                                   	<a href="">北京</a>
                                   </li>
                                   <li>
                                   	<a href="">北京</a>
                                   </li>
                                   <li>
                                   	<a href="">北京</a>
                                   </li>
                                </ul>
                            </dd>
                        </dl>
                          <dl>
                            <dt>华北</dt>
                            <dd>
                               <ul>
                                   <li>
                                   	<a href="">北京</a>
                                   </li>
                                   <li>
                                   	<a href="">北京</a>
                                   </li>
                                   <li>
                                   	<a href="">北京</a>
                                   </li>
                                   <li>
                                   	<a href="">北京</a>
                                   </li>
                                   <li>
                                   	<a href="">北京</a>
                                   </li>
                                </ul>
                            </dd>
                        </dl>
                          <dl>
                            <dt>华北</dt>
                            <dd>
                               <ul>
                                   <li>
                                   	<a href="">北京</a>
                                   </li>
                                   <li>
                                   	<a href="">北京</a>
                                   </li>
                                   <li>
                                   	<a href="">北京</a>
                                   </li>
                                   <li>
                                   	<a href="">北京</a>
                                   </li>
                                   <li>
                                   	<a href="">北京</a>
                                   </li>
                                </ul>
                            </dd>
                        </dl>
                  		</div>
            		</li>
                    <li class="price-range clearfix">
                        <div class="inner clearfix" id="priceInner">
                            <form name="Z_searchForm" id="Z_searchForm" method="get" action="">
                                <input name="price_start" class="text" value="￥" id="priceStart" maxlength="10" type="text">
                                <i>-</i>
                                <input name="price_end" class="text" value="￥" id="priceEnd" maxlength="10" type="text">
                                <span style="display: none;" class="operation"> 
                                    <a href="javascript:void(0);" class="confirm" id="priceConfirm">
                                    	确定
                                    </a> 
                                    <a href="javascript:void(0);" id="priceCancle">
                                    	清除
                                    </a> 
                                </span>
                            </form>
                        </div>
                    </li>
                    <li class="screening">
                        <span class="fold" style="display:none;">
                        	更多
                        	<i class="ico"></i>
                        </span>
                        <div class="list clearfix">
                            <label for="check_1">
                                <input name="is_promo" value="1" class="check" id="check_1" type="checkbox">限时抢购</label>                            
                            <label for="check_11">
                                <input name="is_active" value="1" class="check" id="check_11" type="checkbox">店铺活动</label>
                        </div>
                    </li>
                </ul>
                <div class="mini-page">
                	<em>1/100</em>
                	<span class="no-prev">上一页</span>
                	<a href="" class="next">
                		下一页
                		<i></i>
                	</a>
                </div>
            </div>
            <!--sorry-->
            <div class="selector sorry" style="display: none;">
                    <div class="no_result noMatch">
                                                        <p class="warn">抱歉！未找到<span>您想要的</span> 商品，请换个关键词试试吧</p>
                                                        <p>建议您：</p>
                            <p>1.  调整关键字，适当删除或更改搜索关键词查</p>
                            <p>2.  看输入关键字是否有误，适当减少或增加筛选条件</p>
                          
                    </div>
            </div>
            <!--sorry-->
              <!--促销中的商品-->
            <div class="wrapper no_result_list" style="display: none; margin-top: 10px;">
                    <h2>正在促销中的商品</h2>                    
                    <ul class="goods-list clearfix" id="goodsPicList" >
           			 {{foreach from="$saleData" value="$vddd"}}
                        <li class="" style="float: left; width: 200px;">
                                <div class="attention" >
                                	<span>关注</span>
                                </div>                                    
                                <a href="{{U('Content/index',array('gid'=>$vddd['gid']))}}" target="_blank" class="pic">
                                	<span class="img">
                                		<img src="{{$vddd['listpic']}}" alt="" title="" width="200">
                                	</span>
                                </a>
                                <div class="title">
                                    <a href="{{U('Content/index',array('gid'=>$vddd['gid']))}}" target="_blank">
                                        <span class="label">[限时促销]</span> 
                                           {{$vddd['gname']}}
                                    </a>
                                </div>    
                                <div class="price-bar clearfix">
                                    <span class="price">{{$vddd['mprice']}}</span>
                                    <span class="activity-infor" style="display:none;">最多减¥1000</span>
                                </div>                                   
                                <div class="volume">
                                	<span>
                                		销量数
                                		<em>&nbsp;{{$vddd['gid']}}</em>
                                	</span>
                                	<span class="evaluation">
                                		评价数 
                                		<a href="">{{$vddd['click']}}</a>
                                	</span>
                                </div>					                             

                            </li>
                             {{endforeach}}                           
                    </ul>
                   
            </div>
            
            <!--促销中的商品-->
				<!--商品分类-->
			<ul id="goodsPicList" class="goods-list clearfix" >
				{{foreach from="$goodsData" value="$value"}}
				<li class="data" goodsData="$value['gname']">
					<input type="hidden" name="gid" value="$value['gid']" class="gidhide" />
					<div class="attention">
						<span>关注</span>
					</div>
					<a href="{{U('Content/index',array('gid'=>$value['gid']))}}"   class="pic">
						<span class="img">
							<img src="{{$value['listpic']}}" alt="" title="" width="200">
						</span>
					</a>
					<div class="title">
                        <a href=""  >{{$value['gname']}}
                        </a>
                    </div>
                    <div class="price-bar clearfix">
                        <span class="price">{{$value['mprice']}}</span>
                        <span class="activity-infor" style="display:none;">最多减¥1000</span>
                    </div>
                    <div class="volume">
                    	<span>
                    		销量数
                    		<em>&nbsp;{{$value['stock']}}</em>
                    	</span>
                    	<span class="evaluation">
                    		评价数 
                    		<a href=""  >{{$value['click']}}</a>
                    	</span>
                    </div>
                    <div class="shop-infor">
                        <p class="shop-name">
                            <a href=""   title="新捷数码(正品特惠)">新捷数码(正品特惠)</a>                            
                        </p>
                        <p class="total-volume">
                        	店铺总成交
                        	<em>582</em>
                        	笔
                        </p>
                    </div>
				</li>
			{{endforeach}}
			</ul>
			
		<!--商品分类-->
		<!--分页-->
			<div class="page">
				<span class="no-prev">上一页</span>
				<span class="current">1</span>
				<a href="">2</a>
				<a href="">3</a>...
				<a href="">100</a>
				<a href="" class="next">下一页</a>
			</div>
		<!--分页-->
			</div>
		<!--footer区域开始-->
			<div class="footer" >
				<div class="footerTop">
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
					<div class="wr">
						<div class="footer-nav">
							<a href="">中关村在线</a>|
							<a href="">中关村在线</a>|
							<a href="">中关村在线</a>|
							<a href="">中关村在线</a>|
							<a href="">中关村在线</a>|
							<a href="">中关村在线</a>|
							<a href="">中关村在线</a>|
							<a href="">中关村在线</a>|
							<a href="">中关村在线</a>
						</div>
						<div class="copyright">
							<a href="">关于ZOL商城</a>|
							<a href="">关于ZOL商城</a>|
							<a href="">关于ZOL商城</a>|
							<a href="">关于ZOL商城</a>
							<span>
								©2016 中关村在线 版权所有. 京ICP备09041801号-182 京ICP证010391号
								
							</span>
						</div>
						<div class="authentication clearfix">
						<a href="">
							<img src="./Public/Home/images/beian.jpg" width="85" height="32"/>
						</a>
						<a href="">
							<img src="./Public/Home/images/beian.jpg" width="85" height="32"/>
						</a>
						<a href="">
							<img src="./Public/Home/images/beian.jpg" width="85" height="32"/>
						</a>
						</div>
					</div>
				</div>
			</div>
		<!--footer区域结束-->
	</body>
</html>
