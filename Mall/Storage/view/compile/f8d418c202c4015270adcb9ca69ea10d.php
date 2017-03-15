<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>注册_ZOL商城</title>
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/index.css"/>
		<script src="./Public/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
	    <script src="./Public/hdjs/hdjs.min.js" type="text/javascript" charset="utf-8"></script>
	    <link rel="stylesheet" type="text/css" href="./Public/hdjs/hdjs.css"/>
	</head>
	<body>
		<!--头部wrapper区域开始-->
			<div  id="header">
				<div class="head">
					<div class="register-bar">
						<a href="<?php echo U('Login/index')?>">立即登录</a>
						已经有ZOL商城账号？
					</div>
					<div class="logoa">
						<a title="ZOL商城" href="">
						<img src="./Public/Home/images/logo.png" alt="ZOL商城" width="182" height="60" id="img"/>
						<p>中关村在线旗下网上商城</p>
						</a>
					</div>
				</div>
			</div>
		<!--头部wrapper区域结束-->
		<!--register-wrap 主体区域开始-->
			<div id="register-wrap">
				<div class="title">30秒快速注册，加入ZOL商城</div>
				<form onsubmit="return hd_submit(this,'<?php echo U('Reg/reg')?>','<?php echo U('Login/index')?>')" id="J_RegisterForm">
					<div class="register-module">
					<ul class="register-tab clearfix" id="J_register">                                
						<li class="current" rel="phone">
							<span class="phone-number">用手机号注册</span>
						</li>                                
					</ul>
					<input value="1" name="" id="J_register_type" type="hidden">
					<div id="J_register_phone" class="register-phone-number">
						<div class="register-form">
							<div class="label">
								<em class="xh">*</em>账号：
							</div>
	                        <input name="cIdentification" id="J_register_phone_number" class="text" required type="text">
							<i class="right-tips" style="display: none"></i>
							<i class="wrong-tips" style="display:none;" id="J_register_phone_tips">短信验证码错误，请重新填写</i>
							<div class="tips">请填账号</div>
						</div>
						<div class="register-form">
							<div class="label">
								<em class="xh">*</em>昵称：
							</div>
	                        <input name="nickname" id="J_register_phone_number" class="text" type="text">
							<i class="right-tips" style="display: none"></i>
							<i class="wrong-tips" style="display:none;" id="J_register_phone_tips">短信验证码错误，请重新填写</i>
							<div class="tips">请填写昵称</div>
						</div>
						<div class="register-form">
							<div class="label">
								<em class="xh">*</em>验证码：
							</div>
							<div class="email-captcha clearfix">
								<input name="code" id="J_register_checkcode_phone" class="text" type="text">
		                        <input name="" id="J_register_checkcode_token_phone" value="1463734562109" type="hidden">
		                        <span class="captcha-img"><img src="<?php echo U('Reg/code')?>" alt="" id="J_Captcha-Img_phone" height="38" width="98"></span>
									<a href="javascript:void(0)" class="captcha-change" id="J_Captcha-Img_Change_phone">换一张</a>
							</div>
							<i class="wrong-tips" style="display:none;margin-left:38px;" id="J_register_checkcode_tips_phone"></i>
							<div class="tips">请填写图片验证码</div>
						</div>
						<!--<div class="register-form" style="height: 42px;">
							<div class="label">
								<em class="xh">*</em>验证码：
							</div>
							<div class="sms-captcha clearfix">
								<input name="J_register_phone_code" id="J_register_phone_code" class="text" type="text">
	                            <input name="J_register_phone_type" id="J_register_phone_type" value="0" type="hidden">
								<input name="J_register_phone_send" id="J_register_phone_send" value="获取短信验证码" class="get-captcha" type="button">
	                                                        
	                            <span class="loading" style="display:none;" id="J_register_send_wait"><em>100</em>秒后重新获取</span>
								<span class="hint" style="display:none;">短信验证码已发送</span>                                                        
							</div>
						<i class="wrong-tips" style="display:none;" id="J_register_phone_code_tips"></i>						
						<div class="tips">请填写手机号码，然后点击[获取验证码]</div>
						</div>-->
						<div class="register-form" style="height: 42px;">
							<div class="label">
								<em class="xh">*</em>密码：
							</div>
	                        <input name="pwd" id="J_register_pasword_phone" class="text" type="password">						
							<i class="wrong-tips" style="display:none;" id="J_register_pasword_phone_tips">密码不可以包含特殊字符</i>
							<div class="tips">6-16位字母和数字的组合，不可用特殊字符</div>
						</div>
						<div class="register-form">
							<div class="label">
								<em class="xh">*</em>确认密码：
							</div>
							<input name="" id="J_register_regPasword_phone" class="text" type="password">
							<i class="wrong-tips" style="display:none;" id="J_register_regPasword_phone_tips"></i>
							<div class="tips">再次输入密码</div>
						</div>
						<label class="agreement">                                            
                            <input value="1" name="" id="J_regRead_phone" checked="" type="checkbox">同意<a href="" target="_blank">《商城用户协议》</a><a href="" target="_blank" class="xy_a">《隐私权说明》</a>
                        </label>
						<input  value="注册" class="register-btn" id="J_register_phone_submit" type="submit">
						<span style="display:none" class="register-btn submit-loading" id="J_register_phone_loading">正在注册...</span>
					</div>	
					<div class="register-email" style="display:none;" id="J_register_email_layer">
					<div class="register-form">
						<div class="label"><em class="xh">*</em>邮箱：</div>
						<div class="email clearfix">
							<input name="J_register_email" id="J_register_email" class="text" type="text">
							<ul class="account-list" style="display:none;" id="J_register_accountList">
							</ul>
						</div>
						<i class="wrong-tips" style="display:none;" id="J_register_email_tips"></i>						
						<div class="tips">请填写邮箱</div>
					</div>
                                    
					<div class="register-form">
						<div class="label"><em class="xh">*</em>密码：</div>
                                                <input name="" id="J_register_pasword" class="text" type="password">						
						<i class="wrong-tips" style="display:none;" id="J_register_pasword_tips"></i>
						<div class="tips">请填写密码</div>
					</div>
                                    
					
					<div class="register-form">
						<div class="label"><em class="xh">*</em>确认密码：</div>
						<input name="" class="text" id="J_register_reg_pasword" type="password">
						<i class="wrong-tips" style="display:none;" id="J_register_reg_pasword_tips"></i>
						<div class="tips">再次输入密码</div>
					</div>
					
					<div class="register-form">
						<div class="label"><em class="xh">*</em>验证码：</div>
						<div class="email-captcha clearfix">
							<input name="" id="J_register_checkcode" class="text" type="text">
                                                        <input name="" id="J_register_checkcode_token" value="1463734562108" type="hidden">
                                                        <span class="captcha-img"><img src="https://service.zol.com.cn/captcha.php?token=1463734562108&amp;numCnt=5&amp;width=98&amp;height=38" alt="" id="J_Captcha-Img" height="38" width="98"></span>
							<a href="javascript:void(0)" class="captcha-change" id="J_Captcha-Img_Change">换一张</a>
						</div>
						<i class="wrong-tips" style="display:none;margin-left:38px;" id="J_register_checkcode_tips"></i>
						<div class="tips">请填写验证码</div>
					</div>					
                                        <label class="agreement">
                                            <input value="1" name="" id="J_regRead" checked="" type="checkbox">同意<a href="http://help.zol.com/index.php?c=Detail&amp;id=1019" target="_blank">《商城用户协议》</a><a href="http://help.zol.com/index.php?c=Detail&amp;id=1022" target="_blank" class="xy_a">《隐私权说明》</a>
                                        </label>					
					<input name="" id="J_register_email_submit" value="注册" class="register-btn" type="submit">
                                        <span style="display:none" class="register-btn submit-loading" id="J_register_email_loading">正在注册...</span>
			</div>
				</div>	
					<!--fast-login开始-->
			<div class="fast-login">
				<p>如果您已经注册，请
					<a href="">直接登录
					</a>或者用以下方式登录：
				</p>
				<div class="fast-login-list">
					<a target="_blank" href="" class="sina">新浪微博登录</a>
					<a target="_blank" href="" class="qq">腾讯QQ登录</a>
					<a target="_blank" href="" class="alipay">支付宝账号登录</a>
					<a target="_blank" href="" class="baidu">百度账号登录</a>
				</div>
			</div>
		<!--fast-login结束-->
				</form>
			</div>
		<!--register-wrap 主体区域结束-->
	
		<!--footer开始-->
			<div class="footer">
			    <div class="wrapper clearfix">
			        <div class="about">
			        	<a href="" target="_blank">关于ZOL商城</a>|
			        	<a href="" target="_blank">联系我们</a>|
			        	<a href="、" target="_blank">帮助中心</a>
			        </div>
			        <div class="copyright">©<script type="text/javascript">var yearStr;
			            now = new Date();
			            yearStr = now.getFullYear();
			            document.write(yearStr);</script>2016. 中关村在线 版权所有
			        </div>
			    </div>
			</div>
		<!--footer结束-->
	</body>
</html>
