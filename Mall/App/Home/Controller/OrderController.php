<?php namespace Home\Controller;
use Hdphp\Controller\Controller;
//前台订单控制器
class OrderController extends Controller{
	
	/**
	 * 异步编辑地址
	 */
	public function magic(){
		//接收异步发送过来编辑好的数据
		$consignee=Q('post.consignee');
		$FullAddress=Q('post.FullAddress');
		$province=Q('post.province');
		$city=Q('post.city');
		$area=Q('post.area');
		$rphone=Q('post.rphone');
		$rfixphone=Q('post.rfixphone');
		$rid=Q('post.rid');
		//实例化收货地址模型
		$reModel= new \Common\Model\Receipt;
		//在表单提交的时候进行编辑
		if(IS_POST){
			if($data=$reModel->editData()){
				echo json_encode($data);exit;
			}else{
				die(json_encode(array('error'=>1)));
			}
		}
	}
	/**
	 * 异步获取地址
	 */
	public function change(){
		$rid=Q('post.rid');
		//实例化收货地址模型
		$reModel = new \Common\Model\Receipt;
		//查询数据库找到要编辑的那条地址的数据
		$reData= $reModel->where("rid={$rid}")->find();
		//返回数据给js 以json的形式
		echo json_encode($reData);exit;
	}
	/**
	 * 添加订单表（地址）
	 */
	public function edit(){
		//实例化订单模型
		//接收post提交过来的订单id
		$orid=Q('post.orid');
		//接收post提交过来的地址id
		$rid=Q('post.rid');
		//实例化地址模型
		$reModel= new \Common\Model\Receipt;
		//获得用户提交过来的地址的id
		$reData=$reModel->where("rid={$rid}")->get();
		//实例化订单模型
		$orModel= new \Common\Model\Order;
		//在表单提交的时候
		if(IS_POST){
			//遍历地址信息（拿出需要的信息）更改订单表
			foreach ($reData as $v){
				$data=array(
				'consignee'=>$v['consignee'],
				'recieveAddress'=>$v['FullAddress'],
				'remark'=>$_POST['remark'],
				'priceAggregate'=>$_POST['goods_totalprice'],
				'orderStatus'=>0,
				
			);
			}
			
		}
		unset($_SESSION['cart']);
		//阻止sql语句进行更改
		$orData=$orModel
		->where("orid={$orid}")->update($data);
		//跳转股款页面,把收货地址的主键传递给pay方法因为在支付页面需要输出
		go(U('pay',array('rid'=>$rid)));
	}
	
	//显示付款页面
	public function pay(){
		//接收修改订单方法get传递过来的收货地址的主键
		$rid=Q('get.rid');
		//实例化地址模型
		$reModel= new \Common\Model\Receipt;
		//获取收货地址（用户的收货地址）数据
		$reData=$reModel->where("rid={$rid}")->get();
		//分配变量在页面输出
		View::with('re',$reData);
		//建立冠梁关联订单表和订单列表
		$orData=Db::table('orders as o')
		//关联字段是订单的主键
		->join('orderlist','order_orid','=','orid')
		->where("o.client_clid={$_SESSION['clid']}")
		//按照订单主键分组
		->groupBy('o.orid')
		->orderBy('o.riseTime','DESC')
		->limit(1)
		->get();
		View::with('or',$orData);
		//载入模板
		View::make();
	}
	
	/**
	 * 地址异步
	 */
	 public function add(){
	 	//实例化地址模型
	 	$addModel=new \Common\Model\Receipt;
		//在表单提交的时候
		if(IS_POST){
			//执行模型的添加方法
			if($rid = $addModel->addData())
			 	
			{
			//重组数组添加到数据库
			$data=array(
			'rid'=>$rid,
			//收货人
			'consignee'=>Q('post.consignee'),
			//省
			'province'=>Q('post.province'),
			//市
			'city'=>Q('post.city'),
			//区
			'area'=>Q('post.area'),
			//详细地址
			'FullAddress'=>Q('post.FullAddress'),
			//手机
			'rphone'=>Q('post.rphone'),
			//固话
			'rfixphone'=>Q('post.rfixphone'),
			'order_orid'=>Q('post.order_orid')
				);
			}
		}
		//返回数据给js ，以json的形式
		echo json_encode($data);exit;
	 }
	 /**
	  * 添加到订单表，订单列表
	  */
	  public function plus(){
	  	//获得post提交过来
	 	$sid=Q('post.cartId');
		//实例化订单模型
		$orModel= new \Common\Model\Order;
		//在表单的提交的时候
		if(IS_POST){
			//执行模型的添加方法
			if($orid=$orModel->addData($sid)){
				
			}
			
		}
		//跳转index方法载入模板
		$str=<<<str
<script>
location.href="./index.php?c=order&a=index&orid={$orid}";
</script>
str;
		echo $str;
	  }
	/**
	 * 显示
	 */
	 public function index(){
	 	//接收get传递过来的订单id
	 	$orid=Q('get.orid');
		//实例化订单列表
		$listModel = new \Common\Model\OrderList;
		//获得订单列表里面的所有数据
		$listData=$listModel
		->where("client_clid={$_SESSION['clid']} AND order_orid={$orid}")
		->orderBy('order_orid','DESC')
		->get();
		//分配变量在页面输出 
		View::with('list',$listData);
		//调用框架方法获得存入session商品的总价格
		$totalprice= Cart::getTotalPrice();
		//分配变量在页面输出
		View::with('to',$totalprice);
		//载入模板
	 	View::make();
	 }
	 
	 /**
	  * 异步删除
	  */
	  public function dele(){
	  	//接收异步发送过来要删除地址的主键
	  	$rid=Q('post.rid');
		//实例化收货地址模型
		$reModel= new \Common\Model\Receipt;
		//执行删除，删除数据库中的地址
		$reData=$reModel->where("rid={$rid}")->delete();
		//返回json给 js
		echo json_encode($reData);exit;
	  }
	 //删除地址
	 public function del(){
	 	//获得要删除地址的id
	 	$rid=Q('get.rid');
		$sid=Q('post.cartId');
		$data=array();
//		sp($_SESSION);
		//遍历session里面的信息，是否在购物车传递过来的 sid的数组中，如果在的话显示在页面上
		foreach($_SESSION['cart']['goods'] as $k=>$v)
		{
			//$k是否在$sid中
			if(in_array($k,$sid)){
			//把$v赋值给
			$data[$k]=$v;
				
			}
			
		}
		//收货地址表执行删除语句，删除用户指定要删除的地址
		Db::table('receiptaddress')
			->where("rid={$rid}")
			->delete();
		//跳转index方法载入模板
		go(U('index'));
	 }
	 
	 /**
	  * 点击付款修改订单状态
	  */
	  public function editor(){
	  	$orid=Q('post.orid');
		$orderStatus=Q('post.orderStatus');
		$orModel= new \Common\Model\Order;
		$data=array(
			'orid'=>$orid,
			'orderStatus'=>1
		);
		$orModel->save($data);
	  }
}
























 ?>