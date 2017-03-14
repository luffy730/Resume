<?php namespace Admin\Controller;
header('Content-type:text/html;charset=utf-8');
use Hdphp\Controller\Controller;
//商品管理控制器
class GoodsController extends CommonController{
	//定义私有属性
	private $model;
	//构造方法实例化的时候回自动执行，里面会放一些公共的方法
	public function __construct(){
		//调用父级的构造方法，不然会被覆盖
		parent::__construct();
		//实例化商品模型
		$this->model= new \Common\Model\Goods;
	}
	//插件上传方法Uploadify
	public function upload(){
		$file=Upload::path('Upload/Content/'.date('y/m'))->make();
		if(empty($file)){
			//相当于echo json_encode(Upload::getError());exit;
			$this->ajax(Upload::getError());
		}else{
	        //上传成功，把上传好的信息返给js也就是uploaddify
			$data=$file[0];
			//相当于：echo json_encode($data);exit;
			$this->ajax($data);
		}
	}
	// 缩略上传**************************************************
	public function uploads(){
		$file=Upload::path('Upload/Content/'.date('y/m'))->make();
		if(empty($file)){
			//相当于echo json_encode(Upload::getError());exit;
			$this->ajax(Upload::getError());
		}else{
	        //上传成功，把上传好的信息返给js也就是uploaddify
			$data=$file[0];
			Image::thumb($file[0]['path'],$file[0]['dir'].'/sml'.$file[0]['basename'],70,70,3);
			Image::thumb($file[0]['path'],$file[0]['dir'].'/mid'.$file[0]['basename'],400,400,3);
			Image::thumb($file[0]['path'],$file[0]['dir'].'/big'.$file[0]['basename'],800,800,3);
			//相当于：echo json_encode($data);exit;
			$this->ajax($data);
		}
	}
	//**************************************************
	

	//删除商品
	public function del(){
		//调用模型的删除方法
		//删除get传递过来要删除商品的 id
		$this->model->delData(Q('get.gid',0,'intval'));
		View::success('删除成功');
	}

	//编辑商品
	public function edit(){
		//在表单提交的时候进行修改{
			if(IS_POST){
//				sp($_POST);die;
				//执行模型的编辑方法
				if($this->model->editData())
				//成功提示，U函数跳转index方法显示商品列表
				//编辑的时候要return true不然提示的时候就是空白的什么都没有
				View::success('编辑成功',U('index'));
				//错误提示编辑过程中的错误会被getError捕获到，并且反馈出来
				View::error($this->model->getError());
			}

		//1.处理所属分类
		//实例化分类模型
		$cateModel= new \Common\Model\Cate;
		//让数据成树状形式显示，输出分类名称  Data::tree框架提供的方法
		$cateData=Data::tree($cateModel->get(),'cname');
		//分配变量在页面输出
		View::with('cate',$cateData);
		//2.处理品牌数据
		//实例化品牌模型
		$bandModel= new \Common\Model\Band;
		//获得所有品牌信息
		$bandData=$bandModel->get();
		//分配变量在页面输出
		View::with('band',$bandData);
		//3.获取旧数据
		//获得post提交上来的gid给默认值0 ，并且强制转整
		$gid=Q('get.gid',0,'intval');
		//得到旧数据
		$oldData=$this->model
		->join('product_detail','goods_gid','=','gid')
		->where("gid={$gid}")
		->get();	
		//重组数组
		//关联右挂链商品属性表和类型属性表通过 pid类型属性id获得属性
		$attrs = Db::table('goods_property as gp')
		->rightJoin('property as p','pid','=','property_pid and goods_gid='.$oldData[0]['gid'])
		->where('ptype=0 and type_tid="'.$oldData[0]['type_tid'].'"')
		->get();
		//查询规格
		$specs = Db::table('goods_property as gp')
		->join('property as p','pid','=','property_pid')
		->where('ptype=1 and goods_gid="'.$oldData[0]['gid'].'"')
		->get();
		$otherSpecs = Db::table('property')
		->where('ptype=1 and type_tid="'.$oldData[0]['type_tid'].'"')
		->get();
		foreach($otherSpecs as $k=>$v){
			foreach($specs as $vo){
				if($vo['pid']==$v['pid']){
					unset($otherSpecs[$k]);
					break;
				}
			}
		}
		foreach($oldData as $k=>$v)
			{
				$oldData[$k]['gallery']=(explode(',', $v['gallery']));
			}
		//分配变量在页面输出
		View::with('specs',$specs);
		View::with('otherSpecs',$otherSpecs);
		View::with('attrs',$attrs);
		View::with('oldData',$oldData[0]);
		//载入模板
		View::make();
	}
	
	//添加商品
	public function add(){
		//表单提交的时候进行添加
		if(IS_POST){
			//调用模型的添加方法
			if($this->model->addData()){
				//成功提示跳转index方法
			View::success('添加成功',U('index'));
			}
			//错误提示
			View::error($this->model->getError());
		}
		//1.获取商品所属分类
		$cateModel= new \Common\Model\Cate;
		//2.获取所有分类数据
		$cateData=Data::tree($cateModel->get(),'cname');
		//分配变量在页面输出
		View::with('cate',$cateData);
		//获取商品所属品牌
		$brandModel= new \Common\Model\Band;
		//获取所有品牌信息
		$bandData=$brandModel->get();
		//分配变量在页面输出
		View::with('band',$bandData);
		
		//获得类型属性
		$proModel=new \Common\Model\Property;
		//获得所有数据
		$proData=$proModel->get();
		
		foreach ($proData as $k => $v) {
			
			$temp = array();
			
			$data[] = array(
				'pid'=>$v['pid'],
				'value'=>explode('|', $v['value']),
				'pname'=>$v['pname'],
				'ptype'=>$v['ptype'],
				'type_tid'=>$v['type_tid'],
				
			);
			$data = array_merge($temp,$data);
			
		}
//		p($data);exit;
		//分配变量在页面输出
//		View::with('data',$data);
		//载入模板
		View::make();
	}
	
	//自定义ajax异步传输
	public function change(){
		//接收ajax异步传输过来的数据
		$tid=Q('post.tid',0,'intval');
		//实例化类型属性模型
		$typeModel= new \Common\Model\Property;
		//获得异步传输过来tid要查询的数据
		$typeData=$typeModel->where("type_tid={$tid}")->get();
		//遍历 获得的数据需要 $k 键名，来重组数组
		foreach ($typeData as $k => $v) {
			//把$v['value']属性里面的值，变位数组，并且按键名一一赋值给变量$typeData
			$typeData[$k]['value']=explode('|', $v['value']);

		}
		//把数组变为json返回给js
		echo json_encode($typeData);
		exit;
	}
	
	//显示商品
	public function index(){
		//获得所有商品数据
		$data=$this->model->get();
		//分配变量在页面输出
		View::with('data',$data);
		//载入模板
		View::make();
	}
}

























 ?>