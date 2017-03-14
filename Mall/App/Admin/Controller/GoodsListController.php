<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;
//货品管理控制器
class GoodsListController extends CommonController{
	//定义私有属性 模型
	private $model;
	//构造方法实例化的时候会自动执行，里面会放一些公用的方法
	public function __construct(){
		//调用父级的构造方法，不然会被覆盖
		parent::__construct();
		//实例化或货品模型
		$this->model= new \Common\Model\Glist;
	}
	
	/**
	 * 异步检测货品是否已经存在
	 */
	public function change(){
		$gid=Q('post.gid',0,'intval');
		//接收发送过来的值
		$c=Q('post.o');
		//实例化货品操作模型
		$goModel= new \Common\Model\Glist;
		$goData=$goModel->where("grouppid='{$c}' AND goods_gid={$gid}")->get();
		//如果相等
		if($goData){
			echo 1;
			die;
		}
		echo 0;
	}
	
	/**
	 * 编辑货品信息
	 */
	 public function edit(){
			
	 	//在表单提交的时候进行修改
	 	if(IS_POST){

			$gid=Q('post.goods_gid',0,'intval');
	 		//执行模型的编辑方法
	 		if($this->model->editData())
			//成功提示，跳转index方法显示货品信息列表U('index') 相当于index.php?a=index
			View::success('编辑成功',U('index',array('gid'=>$gid)));
			//错误提示，编辑过程中的错误会被getError捕获到，并且反馈出来
			View::error($this->model->getError());
	 	}
		$gid=Q('get.goods_gid',0,'intval');
		//获得所有货品数据
		$data=$this->model->where("goods_gid=$gid")->get();
		View::with('data',$data);
	$goprModel=new \Common\Model\GoodsProperty;
		//建立关联，关联商品属性表和类型属性表
		$attr=Db::table('goods_property')
		->join('property',"property_pid",'=','pid')
		->where("ptype=1 AND goods_gid=$gid")->groupBy('pname')
		->get();
		
		
		$attrAll=Db::table('goods_property')
		->join('property',"property_pid",'=','pid')
		->where("ptype=1 AND goods_gid=$gid")
		->get();  
		//定义空数组用来存放重新组合的数据
		$newattr=array();
		//循环attr重组数组
		foreach ($attr as $k=>$v){
			$newattr[]=array(
				'pname'=>$v['pname'],
				'value'=>explode("|", $v['value'])
			);
			
		}
		foreach ($attrAll as $k => $v) {
			$tmpArr[$v['gpid']]=$v['gpvalue'];
		}
		
		foreach ($newattr as $k => $v) {
			$gval=array();		
			foreach ($v['value'] as $k2 => $v2) {
				if(in_array($v2, $tmpArr)){
					$gval[array_search($v2, $tmpArr)]=$v2;
				}
			}
			$lastArr[]=array(
				'goods_gid'=>$gid,
				'pname'=>$v['pname'],
//				'glname'=>$v['glname'],
				'value'=>$gval
			);
		}
		
		View::with('lastArr',$lastArr);
		//获得旧数据
		$did=Q('get.did',0,'intval');
		//获得要修改的货品的数据
		$oldData=$this->model->where("did={$did}")->get();
		View::with('oldData',$oldData[0]);
	 	//载入模板
	 	View::make();
	 }
	
	/**
	 * 删除货品信息
	 */
	public function del(){
		//获得get提交过来要删除的货品信息的id
		$did=Q('get.did',0,'intval');
		//执行删除
		$this->model->where("did=$did")->delete();
		View::success('删除成功');
	}
	/**
	 * 添加货品信息
	 */
	 public function add(){
	 	//获得post提交过来的商品id
	 	$gid=Q('post.goods_gid',0,'intval');
	 	//在表单提交的时候进行添加
	 	if(IS_POST){
	 		//执行模型里面的添加方法
	 		if($this->model->addData())
			//成功提示，U函数跳转index方法显示添加商品的货品信息
	 		View::success('添加成功',U('index',array('gid'=>$gid)));
			//错误提示，添加过程中的错误会getError捕获到，然后反馈出来
			View::error($this->model->getError());
	 	}
		
	 }
	
	/**
	 * 显示货品列表
	 */
	 public function index(){
	 	//获得get提交过来的gid
	 	$gid=Q('get.gid',0,'intval');
	 	//获得所有货品信息
		$data=$this->model->where("goods_gid=$gid")->get();
		//分配变量在页面输出
		View::with('data',$data);
	 	//获得商品的货品信息
	 	//实例化商品属性模型
	 	$goprModel=new \Common\Model\GoodsProperty;
		//建立关联，关联商品属性表和类型属性表
		$attr=Db::table('goods_property')
		->join('property',"property_pid",'=','pid')
		->where("ptype=1 AND goods_gid=$gid")
		->get(); 
		//c重组数组，因为得到的是多条数据
		$newattr=array();
		//遍历
		foreach ($attr as $k=>$v){
			$newattr[$v['pid']][]=$v;
		}
		View::with('newattr',$newattr);
//		sp($newattr);
		//分配变量
		View::with('attr',$attr);
		//载入模板
		View::make();
	 }
}


























 ?>