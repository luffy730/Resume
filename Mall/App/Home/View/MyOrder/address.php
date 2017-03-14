<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>收货地址</title>
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/dizhi.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/myorder.css"/>
		<script src="./Public/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/Home/js/receipt.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="./Public/Home/js/area.js"></script>
	</head>
	<body>
		<!--顶部-->
		<div class="topbar">
			<div class="wrapper clearfix">
				<div class="znav_link">
					<a href="">中关村在线</a>
					|
					<a href="{{U('Index/index')}}">中关村商城</a>
					|
					<a href="">Z团</a>
					|
					<a href="">经销商</a>
				</div>
				<ul class="zlogin clearfix" style=" display:block;">
					<li class="login">
						您好,
						<a href="">{{$_SESSION['nickname']}}</a>
						!
						<span class="login_act">
							[
							<a href="{{U('Index/out')}}">退出</a>
							]
						</span>
					</li>
					<li class="buyer_center">
						<span>
							<a href="{{U('MyOrder/center')}}">买家中心</a>
						</span>
					</li>
					<li>
						<span class="my-cart">
						<?php if(isset($_SESSION['cart'])): ?>
						<a href="{{U('Cart/index')}}">
							购物车{{$_SESSION['cart']['total_rows']}}件
						</a>
						<?php else: ?>
						<a href="{{U('Cart/index')}}">
							购物车0件
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
					<a href="">订单中心</a>
					<ul class="item-branch">
						<li>
							<a href="{{U('MyOrder/index')}}">我的订单</a>
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
							<a href="{{U('MyOrder/address')}}">收货地址管理</a>
						</li>
						<li>
							<a href="{{U('MyOrder/selfcenter')}}">ZOL个人中心</a>
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
			<div class="right-content shadow">
				<div class="addr-section">
					<h4>编辑收货地址</h4>
					<!--收货人-->
					<div class="addr-item clearfix">
						<label class="block-title">
							收货人：
							<em>*</em>
						</label>
						<div class="form-part">
							<input type="text" name="" class="receiver" value="" rid="{{$add[0]['rid']}}" />
							<input type="hidden" name="rid" class="rid"/>
						</div>
					</div>
					<!--所在地址-->
					<div class="addr-item clearfix" style="z-index:3;">
						<label class="block-title">
							所在地区：
							<em>*</em>
						</label>
						<div class="form-part">
							<select name="" id="area1" class="pr">
		
	</select>
	<select name="" id="area2" class="ci">
		
	</select>
	<select name="" id="area3" class="ar">
		
	</select>
						</div>
					</div>
					<!--街道地址-->
					<div class="addr-item clearfix jiedao">
						<label class="block-title">
							街道地址：
							<em>*</em>
						</label>
						<div class="form-part">
							<textarea name="" rows="" cols="" class="full"></textarea>
							<input type="hidden" name="action" value="edit" class="action" />
						</div>
					</div>
					<!--邮政编码-->
					<!--固定电话-->
					<div class="addr-item clearfix">
						<label class="block-title" for="">固定电话：</label>
						<div class="form-part">
							<!--<input class="tel-pre" type="text" />
							<em class="short-line"></em>-->
							<input class="tel-after" type="text" />
							<span class="normal-tip">例如：010-84852254-123（分机号可以忽略）</span>
						</div>
					</div>
					<!--手机号-->
					<div class="addr-item clearfix">
						<label class="block-title">
							手机号：
							<em>*</em>
						</label>
						<div class="form-part">
							<input type="text" class="phone"/>
						</div>
					</div>
					<!--电子邮件-->
					<!--<div class="addr-item clearfix">
						<label class="block-title">
							电子邮件：
							<em>*</em>
						</label>
						<div class="form-part">
							<input type="text" />
						</div>
					</div>-->
					<label class="set-btn">
						<input type="checkbox" />
						设置为默认
					</label>
					<div class="save-btn">
						<button type="submit" class="sub">保存</button>
						<span class="normal-tip">您当前一添加0条地址，还可添加10条</span>
					</div>
					<table class="table-block addr-table">
                                <tbody>
                                    <tr>
                                        <th class="cell1">收货人</th>
                                        <th class="cell2">所在地区</th>
                                        <th class="cell3">街道地址</th>
                                        <th class="cell4">邮编</th>
                                        <th class="cell5">电话/手机</th>
                                        <th class="cell6">操作</th>
                                        {{foreach from="$add" value="$va"}}							
                                    </tr>
                                    <tr class="address" rid="{{$va['rid']}}">
                                        <td class="cell1 name">{{$va['consignee']}}</td>
                                        <td provinceid="2" cityid="494" class="one">{{$va['province']}}&nbsp;&nbsp;{{$va['city']}}</td>
                                        <td class="address-detail">{{$va['FullAddress']}}</td>
                                        <td></td>
                                        <td>
                                                                                        <p fn="mobile" class="tel">{{$va['rphone']}}</p>                                        </td>
                                        <td id="733949" addressid="733949" email="" isdefault="0">
                                                                                            <a href="javascript:void(0)" fn="setDefaultAddress">设为默认</a>
                                                                                        &nbsp;<a href="javascript:void(0)" fn="changeAddress" class="edit">修改</a>
                                            &nbsp;<a href="javascript:void(0)" fn="deleteAddress" class="del">删除</a>
                                        </td>
                                    </tr>
                                    {{endforeach}}
                                                                      
                                </tbody>
                            </table>
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
