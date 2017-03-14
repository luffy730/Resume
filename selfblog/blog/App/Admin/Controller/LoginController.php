<?php namespace Admin\Controller; 

use Hdphp\Controller\Controller;

//后台登录控制器
class LoginController extends Controller{

	//登陆页面
	public function index(){
		//在表单提交的时候执行以下语句
		if(IS_POST){
			//接收post里面的username
			//之前的方法
//			$username=$_POST['username'];
			//现在的方法使用Q函数
			//请求参数 获取$_REQUEST 参数 设置第二参数，代表参数不存在的时候设置默认值
			$username=Q('post.username');
			//接收密码
			//给密码默认值，然后md5加密
			//获取post提交的 密码参数，并设置默认值 空
			$password=Q('post.password','','md5');
			//查询数据库
			//"SELECT * FROM user WHERE username='{$username}' AND password'{$password}'";
			$userData=Db::table('user')->where("username='{$username}' AND password='{$password}'")->get();
			if($userData){
				//把从数据库拿到的信息放入到session
				//把用户id存入session
			//在进入后台页面的时候判断是否登陆要用到还有做修改密码的时候会用到
				$_SESSION['uid']=$userData[0]['uid'];
				//把用户信息的username存入到session，在登陆以后,显示用户已登录的时候回用到
				$_SESSION['username']=$userData[0]['username'];
				//跳转到后台页面
				//u函数生成url ？m=admin&c=index&a=index
				$this->success('登陆成功',U('Admin/Index/index'));
			}else{
				//出错就回调到原网页
				$this->error('用户名或密码错误');
			}
		}
		//载入页面
		View::make();
	}
	//退出登陆
	public function out(){
		//删除session变量
		session_unset();
		//删除session文件
		session_destroy();
		//跳转页面，可以传递第二参数，设置跳转时间 ，设置第三参数，跳转时显示信息，（几秒后跳转）
		go(U('Admin/Login/index'),3,'3秒后跳转');
	}
	
	//显示验证码

	
   
}

































