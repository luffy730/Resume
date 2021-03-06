<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>ZOL收银台</title>
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/index.css"/>
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
					<a href="{{U('Index/out')}}" class="login_act">退出</a>                    
				</div>        
				<ul class="zc-quick-menu">            
					<li>
						<a href="{{U('MyOrder/index')}}">我的订单</a>
					</li>            
					<li class="zc-my-center" >                
						<a href="" class="zc-hd">买家中心
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
						<a href="{{U('Cart/index')}}" id="shop-cart-num">购物车0件</a>
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
		</div>
		<!-- //header -->
		<!--wrapper-->
		<div class="wrapper">
			<div class="payment-box">
				{{foreach from="$or" value="$v"}}
				<div class="order-status-box">
					<div class="submit-complete clearfix">
						<div class="order-status">
							<h3 class="prompt">订单已提交，请在
								<span>60分钟</span>
							内完成付款（逾期自动取消）
							</h3>
						<div class="details">
							<p> 
								<span class="ddh"  orid="{{$v['orid']}}" orderStatus="{{$v['orderStatus']}}">
									您的订单号：{{$v['orderNumber']}}</span>  <span class="label">商品名称：{{$v['goods_gname']}}等
									</span>
							</p>
								
							<p>
								<span>
									收货人：{{$v['consignee']}}
								</span>
								<span>
									15830112607
								</span> 
								<span class="label">
									收货地址：{{$re[0]['FullAddress']}}
								</span>
							</p>
								 
						</div>
						</div>
						<div class="amount-code">
							<div class="code">
								<div class="code-innder">
									<!-- 淘宝二维码 -->
									<iframe src="" id="qrcode-ali" scrolling="no" frameborder="0" height="75px" width="75px">
									</iframe>
									<span class="code-name">支付宝扫码支付</span> </div>
								 </div>
							<div class="price">应付金额
								<span>{{$v['goods_totalprice']}} 
								</span>元
							</div>
						</div>
					</div>
				</div>
				{{endforeach}}
				<div class="payment-way">
					<dl class="third-party payment-selected" id="alipaySpanDiv">
							<dt>
								<span id="alipay_span" class="radiobox radiobox-selected">
								</span>支付宝支付：
							</dt>
							<dd class="clearfix">
								<div id="ali_way_selected" class="way-selected"> 
									<a fn="#">
										<img src="./Public/Home/images/alipay.png" height="38" width="138">
									</a> 
									<span class="tips">支持非支付宝会员支付</span>
								<span id="pay_amount_span" class="pay-amount">
									支付
									<em>{{$v['goods_totalprice']}}</em>元
								</span>
								</div>
							</dd>
						</dl>
					<dl class="third-party" id="weixinPayDl">
						<dt>
							<span id="weixin_span" class="radiobox"></span>
							微信支付：
						</dt>
						<dd class="clearfix">
							<div id="weixin_way_selected" class="way-selected">
								<a href="javascript:void(0);">
									<img src="./Public/Home/images/weixin.png" height="38" width="138">
								</a>
							</div>
							<div id="weixin_payment_div" class="weixin-payment clearfix" style="display: none;">
								<div class="weixin-qrcode">
									<div class="qrcode">
										<iframe id="qrcode-wx" src="" scrolling="no" style="margin: 22px;" frameborder="0" height="300" width="300">
										</iframe>
									</div>
									<img src="" height="86" width="260">
								</div>
								 <div class="prompt-img">
								 	<img src="" height="421" width="329">
								 </div>
							</div>
						</dd>
					</dl>
					<dl id="bankPayDl" class="third-party">
						<dt><span id="bank_span" class="radiobox">
							
						</span>银行卡支付：
						</dt>
						<!--上次使用的银行卡-->
						<dd id="bank_clearfix" class="clearfix" style="display: none;">
						</dd>
						<!--新银行卡对应的银行信息-->
						<dd id="bank_dd" class="bank-box" style="display: none;">
							<ul class="tab-bar clearfix">
								<li id="bank_pay_li" class="current">个人网银</li>
								<li id="moto_pay_li">信用卡</li>
							</ul>
							<div class="bank-list clearfix" id="bank_pay_list"> 
								<a data-type="ICBC-DEBIT" class="gongshang"></a> 
								<a data-type="ABC" class="nongye"></a> 
								<a data-type="CMB-DEBIT" class="zhaoshang"></a> 
								<a data-type="CCB-DEBIT" class="jianshe"></a> 
								<a data-type="CIB" class="xingye"></a> 
								<a data-type="CMBC" class="minsheng"></a> 
								<a data-type="BOC-DEBIT" class="zhongguo"></a> 
								<a data-type="SHRCB" class="sh-nongshang"></a> 
								<a data-type="COMM-DEBIT" class="jiaotong"></a> 
								<a data-type="PSBC-DEBIT" class="youzheng"></a> 
								<a data-type="BJBANK" class="beijing"></a> 
								<a data-type="BJRCB" class="bj-nongshang"></a> 
								<a data-type="HZCBB2C" class="hangzhou"></a> 
								<a data-type="NBBANK" class="ningbo"></a> 
								<a data-type="SHBANK" class="shanghai"></a> 
								<a data-type="SPA-DEBIT" class="pingan"></a> 
							</div>
							<div class="bank-list clearfix" id="moto_pay_list"> 
								<a data-type="CMB" class="zhaoshang"></a> 
								<a data-type="CCB" class="jianshe"></a> 
								<a data-type="ICBCB2C" class="gongshang"></a> 
								<a data-type="BOCB2C" class="zhongguo"></a> 
								<a data-type="ABC" class="nongye"></a> 
								<a data-type="SPABANK" class="pingan"></a> 
								<a data-type="CIB" class="xingye"></a> 
								<a data-type="GDB" class="gd-fazhan"></a> 
							</div>
						</dd>
					</dl>
					<div id="operation_div" class="operation  clearfix"> 
						<span id="not_pay_submit" class="pay-submit-btn" style="display:none;">立即支付</span> 
						<a href="javascript:void(0);" target="_blank" id="can_pay_submit" style="display:block;" class="pay-submit-btn">立即支付</a> 
						<span id="can_pay_tips" class="tips">请选择您习惯的支付方式</span> 
					</div>
				</div>
			</div>
		</div>
		<!--wrapper-->
		<!--footer底部-->
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
		<!--footer底部-->
	</body>
	<script src="./Public/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="./Public/Home/js/sweetalert.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" type="text/css" href="./Public/Home/js/sweetalert.css"/>
	<script type="text/javascript">
		$(function(){
			$('.pay-submit-btn').click(function(){
				var orid=$('.ddh').attr('orid');
				var orderStatus=$('.ddh').attr('orderStatus');
				$.ajax({
					url:'index.php?c=order&a=editor',
					type:'post',
					data:{'orid':orid,'orderStatus':orderStatus},
				})
				 swal("Good!", "支付成功", "success");
				setTimeout(function(){
					window.location.href='./index.php?c=MyOrder&a=index';
				},2000) ;
				
			})
		})
	</script>
</html>
