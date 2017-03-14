<?php namespace Common\Model;
use Hdphp\Model\Model;
class Order extends Model{
	//指定模型操作的表
	protected $table='orders';
	//自动验证
//	protected $validate=array(
//	//array(字段ing，验证方法，错误信息，验证条件，验证时间)
//		array()
//	);
	
	//自动完成
	protected $auto=array(
		//自动完成，订单生成的时间
		array('riseTime','time','function',3,1),
		//自动完成用户id
		array('client_clid','clid','method',3,1),
		
	);
	//获得前台用户id
	public function clid(){
		//返回session里面的用户id
		return $_SESSION['clid'];
	}
	
	/**
	 * 添加订单
	 */
	 public function addData($sid){
	 	//添加之前必须要经过create否则无法添加
	 	//只有create才可以执行制动验证， 自动完成
	 	if(!$this->create()) return false;
		sp($_POST);
		//声明一个用来保存重组数组的空数组，如果不是数组的话，那么只保存一条
	 	$data=array();
		//遍历session里面的信息，是否在购物车传递过来的 sid的数组中，如果在的话显示在页面上
		foreach($_SESSION['cart']['goods'] as $k=>$v)
		{
			//$k是否在$sid中
			if(in_array($k,$sid)){
			//把$v赋值给
			$data[$k]=$v;
			}
		}
		//遍历从sessiont获得的数据，获得所需要的信息添加到订单表
		foreach ($data as $k => $v) {
			$new = array(
			'orderNumber'=>Cart::getOrderId(),//订单号
			'riseTime'=>time(),
			'client_clid'=>$_SESSION['clid'],
			);
		}
		//执行框架的添加方法添加到订单表
		$oid=$this->add($new);
		//添加到订单列表
		//实例化订单列表模型
		$listModel= new \Common\Model\OrderList;
		$c=0;
		foreach($data as $v)
		{
			
			$b=array(
				'subtotalPrice'=>$v['total'],
			);
			$c+=$v['total'];
			
		}
//		sp($c);
		foreach ($data as $k=>$v){
			$one=array(
			'goods_gid'=>$v['id'],
			'amount'=>$v['num'],
			'subtotalPrice'=>$v['total'],
			'order_orid'=>$oid,
			'goods_gname'=>$v['name'],
			'goods_price'=>$v['price'],
			'goods_listpic'=>$v['list'],
			'goods_options'=>$v['options'],
			'goods_totalprice'=>$c,
			'client_clid'=>$_SESSION['clid']
			);
			$listModel->add($one);
		}
		return $oid;
		//返回真,这样添加过程中出的错误就会被getError捕获到并且反馈，如果没有返回真提示错误信息时是空白的
		return true;
	 }

	/**
	 * 编辑订单
	 */
	 public function editData(){
	 	//编辑之前必须要经过create 否则无法编辑
	 	if(!$this->create()) return false;
		$data=array(
			"orid"=>Q('post.orid'),
			'orderStatus'=>4,
			'orderNumber'=>Q('post.orderNumber'),
			'consignee'=>Q('post.consignee'),
			'recieveAddress'=>Q('post.recieveAddress'),
			'riseTime'=>Q('post.riseTime'),
			'client_clid'=>Q('post.client_clid'),
			'remark'=>Q('post.remark'),
			'priceAggregate'=>Q('post.priceAggregate')		
		);
		$this->save($data);
		return $data;
		
	 }
}




















 ?>