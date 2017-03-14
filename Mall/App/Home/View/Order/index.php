<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>订单确认页 － ZOL商城｜中关村在线旗下网上商城</title>
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/index.css"/>
		<script src="./Public/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/Home/js/area.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/Home/js/order.js" type="text/javascript" charset="utf-8"></script>
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
					<a href="{{U('Cart/out')}}" class="">退出</a>                    
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
						<a href="{{U('Cart/index')}}" id="shop-cart-num">购物车{{$_SESSION['cart']['total_rows']}}件</a>
					</li>            
					<li>
						<a href="">帮助中心</a></li>            
						<li class="zc-separator">|</li>            
						<li class="zc-mobile" >                
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
		<!-- header Logo -->
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
		            	<li class="s1">加入购物车</li>
		                <li class="s2">下订单</li>
		                <li class="s3"><a href="./pay.html">去付款</a></li>
		                <li class="s4">确认收货</li>
		                <li class="s5">评价</li>
		            </ul>
		    </div>
		</div>
		<!-- //header Logo-->
		<div id="orderIn">
			<form action="javascript:void(0);" name="confirmOrder" id="confirmOrder" method="post" class="add">
				<input type="hidden" name="action" id="action" value="add" />
				<input type="hidden" name="rid" value=""  class="ride"/>
				<input name="cartFrom" value="" type="hidden">
	<!-- 收货人信息 -->
   				 <div class="container consignee">
            <table>
                <tbody><tr>
                    <td class="cell-1">收货人信息</td>
                    <td class="cell-2">
                        <ul class="address-list">
                        		<?php 
                                        		$addModel= new \Common\Model\Receipt;
												$addData= $addModel
												->where("client_clid={$_SESSION['clid']}")
												->get();
                                        ?>
                                       
                                        {{foreach from="$addData" value="$va"}}
                            <li class="current delete address-{{$va['rid']}}" id="list_733038" addliid="{{$va['rid']}}">
                                    <label>
                                        <span>
                                    	<input autocomplete="off" id="addressId_733038"  name="address" rid="{{$va['rid']}}" type="radio" value="733038" class="address">
                                    		<script type="text/javascript">
                                    			$('.address').click(function(){
                                    				var s=$(this).attr('rid');
                                    				$('.order').val(s);
                                    			})
                                    		</script>
                                        		
                                        	<strong>
                                        		[默认] 
                                        		<em class="namer">{{$va['consignee']}}</em>
                                        		<strong class="address">{{$va['FullAddress']}} {{$va['rphone']}}</strong>
 
                                        	</strong>
                                        </span>
                                        
                                        </label>
                                    <div class="operate" style="display: block; float: right;">
                                        <a href="javascript:void(0)" class="edi">编辑</a>
                                        <a href="javascript:;" class="del">删除</a>
                                    </div> <br />                             
                                </li>
                                 {{endforeach}}                
                            <li class="add-edits">
                                <label>
                                	<input name="address" value=""  type="radio" class="add_address">添加新地址</label>                        <div class="infor-editor editBox " id="infor-editor" style="display:none;">
                                    <dl>
                                        <dt>
                                        	<em class="xh">*</em>收货人：
                                        </dt>
                                        <dd>
                                        <input name="consignee" id="deliverName" value="" class="text recinput" maxlength="10" type="text">
                                        <span class="wrong-tips none" id="deliverNameTips">
                                        	请填写收货人
                                        </span>
                                        </dd>
                                        <!--订单号的隐藏域-->
                                        <input type="hidden" name="order_orid" value="{{$list[0]['order_orid']}}" class="orId"/>
                                    </dl>
                                    <dl class="addarea">
                                        <dt>
                                        <em class="xh">*</em>
                                        	所在地区
                                        </dt>
                                        <dd class="clearfix">
                                           <select name="" id="editarea1">
												
											</select>
											<select name="" id="editarea2">
												
											</select>
											<select name="" id="editarea3">
												
											</select>
                                        </dd>
                                    </dl>                                        
                                    <dl class="detailed-address">
                                        <dt><em class="xh">*</em>详细地址：</dt>
                                        <dd>
                                            <input name="FullAddress" id="deliverAddress" value="" class="text addinput" maxlength="30" type="text">
                                            <span class="wrong-tips none" id="deliverAddressTips">
                                            	请填写详细地址，5~30字
                                            </span>
                                        </dd>
                                    </dl>
                                    <div class="number clearfix">
                                        <dl>
                                            <dt>
                                            	<em class="xh">*</em>
                                            	手机号码：
                                            </dt>
                                            <dd>
                                                <input name="rphone" id="deliverMobile" value="" class="text mo" maxlength="11" type="text">
                                                <em class="tips">或</em>
                                            </dd>
                                        </dl>
                                        <dl class="fixed-line">
                                            <dt>固定电话：</dt>
                                            <dd>
                                                <input name="rfixphone" id="deliverPhone" value="" class="text ph" maxlength="17" type="text">
                                                <em class="tips" id="deliverMobilePhoneTips" style="line-height:25px">手机号码和固定电话请至少输入一个</em>
                                            </dd>

                                        </dl>
                                    </div>
                                    <label class="setup-default">
                                    	<input name="deliverDefault" id="deliverDefault" class="checkbox" value="0" type="checkbox">
                                    	设置为默认地址
                                    </label>
                                    <input target="confirmOrder" addressid="0" id="deliverBotton" class="savebtn w120-btn" value="确认收货地址"  type="submit">
                                </div>
                                <!-- 点击添加地址显示div -->
                                <div class="infor-editor addbox " id="infor-editor" style="display:none;">
                                    <dl>
                                        <dt>
                                            <em class="xh">*</em>收货人：
                                        </dt>
                                        <dd>
                                        <input name="consignee" id="deliverName" value="" class="text recinput" maxlength="10" type="text">
                                        <span class="wrong-tips none" id="deliverNameTips">
                                            请填写收货人
                                        </span>
                                        </dd>
                                        <!--订单号的隐藏域-->
                                        <input type="hidden" name="order_orid" value="56">
                                    </dl>
                                        <dl class="area">
                                        <dt>
                                        <em class="xh">*</em>
                                        	所在地区：
                                        </dt>
                                        <dd class="clearfix">
                                           <select name="province" id="addarea1">
												
											</select>
											<select name="city" id="addarea2">
												
											</select>
											<select name="area" id="addarea3">
												
											</select>
                                        </dd>
                                    </dl>                                                   
                                    <dl class="detailed-address">
                                        <dt><em class="xh">*</em>详细地址：</dt>
                                        <dd>
                                            <input name="FullAddress" id="deliverAddress" value="" class="text addinput" maxlength="30" type="text">
                                            <span class="wrong-tips none" id="deliverAddressTips">
                                                请填写详细地址，5~30字
                                            </span>
                                        </dd>
                                    </dl>
                                    <div class="number clearfix">
                                        <dl>
                                            <dt>
                                                <em class="xh">*</em>
                                                手机号码：
                                            </dt>
                                            <dd>
                                                <input name="rphone" id="deliverMobile" value="" class="text mo" maxlength="11" type="text">
                                                <em class="tips">或</em>
                                            </dd>
                                        </dl>
                                        <dl class="fixed-line">
                                            <dt>固定电话：</dt>
                                            <dd>
                                                <input name="rfixphone" id="deliverPhone" value="" class="text ph" maxlength="17" type="text">
                                                <em class="tips" id="deliverMobilePhoneTips" style="line-height:25px">手机号码和固定电话请至少输入一个</em>
                                            </dd>

                                        </dl>
                                    </div>
                                    <label class="setup-default">
                                        <input name="deliverDefault" id="deliverDefault" class="checkbox" value="0" type="checkbox">
                                        设置为默认地址
                                    </label>
                                    <input target="confirmOrder" addressid="0" id="deliverBotton" class="savebtn w120-btn" value="确认收货地址" type="submit">
                                </div>
                                <!-- 点击添加地址显示div -->
                        </li>
                    </ul> 
                        	<?php //隐藏域 添加的时候要获得用户的 id ，确定是哪个用户提交的地址 ?>                 
							<input type="hidden" name="client_clid" value="{{$_SESSION['clid']}}" />
                            <div class="more-address none" id="addressShow">
                            	<a href="#" class="unfolds">
                            		更多常用地址
                            	</a>
                            </div>
                            <div class="more-address none" id="addressHide">
                            	<a href="#" class="fold">
                            		收起常用地址
                            	</a>
                            </div>
                            <div class="add-address none">
                            	<label>
                            		<input name="addAddress" value="1" type="radio">
                            		添加新地址（最多可添加10个地址,您还可以添加10个地址）
                            	</label>
                            </div>
                    </td>
                </tr>
            </tbody>
            </table>
         	</form>   
        </div>
    <!-- //收货人信息 -->
		<form action="{{U('Order/edit')}}" method="post" id="first">
            <!-- 购物车商品信息 -->
        		<input name="buyType" value="2" type="hidden">
        		<input name="allCartIdStr" value="2434082,2434080" type="hidden">
                <div class="order-list order-current">
                    <input name="cart-js-191063" value="2434082,2434080" type="hidden">
                    <input name="fullMer_191063" value="" fn="" type="hidden">
   				 	{{foreach from="$list" value="$v"}}
                    <table>
                        <tbody>
                        	<tr>
                            <td class="cell-1">
                            	<label>
                            		<input name="merchantId" invoice="0" value="191063" checked="" type="radio">商品订单
                            	</label>
                            </td>
                            <td class="cell-2">
                    <table class="goods">
                                    <tbody>
                                    <tr>
                                        <th class="infor">商品信息</th>
                                        <th class="color-suits">颜色套装</th>
                                        <th class="saletype">销售类型</th>
                                        <th class="price">单价</th>
                                        <th class="agio">优惠</th>
                                        <th class="amount">数量</th>
                                        <th class="total">总价</th>
                                    </tr>
                                    
                                                                                                                    <tr>
                                            <td class="infor">
                                                <a href="" target="_blank" class="pic">
                                                	<img src="{{$v['goods_listpic']}}" alt="" height="60" width="60"></a>
                                                <h3 class="title">
                                                	<a href="" target="_blank">
                                                		{{$v['goods_gname']}}
                                                	</a>
                                                </h3>
                                            </td>
                                           <?php 
                                           	$newData=Db::table('goodslist as g')
											->join('goods_property as gp','g.goods_gid','=','gp.goods_gid')
											->where("gpid in({$v['goods_options']}) AND g.goods_gid={$v['goods_gid']}")
											->orderBy('gpid')

											->lists('gpid,gpvalue');
                                            ?> 
                                            <td class="color-suits">
                                            	<?php if($newData): ?>
                                            	{{foreach from="$newData" value="$va"}}
                                                <div class="color">{{$va}}</div>
                                                {{endforeach}}
                                                <?php endif ?>
                                                </div>
                                            </td>
                                                                                        
                                            <td class="saletype">-</td>
                                                                                        
                                            <td class="price">¥{{$v['goods_price']}}</td>
                                            <td>--</td>
                                            <td class="amount">{{$v['amount']}}</td>
                                            <td class="total">¥{{$v['subtotalPrice']}}</td>
                                        </tr>
                                     </tbody>
                                </table>
                                <div class="order-foot clearfix">
                                <div class="store-infor">
                                    <span class="name">
                                    	店铺：
                                    	<a href="">
                                    		壹帮商城
                                    	</a>
                                    </span>
                                        
                                	<a class="tag-security">z保障+</a>
                                </div>
                                <div class="delivery">
                                    <div class="payment">
                                        <select name="payType-191063" onchange="$.changeShipping()" id="payType-191063">                                                                                                            										<option value="2" selected="">网上支付</option>
                                        </select>
                                            <span>支付方式：</span>
                                    </div>
                                    <div class="express">
                                    <select name="shipping-191063" onchange="$.changeShipping()" id="shipping-191063">
                                    	<option value="0" selected="">顺丰包邮：0元</option>
                                    </select>
                                    <span>到 <em id="sendArea-191063">
                                    	 &nbsp;&nbsp;</em>配送方式：
                                    </span>
                                    </div>
                                </div>
                            </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    {{endforeach}}
                </div>
         <!-- //购物车商品信息 -->
        
    <!-- 订单发票 -->
    	<div class="container consignee" id="order_invoice_div" style="display:none;">
        <table>
            <tbody><tr>
                <td class="cell-1">发票</td>
                <td class="cell-2">
                    <div class="invoice clearfix" id="invoice-show-div">
                        <input name="isInvoice" id="is_invoice" value="0" type="hidden">
                        <span id="invoice_type_name"></span>
                        <span id="invoice_name_tips" class="invoice-tips">不需要发票</span>
                        <a href="javascript:void(0)" id="invoice-editor">修改</a>
                    </div>
                    <div class="infor-editor invoice-editor" id="invoice-editor-div">
                        <dl>
                            <dt><em class="xh">*</em>发票类型：</dt>
                            <dd>
                                <label><input name="invoiceType" value="1" checked="" type="radio">普通发票</label>
                            </dd>
                        </dl>
                        <dl>
                            <dt><em class="xh">*</em>发票抬头：</dt>
                            <dd>
                                <input name="invoiceName" value="姓名/公司名称" class="text text-color" maxlength="30" type="text">
                                <span class="wrong-tips" id="invoice_error" style="display:none;">发票信息错误</span>
                            </dd>
                        </dl>
                        <div class="btn clearfix">
                            <input id="save_invoice_info" class="savebtn w120-btn" value="保存发票信息" type="button">
                            <a href="javascript:void(0)" id="invoice_cancel" class="cancel">取消</a>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody></table>
    </div>
    <!-- //订单发票 -->
    
	<!-- 订单备注 -->
		<div class="order-note">
			<table>
				<tbody>
					<tr>
					<td class="cell-1">订单备注</td>
					<td class="cell-2">
						<textarea name="remark" id="orderNote" fn="limit" limit="200" tipsid="haveFonts"  ></textarea>
					<span>
						<em id="haveFonts">0</em>
						/200
					</span>
					</td>
					<td class="cell-3">
						<ul class="total-price">
							<li><span>商品总价：</span><em id="goods-total-price">¥{{$v['goods_totalprice']}}</em></li>
							<li><span>运费：</span><em id="goods-freight-price">¥-</em></li>
							<li><span>订单总计：</span><em class="total" id="total-price" >¥{{$v['goods_totalprice']}}</em></li>
						</ul>
					</td>
				</tr>
			</tbody></table>
		</div>

			<?php 
				$rModel=new \Common\Model\Receipt;
				$rData=$rModel->get();
			 ?>
			<!--提交订单-->
			<div class="submit-order clearfix">
                <a href="{{U('Cart/index')}}" class="submit-return">返回修改购物车</a>
                <input type="hidden" name="goods_totalprice" value="{{$list[0]['goods_totalprice']}}" />
                <input type="hidden" name="orid" value="{{$list[0]['order_orid']}}" />
                <input type="hidden" name="rid"  value="{{$rData[0]['rid']}}" class="order"/>
                <input class="submit-btn " name="confirmOrder"  value="提交订单" type="submit">
				<div class="submit-loading" style="display:none;">提交中...</div>
				<div class="fail-submit" style="display:none;cursor: not-allowed" title="">不能提交订单</div>
        	</div>
		</div>
	</form>
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
</html>
