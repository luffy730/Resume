<?php namespace Home\Controller;
use Hdphp\Controller\Controller;
//前台登陆控制器
class LoginController extends Controller{
	
	/**
	 * 登陆
	 */
	public function login(){
		
	}
	/**
	 * 显示登陆界面
	 */
	 public function index(){
	 	if(IS_POST){
	 		//接收 post里面的username
	 		$nickname=Q('post.nickname');
			//接收密码
			//给密码默认值，然后md5加密
			$pwd=Q('post.pwd','','md5');
			//查询数据库sql语句
			//SELECT * FROM client WHERE nickname='{$username}' AND pwd='{$pwd}';
			$userData=Db::table('client')
			->where("nickname='{$nickname}' AND pwd='{$pwd}'")
			->get();

			//如果匹配成功的话
			if($userData){
				//把从数据库拿到的信息放入到session里面
				//这里存放抓奸是因为在判断用户是否登陆的时候会用到，还有就是修改密码的时候会用到
				$_SESSION['clid']=$userData[0]['clid'];
				//存放用户名到session里面
				$_SESSION['nickname']=$userData[0]['nickname'];
				//成功提示 跳转内容页
				$this->success('登陆成功',U('Index/index'));
			}else{
				//出错就返回原网页
				$this->error('用户名或密码错误');
			}
	 	}
			
	 	//载入模板
	 	View::make();
	 }
}























 ?>