<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>个人资料</title>
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/myziliao.css"/>
	</head>
	<body>
		<!--头部-->
		<div class="global-sitenav">
			<div class="sitenav-inner">
				<div class="sitenav-bbs-box">
					<div class="account-box">
						<a href="" class="sitenav-trigger">
							账号
							<i></i>
						</a>
					</div>
					<div class="follow-box">
						<a href="" class="sitenav-trigger">
							关注
							<i></i>
						</a>
					</div>
					<div class="mybbs-box">
						<a href="" class="sitenav-trigger">
							我的论坛
							<i></i>
						</a>
					</div>
				</div>
				<div class="sitenav-personal-center">
					<a href="{{U('Index/out')}}" class="sitenav-personal-login-out">退出</a>
					<a href="" class="sitenav-personal-msg"></a>
					<div class="sitenav-personal-welcome">
						欢迎您，
						<a href="">{{$_SESSION['nickname']}}</a>
					</div>
				</div>
				<div class="sitenav-links">
					<a href="" class="zol-link">中关村在线</a>
					<div class="sitenav-groupsite">
						<span class="sitenav-trigger">
							网站导航
							<i></i>
						</span>
					</div>
					<div class="sitenav-groupsite sitenav-groupsite-bbs">
						<span class="sitenav-trigger">
							论坛导航
							<i></i>
						</span>
					</div>
					<div class="client-enter">
						<a href=" class="sitenav-trigger client-title">手机客户端</a>
					</div>
				</div>
			</div>
		</div>
		<!--header-->
		<div class="headbox">
			<div class="head-inner clearfix">
				<div class="logo"></div>
				<div class="nav clearfix">
					<a href="./Public/Home/./Public/Home/Index/index.html">
						首页
					</a>
					<a href="">
						个人主页
					</a>
					<a href="">
						消息
					</a>
				</div>
				<div class="self-setbox">
					<span class="self-set-title">个人设置</span>
				</div>
				<div class="search-box">
					<input class="skey" type="text" placeholder="请输入要搜索的内容"/>
					<input class="sbtn" value="搜索" type="submit" />
				</div>
			</div>
		</div>
		<!--内容-->
		<div class="wrapper">
			<div class="index-userbox home-userbox">
				<div class="userbox">
					<a href="" class="user-pic">
						<span class="user-pic-text">上传头像</span>
						<img src="./Public/Home/images/37.jpg" alt="" height="80" width="80"/>
					</a>
					<div class="user-namebox clearfix">
						<a href="" class="user-name">{{$_SESSION['nickname']}}</a>
						<div class="user-levelbox clearfix">
							<a href="" class="user-level">Lv.1</a>
						</div>
					</div>
					<div class="user-function clearfix">
						<a href="" class="edit-btn border-ra2">编辑个人资料</a>
					</div>
					<div class="user-numbox clearfix">
						<span class="friend-num">
							<a href="">0</a>
							<br />
							好友
						</span>
						<span class="fans-num">
							<a href="">0</a>
							<br />
							粉丝
						</span>
						<span class="fans-num">
							<a href="">0</a>
							<br />
							关注
						</span>
					</div>
				</div>
				<div class="home-tab clearfix">
					<a href="" class="home-sub ">动态</a>
					<a href="" class="home-sub ">论坛</a>
					<a href="" class="home-sub ">任务</a>
					<a href="" class="home-sub ">资讯</a>
					<a href="" class="home-sub current">资料</a>
					<a href="" class="home-sub ">Z金豆</a>
					<a href="" class="home-sub ">设备</a>
				</div>
			</div>
		</div>
		<div class="wrap-data clearfix">
			<div class="sidebar">
				<div class="nav-list">
					<span class="nav-title nav-mydata">资料</span>
					<a href="" class="nav-item current">个人资料</a>
					<a href="" class="nav-item">修改头像</a>
					<a href="./editPwd.html" class="nav-item">修改密码</a>
					<a href="" class="nav-item">达人属性</a>
					<a href="" class="nav-item">个性签名</a>
					<a href="" class="nav-item">其他</a>
				</div>
				<div class="nav-list">
					<span class="nav-title nav-account-set">帐号设置</span>
					<a href="" class="nav-item">账号管理</a>
					<a href="" class="nav-item">账号绑定</a>
					<a href="" class="nav-item">隐私管理</a>
					<a href="" class="nav-item">认证</a>
				</div>
			</div>
			<div class="main">
				<div class="section">
					<div class="sec-header clearfix">
						<h3>基本信息</h3>
						<a href="" class="modify">修改</a>
					</div>
					<form class="data-cont" onsubmit="return false;">
						<div class="data-item">
							<span class="label">昵称：</span>
							<div>qq_482s79c1638u</div>
						</div>
						<div class="data-item">
							<span class="label">登录名：</span>
							<div>qq_482s79c1638u</div>
						</div>
						<div class="data-item">
							<span class="label">等级：</span>
							<div>Lv.1</div>
						</div>
						<div class="data-item">
							<span class="label">登录名：</span>
							<div>qq_482s79c1638u</div>
						</div>
						<div class="data-item">
							<span class="label">性别：</span>
							<div>男</div>
						</div>
						<div class="data-item">
							<span class="label">所在地：</span>
							<div>未选择</div>
						</div>
						<div class="data-item">
							<span class="label">婚姻状况：</span>
							<div>未婚</div>
						</div>
						<div class="data-item">
							<span class="label">生日：</span>
							<div>0000-00-00</div>
						</div>
						<div class="data-item">
							<span class="label">注册时间：</span>
							<div>2016-05-20 09:04:43</div>
						</div>
						<div class="data-item">
							<span class="label">最后登录：</span>
							<div>2016-05-21 17:47:53</div>
						</div>
					</form>
				</div>
				<div class="section">
					<div class="sec-header clearfix">
						<h3>个人成就</h3>
					</div>
					<div class="data-cont data-attainment">
						<div class="data-item">
							<span class="label">论坛贡献：</span>
							<div class="clearfix">
								<span class="record-num first">
									<a href="" class="red-color">0</a>
									<br />
									帖子
								</span>
								<span class="record-num">
									<a href="" class="red-color">0</a>
									<br />
									精华
								</span>
								<span class="record-num">
									<a href="" class="red-color">0</a>
									<br />
									回复
								</span>
							</div>
						</div>
						<div class="data-item">
							<span class="label">问答贡献：</span>
							<div class="clearfix">
								<span class="record-num first">
									<a href="" class="red-color">0</a>
									<br />
									提问
								</span>
								<span class="record-num">
									<a href="" class="red-color">0</a>
									<br />
									回答
								</span>
								<span class="record-num">
									<a href="" class="red-color">0</a>
									<br />
									被邀请
								</span>
								<span class="record-num">
									<a href="" class="red-color">0</a>
									<br />
									回答积分
								</span>
								<span class="record-num">
									<a href="" class="red-color">0</a>
									<br />
									已兑换
								</span>
								<a class="rules" href="">如何赚取问答积分？</a>
							</div>
						</div>
						<div class="data-item">
							<span class="label">Z金豆：</span>
							<div class="clearfix">
								<span class="record-num first">
									<a href="" class="red-color">0</a>
									<br />
									Z金豆
								</span>
								<span class="record-num">
									<a href="" class="red-color">0</a>
									<br />
									已兑换
								</span>
								<a class="rules" href="">如何赚取积分？</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--底部-->
		<div class="zol-global-footer">
			<div class="zol-footer">
				<div class="footerw-2015">
					<span>
						<a href="">公司简介</a>
						|
						<a href="">公司历程</a>
						|
						<a href="">营销推广</a>
						|
						<a href="">媒体合作</a>
						|
						<a href="">品牌大全</a>
						|
						<a href="">招聘信息</a>
						|
						<a href="">联系方式</a>
						|
						<a href="">隐私声明</a>
						|
						<a href="">站点地图</a>
						|
						<a href="">反馈纠错</a>
					</span>
					 ©2016 中关村在线 版权所有
				</div>
			</div>
		</div>
	</body>
</html>


















