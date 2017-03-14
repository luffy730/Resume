<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;
//后台订单管理控制器
class OrderController extends CommonController{
	//定义私有属性
	private $model;
	//构造方法
	public function __construct(){
		//调用父级的构造方法，不然会被覆盖
		parent::__construct();
		//实例化订单模型
		$this->model= new \Common\Model\Order;
	}
	
	/**
	 * 发货
	 */
	 public function send(){
	 	//获得要发货订单的id
	 	$orid=Q('get.orid');
		//修改订单状态
		$this->model
		->where("orid={$orid}")
		->save(array('orderStatus'=>2));
		View::success('已发货');
	 }
	
	/**
	 * 显示订单数据
	 */
	 public function index(){
	 	//获取的所有订单数据
	 	$data=$this->model->get();
		//分配数据，在页面输出
		View::with('data',$data);
		//载入模板
	 	View::make();
	 }
	 /**
	  * 删除订单
	  */
	  public function del(){
	  	//接收get传递过来要删除订单 的id
	  	$orid=Q('get.orid',0,'intval');
		//阻止sql语句执行删除
	  	$this->model->where("orid={$orid}")->delete();
		View::success('删除成功');
	  }
}




















 ?>