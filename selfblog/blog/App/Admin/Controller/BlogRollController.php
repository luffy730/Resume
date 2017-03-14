<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;

//文章管理控制器
class BlogRollController extends CommonController{
	//定义私有属性，自己用
	private $model;
	//构造方法实例化的时候回自动执行，里面会放经常用到的一些方法
	public function __construct(){
		//调用父级的构造方法，不然会被覆盖
		parent::__construct();
		//实例化连接模型
		$this->model=new \Common\Model\Broll;
	}
	
	//编辑
	public function edit(){
	
	//修改
	if(IS_POST){
		//调用模型中的编辑方法
		if($this->model->editData())
		//成功提示 修改成功，跳转index方法，显示连接页面
		View::success('修改成功',U('index'));
		//错误提示，修改过成中出的错误会被getError接到
		View::error($this->model->getError());
	}
	//1.获得旧数据
	//获得要修改链接的id
	$lid=Q('get.lid',0,'intval');
	//找到要修改的链接数据
	$oldData=$this->model->where("lid={$lid}")->find();
	//分配变量在页面输出
	View::with('oldData',$oldData);
	//载入页面
	View::make();
	}
	
	//删除
	public function del(){
		//执行删除，删除通过get传递过来要删除链接的id
		$this->model->del(Q('get.lid',0,'intval'));
		//成功提示
		View::success('删除成功');
	}
	
	//添加链接
	public function add(){
		//表单提交的时候进行添加
		if(IS_POST){
			//调用模型的添加方法
			if($this->model->addData())
			//成功提示，跳转index方法，显示连接页面
			View::success('添加成功',U('index'));
			//错误提示
			View::error($this->model->getError());
		}
		//载入页面
		View::make();
	}
	
	//显示
	public function index(){
		//分页处理
		//统计总数SELECT count(*) FROM ...
		$total=Db::table('link')->count();
		
		//执行分页
		$page=Page::row(2)->make($total);
		//分配变量，在页面输出
		View::with('page',$page);
		
		//数据处理
		$data=$this->model->limit(Page::limit())->get();
		//分配变量，在页面输出
		View::with('data',$data);
		//载入页面
		View::make();
	}
}




























	
	
	
	
	
	
	
	
 ?>
	