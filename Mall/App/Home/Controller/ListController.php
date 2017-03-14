<?php namespace Home\Controller;
use Hdphp\Controller\Controller;
//前台列表控制器
class ListController extends Controller{
	
	/**
	 * 显示
	 */
	 public function index(){
	 	//实例化分类模型
	 	$cateModel= new \Common\Model\Cate;
		//实例化商品模型
		$goodsModel=new \Common\Model\Goods;
		//实例上瘾属性模型
		$gpModel= new \Common\Model\GoodsProperty;
		//实例化类型属性表
		$proModel= new \Common\Model\Property;
		//获得所有分类数据
		$cate=$cateModel->get();
		//框架提供方法自动获得子集（相当于递归)
		$data=Data::channelLevel($cate);
		//获得顶级分类的数据
		$oldCate=$cateModel->where('pid=0')->get();
		//分配变量在页面输出
		View::with('oldCate',$oldCate);
		
		//yi.显示筛选的属性********************************************
		//1.获取当前分类的子分类
		//接收get传递过来分类的 主键给默认值0 并且强制转整
		$cid=Q('get.cid',0,'intval');
		//递归获得所有分类的子集
		$cids=$this->getSon($cateModel->get(),$cid);
		//把自己压进去
		$cids[]=$cid;
		//通过cid找到gid
		//查询商品模型
		$bid=Q('get.bid');
		if($bid)
		{
			$gids=$goodsModel
			->where("category_cid in(".implode(',',$cids).") AND band_bid=$bid")
			->lists('gid');
//			$gids = Db::table('goods')->where("category_cid in(". implode(',', $cids ) .") AND brand_bid=$bid")->lists('gid');
		}
		else
		{
			$gids=$goodsModel
			//分类id在
			->where("category_cid in(".implode(',',$cids).")")
			->lists('gid');
		}
		
		$gids=isset($gids)?$gids:array(0);
		//3.通过查询到的gid找到商品属性
		$goodsAttr=Db::table('goods_property')
		->where("goods_gid in(".implode(',',$gids).")")
		->groupBy('gpvalue')->get();
		$sameTemp=array();
		foreach ($goodsAttr as $v){
			$sameTemp[$v['property_pid']][]=$v;
		}
		$attr=array();
		//重组数组为 array('name'=>'名称',value=?名称对应的值)
		foreach ($sameTemp as $k =>$v){
			$attr[]=array(
				'name'=>$proModel->where("pid={$k}")->pluck('pname'),
				'value'=>$v
			);
		}
//		sp($attr);
		//分配变量在页面输出
		View::with('attr',$attr);
		//获取商品信息
		//二、根据数据筛选商品***********************
		//1.处理param参数
		$num=count($attr);
		//0_0_0_0_0_0_0_0_0_0_0_0_0
		if($num)
		{
			$param=isset($_GET['param'])?explode('_', $_GET['param']):array_fill(0,$num,0);
			
			//分配变量，在页面输出
			View::with('param',$param);
			//2.根据param参数进行筛选
			$finalGids=$this->filter($param,$gids);
		
				if($finalGids)
				{
					//调用框架的方法whereIn,获得自己和子分类的所有商品
					$goodsData=$goodsModel
					->whereIn('category_cid',$cids)
					->whereIn('gid',$finalGids)
					->orderBy('gid','ASC')
					->get();
			
				}
				else
				{
					$goodsData=array();
					
				}
		}
		else
		{
			$goodsData=array();
		}
		//分配变量在页面输出
		View::with('goodsData',$goodsData);
		//分配变量在页面输出
		View::with('data',$data);
		//促销中的商品输出
		$saleData=$goodsModel->limit(5)->get();
		View::with('saleData',$saleData);
		//载入模板
	 	View::make();
	 }
	
	private function filter($param,$cidGids){
		$gids=array();
		//循环param参数
		foreach($param as $gpid){
			//如果不为0，也就是不是“不限”的时候
			if($gpid){
				//拿到属性的值
				$gpvalue=Db::table('goods_property')
				->where("gpid={$gpid}")
				->pluck('gpvalue');
				//通过属性的值获得gid
				$gids[]=Db::table('goods_property')
				->where("gpvalue='{$gpvalue}'")
				->lists('goods_gid');
			}
		}
		if($gids){
			//取交集
			$temp=$gids[0];
			foreach ($gids as $v){
				$temp=array_intersect($temp,$v);
			}
			//确保是当前分类的gid
			$finalGids = array_intersect($temp,$cidGids);
		}else{//全部是“不限”的时候
			$finalGids = $cidGids;
		}
		return $finalGids;
	}
	 
	 /**
	  * [getSon 递归获得子分类cid]
	  * @param [type] $data [description]
	  * @param [type] $cid  [description]
	  * @return[type]     	[description]
	  */
	  private function getSon($data,$cid){
	  	$temp= array();
		foreach ($data as $v){
			if ($v['pid']==$cid){
				$temp[]=$v['cid'];
				$temp=array_merge($temp,$this->getSon($data,$v['cid']));
			}
		}
		return $temp;
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