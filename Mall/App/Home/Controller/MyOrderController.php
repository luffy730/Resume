<?php namespace Home\Controller;
use Hdphp\Controller\Controller;
//前台我的订单控制器
class MyOrderController extends CommonController{

   /**
	*	异步接收要编辑的数据
	*/
	public function edit(){
		//接收异步发送过来的数据
		$consignee=Q('post.consignee');
		$province=Q('post.province');
		$city=Q('post.city');
		$area=Q('post.area');
		$FullAddress=Q('post.FullAddress');
		$rfixphone=Q('post.rfixphone');
		$rphone=Q('post.rphone');
		$rid=Q('post.rid');
		$action=Q('post.action');
		//实例化收货地址模型
		$reModel = new \Common\Model\Receipt;
		if(IS_POST){
			if($data = $reModel->editData()){
				echo json_encode($data);exit;
			}
			
		}
	}
	/**
	 * 异步接收地址id
	 */
	public function rid(){
		//接收异步发送过来要编辑的收货地址的id
		$rid=Q('post.rid');
		//实例化收货地址模型
		$reModel= new \Common\Model\Receipt;
		//查询到要编辑的地址的数据
		$reData= $reModel->where("rid={$rid}")->find();
		//返回数据给js以 json的形式
		echo json_encode($reData);exit;
	}
	/**
	 * zol个人中心页面
	 */
	public function selfcenter(){
		//载入模板
		View::make();
	}
	/**
	 * 收货地址管理页面
	 */
	public function address(){
		//实例化收货地址模型
		$addModel= new \Common\Model\Receipt;
		//获得数据（用户的收货地址）
		$addData=$addModel
		->where("client_clid={$_SESSION['clid']}")
		->get();
		//分配变量在页面输出
		View::with('add',$addData);
		//载入模板
		View::make();
	}
	/**
	 * 显示个人中心页面
	 */
	public function center(){
		//实例化商品模型
		$goModel= new \Common\Model\Goods;
		//获取前4条数据
		$goData= $goModel->limit(4)->get();
		//分配变量在页面输出
		View::with('go',$goData);
		//载入模板
		View::make();
	}
	
	/**
	 * 默认方法显示我的订订单页面
	 */
	 public function index(){
	 	//实例化商品模型
	 	$goModel= new \Common\Model\Goods;
		//获得商品数据
		$goData= $goModel->limit(4)->get();
		//分配变量，在页面输出
		View::with('go',$goData);
		//载入订单列表模型
		$listModel= new \Common\Model\OrderList;
		//获得订单列表数据
		$listData= Db::table('orders')
		->where("client_clid={$_SESSION['clid']}")
		->get();
		foreach ($listData as $k => $v)
		{
			$listData[$k]['son'] = Db::table("orderlist")->where("order_orid={$v['orid']}")->get();
		}
		//分配变量在页面输出
		View::with('list',$listData);
	    //载入模板
	 	View::make();
	 }
	 /**
	  * 我的订单页面异步修改订单状态
	  */
	  public function last(){
	  	//接收异步发送过来要编辑的订单的主键
	  	$orid=Q('post.orid');
	  	$orderStatus=Q('post.orderStatus');
		$orderNumber=Q('post.orderNumber');
		$consignee=Q('post.consignee');
		$recieveAddress=Q('post.recieveAddress');
		$riseTime=Q('post.riseTime');
		$clid=Q('post.clid');
		$remark=Q('post.remark');
		$priceAggregate=Q('post.priceAggregate');
	  	//实例话订单模型
		$orModel= new \Common\Model\Order;
		//更改订单状态		
		$a=$orModel->where("orid=$orid")->update(array('orderStatus'=>1));
		$data=array(
			"orid"=>$orid,
			'orderStatus'=>$orderStatus,
			'orderNumber'=>$orderNumber,
			'consignee'=>$consignee,
			'recieveAddress'=>$recieveAddress,
			'riseTime'=>$riseTime,
			'client_clid'=>$clid,
			'remark'=>$remark,
			'priceAggregate'=>$priceAggregate
		);
		$orModel->save($data);
		//返回数据给js 以json的形式
		echo json_encode($a);exit;
	  }
	  /**
	   * 取消订单
	   */
	   public function cancel(){
	   	//接收异步发送过来要编辑的订单的主键
	  	$orid=Q('post.orid');
	  	$orderStatus=Q('post.orderStatus');
		$orderNumber=Q('post.orderNumber');
		$consignee=Q('post.consignee');
		$recieveAddress=Q('post.recieveAddress');
		$riseTime=Q('post.riseTime');
		$clid=Q('post.clid');
		$remark=Q('post.remark');
		$priceAggregate=Q('post.priceAggregate');
		//实例化订单模型
		$orModel= new \Common\Model\Order;
			if(IS_POST){
				if($data=$orModel->editData()){
					echo json_encode($data);exit;
				}
			}
	   }
}













 ?>