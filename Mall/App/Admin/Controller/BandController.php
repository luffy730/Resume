<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;
//后台品牌管理控制器
class BandController extends CommonController{
	//定义私有属性，自己用，速度快
	private $model;
	//构造方法实例化的时候回自动执行，里面会放一些经常用的方法
	public function __construct(){
		//调用父级的构造方法，不然会被覆盖，就调用不到父级里面设置的方法了，会出错
		parent::__construct();
		//实例化品牌模型
		$this->model= new \Common\Model\Band;
	}
	
	//编辑品牌
	public function edit(){
		//在表单提交的时候进行修改
		if(IS_POST){
			if($this->model->editData()){
				View::success('编辑成功',U('index'));
			}
			View::error($this->model->getError());
		}
		//1.获取旧数据
		//通过get获取到要修改品牌的id,给默认值0，并且强制转整
		$bid=Q('get.bid',0,'intval');
		$oldData=$this->model->where("bid={$bid}")->find();
//		sp($oldData);exit;
		//分配变量在页面输出
		View::with('oldData',$oldData);
		//载入模板
		View::make();
	}
	
	//删除品牌
	public function del(){
		//获取要删除品牌的id
		$bid=Q('get.bid',0,'intval');
		//阻止sql删除语句
		//DELETE FORM band where bid="$bid";
		$this->model->where("bid={$bid}")->delete();
		View::success('删除成功');
	}
	
	//添加品牌
	public function add(){
		//在表单提价的时候进行添加
		if(IS_POST){
			//调用模型里面的添加方法
			if($this->model->addData())
			//成功提示，跳转index方法，显示品牌列表
			View::success('添加成功',U('index'));
			//错误提示getError框架提供，会自动捕获添加过程中出的错误
			View::error($this->model->getError());
	}
	//载入模板
		View::make();
	}
	//显示品牌
	public function index(){
		//获取所有品牌数据
		$data=$this->model->get();
		//分配变量，在页面输出
		View::with('data',$data);
		//载入模板
		View::make();
	}
}























 ?>