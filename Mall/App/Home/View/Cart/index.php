<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="keywords" content="购物车 查看购物车"/>
<meta name="description" content="购物车 查看购物车"/>
		<title>购物车 查看购物车</title>
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/index.css"/>
		<script src="./Public/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/Home/js/cart.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<!--topbar头部-->
		<div class="zc-topbar" id="headEr">    
			<div class="wrapper clearfix">        
				<div class="zc-login-info">           
					<span class="zc-back-home">
						<a href="{{U('Index/index')}}">商城首页</a>
					</span>                                         
					<span class="zc-login" title="qq_482s79c1638u">
						您好，
						<a href="" target="_blank">{{$_SESSION['nickname']}}</a>
					</span>                
					<a href="{{U('Cart/out')}}" class="login_act">退出</a>                    
				</div>        
				<ul class="zc-quick-menu">            
					<li>
						<a href="{{U('MyOrder/index')}}">我的订单</a>
					</li>            
					<li class="zc-my-center" onmouseover="showUI(this)" onmouseout="hideUI(this)">                
						<a href="{{U('MyOrder/center')}}" class="zc-hd">买家中心
							<i class="ico"></i>
						</a>                
						<div class="zc-my-center-bd" id="zc-my-center-bd" style="display: none;">                    
							<a href="#" style="display:none;">
								我的优惠券&nbsp;&nbsp;
								<em>8</em>
							</a>                    
							<a href="">关注的店铺&nbsp;&nbsp;
								<em id="focusShopNum">0</em>
							</a>                    
							<a href="">
								关注的商品&nbsp;&nbsp;
								<em id="focusGoodsNum">0</em>
							</a>                
						</div>            
					</li>            
					<li>
						<a href="" id="shop-cart-num">购物车{{$_SESSION['cart']['total_rows']}}件</a>
					</li>            
					<li>
						<a href="">帮助中心</a></li>            
						<li class="zc-separator">|</li>            
						<li class="zc-mobile" onmouseover="showUI(this)" onmouseout="hideUI(this)">                
							<a href="javascript:;" class="zc-hd zc-mobile-hd">
								手机商城
								<i class="ico"></i>
							</a>                
							<div class="zc-mobile-bd" id="zc-mobile-bd" style="display: none;">
								<img src="" height="130" width="130">
							</div>            
						</li>            
						<li>
							<a href="">中关村在线</a>
						</li>            
						<li>
							<a href="">商家入驻</a>
						</li>            
						<li class="lianxikefu">                
							<a href="javascript:;" onmouseover="showUI(this)" onmouseout="hideUI(this)" class="zc-hd">
								联系客服
								<i class="ico"></i>
							</a>                
							<div class="zc-service-tel">400-678-0068</div>            
						</li>        
				</ul>    
			</div>
		</div>
		<!--topbar头部-->
		
		<!-- header -->
		<div class="header clearfix" id="Logo">
		    <!--logo样式 -->
		    <div class="logo">
		        <a href="" title="中关村商城">
		        	<img src="./Public/Home/images/shop.jpg" width="212" height="40">
		        	<img src="./Public/Home/images/logo-text.png" width="165" height="40">
		        </a>
		    </div>
		    <div class="flow-step">
		            <ul class="flow-step-1">
		                <li class="s2" >下订单</li>
		                <li class="s3">去付款</li>
		                <li class="s4">确认收货</li>
		                <li class="s5">评价</li>
		            </ul>
		    </div>
		</div>
		<!-- //header -->
		<div class="wrapper" id="content"> 
			<form class="form" action="{{U('Order/plus')}}" method="post">
				<?php if(count($_SESSION['cart']['goods'])!=0) :?> 
		        <div class="cart-state mt">	
					<p>购物车状态
					<em>（{{$new}}/30）</em>
					</p>
					<div class="total">
						<input name="submitCart" type="submit"  value="去结算">
						<span>总计（不含运费）：
						<em>¥</em>
						<em class="total-cart-price" name="priceAggregate">{{$to}}</em>
						</span>
					</div>
				</div>
				<div class="order-table mt20">
					<table width="100%">
						<tbody>
							<tr>
							<th class="th-1">
								<label>
									<input name="checkAllCart" type="checkbox" value="1" onclick="checkAll.call(this)" checked="" class="checkAll">全选</label>
									</th>
							<th class="th-2">所选商品</th>
							<th class="th-3">单价（元）</th>
							<th class="th-4">数量</th>
							<th class="th-5">优惠</th>
							<th class="th-6">小计（元）</th>
							<th class="th-7">操作</th>
						</tr>                              
						<tr id="merchant_189882">
							<td colspan="7" class=" store-infor clearfix">
								<div class="shopname">
									<input name="merchantId[]" type="checkbox" rel="forshop" value="189882" checked="">
										店铺：
										<a href="" target="_blank">华开电脑专营店</a>
			                    </div>
			                    <div class="contact">
			                        <a class="tag-security" style="margin: 0 -9px 0 0">
			                            &nbsp;
			                        </a>
			                    </div>  
								<div class="contact">
			                    	<a target="_blank" href="">
			                    		<img border="0" src="./Public/Home/images/2.gif" alt="" title="">
			                    	</a>
			                    </div>
							</td>
						</tr>
			            <input type="hidden" name="fullSentTime_189882" value="1464860229"> 
			            <tr>
			                <td class="offer-detail" colspan="7">
			                    <div class="total">
		                            <span class="type">满就减</span>
		                            	商品金额已满
		                            <em>4666.00</em>
		                            	元，立减
		                            <em>50.00</em>
		                            	元
			                        </div>
			                    </td>
			                </tr>
			                {{foreach from="$data" value="$v" key="$k"}}     
			                <tr rel="goods-order" id="cart_2452190" class="item tr-{{$k}}">
							<td colspan="2" class="s-infor">
			                <input name="cartId[]" type="checkbox" value="{{$k}}" item="item" rel="foritem" merchantid="189882" checked="" sid="{{$k}}" class="checkit">
			                <a href="" class="pic" target="_blank">
			                	<img width="80" height="60" src="{{$v['list']}}" alt="" name="listpic"></a>
							<div class="inforbox">
								<h3 class="tit">
									<a href="" title="" target="_blank" sid="{{$k}}" class="info" name="gname">
										{{$v['name']}}
									</a>
								</h3>
			                <div class="security clearfix">
                            <a href="" title="" class="security-a" target="_blank"></a>                                            
                            <a href="" title="" class="security-c" target="_blank"></a>                                            
                            <a href="" title="" class="security-d" target="_blank"></a>                                            
                            <a href="" title="先行赔付" class="" target="_blank"></a>                                            
			                </div> 
			                <?php 
			                	//实例化商品属性模型
								$gpModel= new \Common\Model\GoodsProperty;
								$gpData=$gpModel->where("goods_gid={$v['id']}")->get();
								
								//实例化货品模型
								$liModel=new \Common\Model\Glist;
								$liData=$liModel->where("goods_gid={$v['id']} ")->get();
								$a=$gpModel
								->join('property','property_pid','=','pid')
								->where("gpid in({$v['options']})")
								->orderBy('pid')
								->get();
//								sp($a);
			                 ?>
			                 {{foreach from="$a" value="$vi"}}
							<p>{{$vi['pname']}}：{{$vi['gpvalue']}}</p>
							<div class="info-con" style="display: none;">
								<span>套装：官方标配</span>
								<div class="info-help">
									<h5>官方标配：</h5>
									<p>笔记本电脑+笔记本充电器+笔记本保修卡+保修发票</p>								
								</div>						
							</div>  
							{{endforeach}}                                              
							</div>
							</td>
							<td class="s-price ">                                    
			                   <em name="price">{{$v['price']}}</em>
							</td>
							<td class="s-amount ">
								<div class="buy-num">   
			                       <a class="minus" href="javascript:void(0)" title="减一" >-</a>
									<input type="text" autocomplete="off" class="text-amount" value="{{$v['num']}}" id="cartNumber_2452190">
									<a class="plus" href="javascript:void(0)" title="加一" >+</a>
								<div class="tips-2" id="tips_2452190" style="display:none;"></div>
			                 </div>
							</td>
							<td class="s-agio">
			                <div>−−</div>
							</td>
							<td class="s-total" price="{{$v['price']}}">
			                   <em>{{$v['total']}}</em>
							</td>
							<td class="s-del">
								<div class="s-delbox"> 
									<a href="{{U('Cart/delOne',array('gid'=>$k))}}" >删除</a>
			                        <div class="deletebox" style="display:none;" id="zp-cart-2452190">
										<p>确认要删除该商品吗？</p>
										<a href="javascript:void(0)" >是的</a>
										<a>取消</a> 
										<i></i>
									</div>                                                
								</div>
							</td>
						</tr> 
					{{endforeach}}
			        </tbody>
			        </table>
					<div class="total-price">
						商品总价
						<span>（不含运费）</span>：
						<em>¥</em>
						<em class="total-cart-price">{{$to}}</em>
					</div>
					<div class="order-foot clearfix">
						<label><input name="checkAllCart" type="checkbox" value="1" onclick="checkAll.call(this)" checked="" class="checkAll">全选</label>
						<a href="{{U('Cart/del')}}" >批量删除</a>
			                        			
						<a href="" class="go-shopping">&lt;&lt;继续购物</a>
						<a type="submit"  name="submitCart" class="accounting-btn" href="{{U('Order/index')}}">去结算</a>			
					</div>		
				</div>
				<?php else: ?>
				<dl class="shopcar-tip" >
					<dt>您的购物车里还没有商品，您可以：</dt>		
					<dd>去<a href="{{U('Index/index')}}">挑选商品</a></dd>
				</dl>    
		        <input type="hidden" name="buyType" value="2">
		        <?php endif ?>
		    </form> 
		</div>
		<div class="wrapper" id="zp-goods-recommend">
			<div class="modgoods mt20">
				<?php 
				$goodsModel = new \Common\Model\Goods;
				$data=$goodsModel->limit(5)->get();
				 ?>
				<ul class="modgoods-tab clearfix ">
					<li class="cur" id="cur">猜你喜欢</li>
				</ul>
				<div class="modgoods-tabbox">
					<ul class="modgoods-list clearfix guess">
						{{foreach from="$data" value="$vc"}}
					<li>
						<a class="pic" href="{{U('Content/index',array('gid'=>$vc['gid']))}}" title="" target="_blank">
							<img width="160" height="120" src="{{$vc['listpic']}}" alt="">
								<span>{{$vc['gname']}}</span>
							</a>
						<div class="price">{{$vc['mprice']}}</div>
					</li>
					{{endforeach}}
					</ul>			
				</div>
			</div>
		</div>
		<div class="footer" id="footEr">
		    <p class="links">
		    	<a target="_blank" href="">关于商城</a>|
		    	<a target="_blank" href="">营销中心</a>|
		    	<a target="_blank" href="">服务中心</a>|
		    	<a target="_blank" href="">联系我们</a>|
		    	<a target="_blank" href="">发展历程</a>|
		    	<a target="_blank" href="">媒体报道</a>
		    </p>
		    <p>
			    <span class="copyrigh" id="cR">
			    	中关村在线 版权所有. 京ICP备09041801号-182
			    	<a target="_blank" href="">
			    		京ICP证010391号
			    	</a>
			    </span>
		    </p>
		    <div class="authentication">
		    	<a target="_blank" href="">
		    		<img width="108" height="40" alt="经营性网站备案信息" src="./Public/Home/images/beian.png">
		    	</a>
		    	<a target="_blank" href="">
		    		<img width="108" height="40" alt="海淀网络警察提醒您" src="./Public/Home/images/beian.png">
		    	</a>
		    	<a target="_blank" href="" id="___szfw_logo___">
		    		<img src="./Public/Home/images/beian.png" width="108" height="40">
		    	</a>
		</div>
	</body>
	<script type="text/javascript">
		
	</script>
</html>
