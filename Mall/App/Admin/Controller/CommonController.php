<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;

//后台公共控制器
 class CommonController extends Controller{
 	//构造方法执行的时候回自动执行里面会放一些常用的方法
 	public function __init(){
		//如果用户没有登录
		//rbac模式
		//如果用户没有登录的话，让他登陆
		//调用框架方法 Rbac
		if(!Rbac::isLogin()) go(U('Login/index'));
		//判断是否有权限
		if(!Rbac::verify()) View::error('没有权限，请不要乱点！',U('Index/welcome'));
		}
 }












 ?>