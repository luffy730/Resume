<?php namespace Admin\Controller; 

use Hdphp\Controller\Controller;

//后台默认控制器
class IndexController extends CommonController{
	
	
	
    //默认后台首页
    public function index(){
    	//载入页面
    	View::make();
    }
	/**
	 * 欢迎界面
	 */
	 public function welcome(){
	 	//载入页面
	 	View::make();
	 }
	 
	 /**
	  * 修改密码
	  */
	 public function updatepassword(){
	 	//在用户点击了表单提交的时候进行修改
	 	if(IS_POST){
	 	 //1.判断旧密码是否正确
	 	 //接收密码
	 	 //给密码默认值，然后md5加密
	 	 $oldPassword=Q('post.oldPassword','','md5');
		 //获得当前用户登陆的数据
		 
		 //查看用户存在session里的用户id
		 //"SELECT * FROM user WHERE uid='{$_SESSION['uid']}'"
		 $userData=Db::table('user')->where("uid={$_SESSION['uid']}")->get();
		 //如果远密码有错误
		 //sp($userData);
		 //因为查询出来的结果是二维数组，所以这里要加上下标[0]
		 if($userData[0]['password'] !=$oldPassword){
		 	$this->error('原密码错误');
		 }
		 //2.判断两次密码是否相同
		 if(Q('post.newPassword') != Q('post.confirmPassword')){
		 	$this->error('两次密码不相同');
		 } 
		 //3.修改
		 //接收用户传递过来的新密码
		 //给密码默认值，然后md5加密
		 $password=Q('post.newPassword','','md5');
		 //"UPDATE user SET password='{$password} WHERE uid={$_SESSION['uid]}'"; 
		 Db::table('user')->where("uid={$_SESSION['uid']}")->update(array('password'=>$password));
		 //删除session,让其重新登录
		 //删除sesssion变量
		 session_unset();
		 //删除session文件
		 session_destroy();
		 //跳转到登录页面
		 $url=U('Login/index');
		 $str=<<<str
<script>
parent.location.href='{$url}';
</script>
str;
		echo $str;exit;
	 	}
	 	View::make();
	 }
}

































