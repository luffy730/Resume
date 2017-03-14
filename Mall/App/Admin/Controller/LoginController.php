<?php namespace Admin\Controller; 
use Hdphp\Controller\Controller;

//后台登陆控制器
	class LoginController extends Controller{
		//登陆页面
		public function index(){
			if(IS_POST){
				//接收post里面的usernmae
				$username=Q('post.username');
				//接收密码
				//给密码默认值，然后md5加密
				$password=Q('post.password','','md5');
				//查询数据库sql语句
				//"SELECT *FROM user WHERE username='{$username}'AND password='{$passworde}'";
				$userData=Db::table('manager')->where("username='{$username}' ")->get();
				//如果匹配成功的话
				//sp($userData);die;
				//$userData是一个二维数组，所以下面在存放的时候要加上下标0
				if(!$userData)
				{
					View::error('用户名不存在');
				}
				if($password !=$userData[0]['password'])
				{
					View::error('密码错误');
				}
				//把数据存进session
				//后边做修改密码的时候会用到uid ,判断哪个用户登陆的时候会用到 username
				$_SESSION['uid']=$userData[0]['uid'];
				$_SESSION['adminname']=$userData[0]['username'];
	
				//走到下面证明匹配成功 ,成功提示，跳转 Index控制器，显示后台首页
	//      View::success('登陆成功',U('Index/index'));
				View::success('登陆成功',U('Index/index'));
			}
			//载入模板
			View::make();
		}
		
		/**
		 * 退出
		 */
		 public function out(){
		 	//删除session变量
		 	session_unset();
			//删除session文件
			session_destroy();
			//跳转默认控制器默认方法
			go(U('Index/index'));
		 }
	}	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	?>