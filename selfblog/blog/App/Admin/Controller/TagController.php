<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;

//便签管理控制器
class TagController extends CommonController{
	//定义私有属性
	private $model;
	//构造方法，实例化的时候回自动执行（里面会放每个方法都要执行的语句
	public function __construct(){
		//为了防止覆盖，调用父级的构造方法
		parent::__construct();
		//实例化标签模型
		$this->model=new \Common\Model\Tag;
	}
	
	//删除标签
	public function del(){
		//获得要删除标签的id
		//给默认值，并且强制转整
		$tid=Q('get.tid',0,'intval');
		//组合sql 语句
		//DELETE FROM tag WHERE tid={$tid};
		$this->model->where("tid={$tid}")->delete();
		//成功提示
		View::success('删除成功');
	}
	
	//编辑标签
	public function edit(){
		//在表单提交的时候进行修改
		if(IS_POST){
			//调用模型里的修改方法
			if($this->model->editData())
			//成功提示U函数跳转index方法显示标签页面
			View::success('修改成功',U('index'));
			//错误提示，如果出错会自动获得，框架定义
			View::error($this->model->getError());
		}
		
		//1.获取旧数据
		//获取要修改标签的id
		$tid=Q('get.tid',0,'intval');
		//找到要修改的标签数据
		$oldData=$this->model->where("tid={$tid}")->find();
		//分配变量在页面输出
		View::with('oldData',$oldData);
		//载入页面
		View::make();
	}
	
	//添加标签
	public function add(){
		if(IS_POST){
			//调用模型的添加方法
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
	
	//显示标签
	public function index(){
		//获得所有标签数据
		$data=$this->model->get();
		
		View::with('data',$data);
		View::make();
	}
}





























 ?>