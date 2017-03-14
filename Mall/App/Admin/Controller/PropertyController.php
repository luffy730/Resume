<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;

//后台属性控制器
class PropertyController extends CommonController{
	//定义私有属性，自己用比较快
	private $model;
	//构造方法，实例化的时候回自动执行，里面会放一些经常用的方法
	public function __construct(){
		//调用父级的构造方法，不然会被覆盖掉
		parent::__construct();
		//实例化属性模型
		$this->model=new \Common\Model\Property;
	}
	
	//编辑属性
	public function edit(){
		//在表单提交的时候进行编辑
		if(IS_POST){
			if($this->model->editData()){
				//把数组转为json
				echo json_encode(
					array(
						'status'=>1,
						'message'=>'编辑成功'
					)
				);
				exit;
			}
			//把数组转为json 
			echo json_encode(
				array(
					'status'=>0,
					'message'=>$this->model->getError()
				)
			);
			exit;
		}
		//1.获取就数据
		//获得要编辑的属性对应的类型的id,给默认值，强制转整
		$tid=Q('get.id',0,'intval');
		//因为编辑一条所以，这里使用find
		$oldData=$this->model->where("pid={$tid}")->find();
		//分配变量在页面输出
		View::with('oldData',$oldData);
		//载入模板
		View::make();
	}
	
	//删除属性
	public function del(){
		//获得要删除属性的id
		//给默认值，并且强制转整
		$pid=Q('get.pid',0,'intval');
		//组织sql删除语句
		//DELETE FROM property WHERE pid={$pid};
		$this->model->where("pid={$pid}")->delete();
		//成功提示
		View::success('删除成功');
	}
	
	//添加属性
	public function add(){
		//在表单提交的时候进行添加
		if(IS_POST){
			if($this->model->addData()){
				//把数组转为json
				echo json_encode(
					array(
						'status'=>1,
						'message'=>'添加成功'
					)
				);
				exit;
			}
			//把数组转为json
			echo json_encode(
				array(
					'status'=>0,
					'message'=>$this->model->getError()
				)
			);
			exit;	
		}
		View::make();
	}
	
	//显示属性
	public function index(){
		$tid=Q('get.tid',0,'intval');
		//获得所有属性数据
		$data=$this->model->where("type_tid={$tid}")->get();
		//分配变量，就可以在页面输出了
		View::with('data',$data);
		//载入模板
		View::make();
	}
}




















 ?>