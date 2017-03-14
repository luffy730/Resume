<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>登录- ZOL商城</title>
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/index.css"/>
	</head>
	<body class="login-index">
		<!--头部wrappe开始-->
		<div id="header">
			<div class=" head clearfix">
				<div class="register-bar">
					<a href="<?php echo U('Reg/index')?>">立即注册</a>还没有ZOL商城账号？
				</div>
				<div class="logoa"> 
                	<a title="ZOL商城" href="">
                	<img title="ZOL商城" alt="ZOL商城" src="./Public/Home/images/logo.png" height="60" width="182">
                	<p>中关村在线旗下网上商城</p></a>
                </div>
			</div>
		</div>
		<!--头部wrappe开始-->
		<!--表单提交区域开始-->
		<form id="J_loginForm" action="" method="post">
			<div class="login-wrap clearfix">
			<!--左侧图片区域-->
				<div class="ad-div">
					<div id="">
						<a href="">
							<img src="./Public/Home/images/99.jpg" alt="" height="350" width="520">
						</a>
					</div>
				</div>
			<!--左侧图片区域-->
			<!--右侧表单区域-->
				<div class="login-layer">
					<div class="login-head">                        
                        <a href="" class="otherLogin-bar mobileLogin-bar" rel="J_phone">手机动态码登录</a>                                
                        <h3>登录ZOL商城</h3>                        
                    </div>
                    <div class="login-content" id="J_login_common">
                        <div class="login-wrong-tips" id="J_login-wrong-tips" style="display:none;">
                        	-
                        </div>
                        <div class="form-item username">
                            <input value="" autocomplete="off" placeholder="手机号/邮箱/用户名" class="text" id="J_loginUser" name="nickname" maxlength="100"  required type="text">
                            <i class="remove" style="display:none;"></i>
                            <ul style="display:none;" class="account-list" id="J_accountList">                                
                            </ul>
                        </div>
                        <div class="form-item">                            
                            <input autocomplete="off" placeholder="密码" class="text" id="J_loginPsw" required maxlength="20" type="password" name="pwd">
                            <i class="remove" style="display:none;"></i> 
                            <span class="case-tips" id="J_loginCapsLock">
                            	大小写锁定已打开<i class="ico"></i>
                            </span> 
                        </div>
                        <div class="form-other"> 
                            <label class="autologon">
                            	<!--<input type="checkbox" name="" value="">记住登录状态-->
                            </label>
                            <a target="_blank" href="http://my.zol.com.cn/index.php?c=getPassword">忘记密码？</a>
                        </div>
                        <input value="1" name="" id="J_login_type" type="hidden">
                        <input value="登 录" class="login-layer-btn" id="J_loginBtn" type="submit">
                        <span style="display:none;" class="submit-loading" id="J_loginingBtn">正在登录...</span> 
                    </div>
					<div class="login-content mobileLogin-content" id="J_login_mobile" style="display:none;">                        
                        <div class="login-wrong-tips" id="J_login-mobile-wrong-tips" style="display:none;">
                        	-
                        </div>
                        <div class="form-item ">                            
                            <input autocomplete="off" placeholder="手机号" class="text" id="J_login_mobile_number" name="" type="text">
                        </div>
                        <div class="form-item captcha-item">
                            <input value="" autocomplete="off" placeholder="图片验证码" class="text" id="J_login_mobile_picCode" name="" maxlength="5" type="text">
                            <input name="" id="J_login_mobile_token" value="2a9a62bfe226a6052f6773b0456742a1" type="hidden">
                            <img src="" alt="图片验证码" id="J_login_mobile_img" height="40" width="100">
                        </div>                        
                        <div class="form-item phone-number">                            
                            <input autocomplete="off" placeholder="短信验证码" class="text" id="J_login_mobile_code" name="" type="text">
                            <input name="" value="发送验证码" class="btn" id="J_login_send_button" type="button">
                            <span class="captcha-loading" id="J_login_send_wait" style="display: none">100秒后重新获取</span>                            
                        </div>                        
                        <input value="登 录" class="login-layer-btn" id="J_loginBtn_mobile" type="button">
                        <span style="display:none;" class="submit-loading" id="J_loginingBtn_mobie">正在登录...</span> 
                    </div>
					<div class="login-foot clearfix">
						<span>合作账号登录：</span>
                        <a target="_blank" class="sina" href="">用微博账号登录</a>
                        <a target="_blank" class="qq" href="">用QQ账号登录</a>
                        <a target="_blank" class="alipay" href="">用支付宝账号登录</a>
                        <a target="_blank" class="baidu" href="">用百度账号</a>
                    </div>
				</div>
			<!--右侧表单区域-->
			</div>
		</form>
		<!--表单提交区域结束-->
		<!--footer区域开始-->
		<div class="footer">
	    <div class="wrapper clearfix">
	        <div class="about">
	        	<a href="" target="_blank">关于ZOL商城</a>|
	        	<a href="" target="_blank">联系我们</a>|
	        	<a href="" target="_blank">帮助中心</a>
	        </div>
	        <div class="copyright">©<script type="text/javascript">var yearStr;
	            now = new Date();
	            yearStr = now.getFullYear();
	            document.write(yearStr);</script>2016. 中关村在线 版权所有</div>
	    	</div>
		</div>
		<!--footer区域结束-->
	</body>
</html>
