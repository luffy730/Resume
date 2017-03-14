<?php namespace Home\Controller;
use Hdphp\Controller\Controller;
//前台公共控制器
class CommonController extends Controller{
	//构造方法实例化的时候会自动执行
	public function __construct(){
		//调用父级的构造方法不然会被覆盖
		parent::__construct();
		//如果用户没有登录
		if(!isset($_SESSION['clid'])){
			//跳转到登陆控制器显示登陆界面让其登陆
			go(U('Home/Login/index'));
		}
	}
}























 ?>