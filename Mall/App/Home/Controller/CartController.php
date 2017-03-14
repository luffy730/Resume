<?php namespace Home\Controller;
use Hdphp\Controller\Controller;

//前台购物车控制器i
class CartController extends CommonController{
	
	/**
	 * 加入到购物车添加
	 */
	
	 // ajax CartIn
	 public function CartIn(){
	 	//接收异步发送过来的数据
	 	$id=Q('post.id',0,'intval');
		$name=Q('post.name');
		$price=Q('post.price');
		$num=Q('post.num',0,'intval');
		$sIds=Q('post.sIds');
		$list=Q('post.list');
		$glModel= new \Common\Model\Glist;
		$glData=$glModel->where("goods_gid={$id}")->get();
		//重组数组存进session
		$data=array(
			'id'=>$id,
			'name'=>$name,
			'price'=>$price,
			'num'=>$num,
			'options'=>$sIds,
			'list'=>$list,
		);
		//调用框架的方法添加到session
		//打印得到的结果是个多维数组（至少三维）
		Cart::add($data);
		$re = $_SESSION['cart']['goods'];
		echo json_encode($_SESSION['cart']['goods']);die;
//		sp($_SESSION);
	 }
	 /**
	  * 批量删除session
	  */
	 public function del(){
	 	//删除session中的购物车内容
	 	unset($_SESSION['cart']);
		//跳转index方法显示购物车页面
		go(U('index'));
	 }
	 /**
	  * 清除单条 sesssion
	  */
	  public function delOne(){
	  	//删除session变量
	  	$gid=Q('get.gid');
		if(isset($_SESSION['cart']['goods'][$gid]))unset($_SESSION['cart']['goods'][$gid]);
		go(U('index'));
	  }
	/**
	 * 显示
	 */
	public function index(){
		//调用框架方法获得存入session里面的商品的信息得到的是一个一维数组
		$data=Cart::getGoods();
		//调用框架方法获得存入session里面商品的总数
		$newData=Cart::getTotalNums();
		//调用框架方法获得存入session商品的总价格
		$totalprice= Cart::getTotalPrice();
		//获得商品属性数据
		//分配变量在在页面输出
		View::with('to',$totalprice);
		View::with('data',$data);
		View::with('new',$newData);
		//载入模板
		View::make();

	}
	/**
	 * 异步减数量，总价
	 */
	 public function subtract(){
	 	$sid=Q('post.t');
		$num=Q('post.num');
		$data=array(
			'sid'=>$sid,
			'num'=>$num
		);
		//调用框架方法更新购物车
		Cart::update($data);
	 }
	/**
	 * 异步改变数量，总价(加)
	 */
	 public function plus(){
	 	//获得异步发送过来要更新商品的sid
	 	$sid=Q('post.t');
		$num=Q('post.num');
		$data=array(
			'sid'=>$sid,
			'num'=>$num
		);
		Cart::update($data);
	 }
	 /*
	  * 退出
	  */
	  public function out(){
	  	//删除session变量
	 	session_unset();
		//删除session文件
		session_destroy();
		//跳转 index方法显示模板
		go(U('index'));
	  }
}

























 ?>