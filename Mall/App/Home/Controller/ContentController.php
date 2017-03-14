<?php namespace Home\Controller;
use Hdphp\Controller\Controller;
//调用框架购物车方法，获得订单号的时候会用到
use Hdphp\Controller\Cart;
//前台内容控制器
class ContentController extends Controller{
	
	/**
	 * 立即购买
	 */
	public function buynow(){
		//实例化订单列表
		$listModel= new \Common\Model\OrderList;
		//实例化订单模型
		$orModel= new \Common\Model\Order;
		//如果用户没有登录的话跳转登录页面，让他登陆
		if(!$_SESSION['clid']){
			go(U('Login/index'));
		}
		//在表单提交的时候执行操作
		if(IS_POST){
			//重组数组获得要添加的数据
			$lastData=array(
			//订单号
			'orderNumber'=>Cart::getOrderId(),
			//订单生成时间
			'riseTime'=>time(),
			//当前用户的id
			'client_clid'=>$_SESSION['clid'],
			);
			//添加到订单表，会返回自增的主键
			$orid=$orModel->add($lastData);
			//重组数组获得所需数据添加到订单列表
			$data=array(
				'amount'=>Q('post.num'),
				'subtotalPrice'=>Q('post.mprice'),
				'goods_gid'=>Q('post.gid'),
				'goods_gname'=>Q('post.gname'),
				'goods_price'=>Q('post.mprice'),
				'goods_listpic'=>Q('post.listpic'),
				'goods_options'=>Q('post.gpid'),
				'goods_totalprice'=>Q('post.mprice'),
				'client_clid'=>$_SESSION['clid'],
				'order_orid'=>$orid
			);
			$listModel->add($data);
		}
		 $str=<<<str
<script>
location.href="./index.php?c=order&a=index&orid={$orid}";
</script>	
str;
		echo $str; 
//		go(U('Order/index'));
		
	}	
	/**
	 * 显示
	 */
	 public function index(){
	 	$gid=Q('get.gid',0,'intval');
	 	//实例化商品模型
	 	$goodsModel=  new \Common\Model\Goods;
		$newGoods=$goodsModel->limit(6)->orderBy('addtime','DESC')->get();
		View::with('newGoods',$newGoods);
		//实例化商品属性模型
		$proModel= new \Common\Model\GoodsProperty;
		//建立关联
		$proData=$proModel
		//关林商品属性表和类型属性表关联字段是 类型属性的id
		->join('property','property_pid','=','pid')
		//条件查询用户要查询get提交过来的 商品 的id
		->where("goods_gid=$gid AND ptype=1")
		->get();
		$result = array();
		//分类，把颜色和套餐区分开按照类型id
		foreach($proData as $v){
			$result[$v['pid']][] = $v;
		}
		//得到所有商品的信息
		$goodsData=Db::table('goods')
		//商品表关联商品详细表字段商品id
		->join('product_detail','goods_gid','=','gid')
		//查询get传递过来用户需要查询的商品
		->where("gid=$gid")
		->get();
		
		//实例化货品分类模型
		$listModel= new \Common\Model\Glist;
		//获得所有货品数据
		$listData=$listModel
		->where("goods_gid=$gid")
		->get();
		//分配变量在页面输出
		//因为数要输商品图册，但是存储数据的时候把它存成数组了，现在要输出，
		//所以要把字符串转变为数组，所以
		//重组数组，现在要遍历$goodsData
		//声明用来存储新组成的数组的一个空数组
		
		$goodsData[0]['gallery']=explode(',', $goodsData[0]['gallery']);

		$goodsData[0]['listpic']=explode(',', $goodsData[0]['listpic']);

		foreach($goodsData[0]['gallery'] as $k=>$v)
		{
			$goodsData[0]['gallerys'][$k]['sml']=Image::thumb($v,'./Upload/Content/16/06/sml'.basename($v),70,70,6);
			$goodsData[0]['gallerys'][$k]['mid']='./'.$v;
			$goodsData[0]['gallerys'][$k]['big']=Image::thumb($v,'./Upload/Content/16/06/big'.basename($v),800,800,6);
			
		}
//		sp($goodsData);
		//分配变量在页面输出
		View::with('list',$listData);
		//分配变量在页面输出
		View::with('pro',$result);
		//分配变量在页面输出
		View::with('goods',$goodsData);
	 	//载入模板
	 	View::make();
		
	 }
	//异步得到价格
	public function getPrice(){
		//接收异步发送过来的价格
		$combine = Q('post.combine',0);
		//实例化 商品属性表
		$goodsAttrModel = new \Common\Model\GoodsProperty;
		//阻止sql语句
		$price = $goodsAttrModel
		//得到指定字段（附加价格） 得到附加价格的和  
		->field('SUM(appendprice) as price')
		->where("gpid IN ({$combine})")
		->pluck('price');
		die($price);
	}
	//用户退出
	public function out(){
		//清除session变量
		session_unset();
		//清除session文件
		session_destroy();
		//跳转index方法载入模板
		go(U('index'));
	}
}





















 ?>