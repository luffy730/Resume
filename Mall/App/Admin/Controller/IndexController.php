<?php namespace Admin\Controller; 

use Hdphp\Controller\Controller;

//后台默认控制器
class IndexController extends CommonController{


	
    //载入模板
    public function index(){
//  	sp($_SESSION);
       View::make();
    }
	
	/**
	 * 欢迎界面
	 */
	 public function welcome(){
	 	View::make();
	 }
	 
	 /*
	  * 修改密码
	  */
	  public function updatePassword(){
	  	//在表单提交的情况下进行修改
	  	if(IS_POST){
	  	//1.判断旧密码是否正确
	  	//接收密码
	  	//给密码默认值，然后md5加密
	  	$oldPassword=Q('post.oldPassword',0,'md5');
		//获得当前用户存在session里面的uid
		//"SELECT * FROM user WEHRE uid='{$_SESSION['uid']}'"
		$userData=Db::table('user')->where("uid={$_SESSION['uid']}")->get();
		//如果原密码有错误
//		sp($userData);die;
		//因为得到的是一个二维数组，所以调用的时候要加上下标0
		if($userData[0]['password'] !=$oldPassword){
			$this->error('原密码错误');
			}
		//2.判断两次密码是否相同
		if(Q('post.newPassword') !=Q('post.confirmPassword')){
			$this->error('两次密码不相同');
		}
			
		//3.修改
		//接收用户传递过来的新密码
		//给密码默认值，然后md5加密
		$password=Q('post.newPassword',0,'md5');
		
		//修改sql语句
		//UPDATE user SET password='{$password} WHERE uid={$_SESSION['uid']}';
		Db::table('user')->where("uid={$_SESSION['uid']}")->update(array('password'=>$password));
		//删除session,让其重新登陆
		//删除session变量
		session_unset();
		//删除session文件
		session_destroy();
		//跳转到登陆界面
		$url=U('Login/index');
		//重组字符串
		$str=<<<str
<script>
parent.location.href='{$url}';
</script>		
		
str;
		sp($str);die;
		
		echo $str;exit;


	  	}
	  	View::make();
	  }
	
}
