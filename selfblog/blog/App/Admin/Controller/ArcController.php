<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;

//文章管理控制器
class ArcController extends CommonController{
	//定义私有属性
	private $model;
	//构造方法，实例化的时候回自动执行
	public function __construct(){
		//调用父级的构造方法，不然会被子集的覆盖
		parent::__construct();
		//实例化文章模型
		$this->model=new \Common\Model\Arc;
	}
	//添加文章
	public function add(){
		if(IS_POST){
			//调用文章模型的添加方法
			if($this->model->addData())
			//添加成功，跳转index方法，显示文章页面
			View::success('添加成功',U('index'));
			//否则失败
			View::error($this->model->getError());
		}
		
		//1.处理所属分类
		//实例化分类模型
		$cateModel=new \Common\Model\Cate;
		//让数据呈现树状形式显示
		$cateData=Data::tree($cateModel->get(),'cname');
		//分配变量在页面输出
		View::with('cateData',$cateData);
		//2.处理标签
		//实例化标签模型
		$tagModel=new \Common\Model\Tag;
		//获取所有标签
		$tagData=$tagModel->get();
		//分配变量，在页面输出
		View::with('tagData',$tagData);
		//载入页面
		View::make();
	}
	
	//编辑
	public function edit(){
	//5.修改
	if(IS_POST){
		//调用模型中的修改方法
		if($this->model->editData())
		//成功提示，修改完成要显示文章列表反馈给用户，U函数跳转index方法，就可以显示了
		View::success('修改成功',U('index'));
		//错误提示，如果修改过程出现了错误就会被getError接收到，然后提交的时候反馈给用户
		View::error($this->model->getError());
	}
	//1.处理所属分类
	//实例化分类模型
	$cateModel=new \Common\Model\Cate;
	//让分类数据呈现树状形式显示，这样更清晰
	$cateData=Data::tree($cateModel->get(),'cname');
	//分配变量在页面输出
	View::with('cateData',$cateData);
	//2.处理标签
	//实例化标签模型
	$tagModel=new \Common\Model\Tag;
	//获得标签模型中的所有数据
	$tagData=$tagModel->get();
	//分配变量，在页面输出
	View::with('tagData',$tagData);
	//3.获得旧数据
	//获得要修改的id通过get传递过来的，赋予默认值0，并且强制转整，为了防止用户修改id的值
	$aid=Q('get.aid',0,'intval');
	//关联文章表和文章数据表获得要修改的文章的内容
	$oldData = Db::table('article')->join('article_data','aid','=','article_aid')->where("aid={$aid}")->get();
	//分配变量，在页面输出
	View::with('oldData',$oldData[0]);
	//4.获得当前文章选中了哪些标签
	//实例化文章标签中间表
	$arcTagModel=new \Common\Model\ArcTag;
	//获得要修改的文章贴了哪几个标签的id
	$tids=$arcTagModel->where("article_aid={$aid}")->lists('tag_tid');
	//如果用户没有选标签，那么给默认值为空数组，这样页面的in_array就不会报错了
	$tids=$tids?$tids:array();
	//分配变量，在页面输出
	View::with('tids',$tids);
	//载入页面
	View::make();
	}
	
	//显示
	public function index(){
	//分页处理
	//统计总数 SELECT count(*) FROM ...
	$total=Db::table('article')->join('category','category_cid','=','cid')->where("is_recycle=0")->count();
	//执行分页
	$page=Page::row(2)->make($total);
	View::with('page',$page);
	
	//处理数据
	//SELECT * FROM article JOIN category ON category_cid=cid;
	$data=Db::table('article')->join('category','category_cid','=','cid')->field('aid,title,cname')->limit(Page::limit())->where("is_recycle=0")->get();
	View::with('data',$data);
	
	View::make();
	}
	//删除到回收站
	public function del(){
		//获得要删除到回收站文章的id,给默认值0，并且强制转整
		$aid=Q('get.aid',0,'intval');
		//修改阻止sql
		//update table article set is_cycle=1 where aid=$aid;
		$this->model->where("aid={$aid}")->update(array('is_recycle'=>1));
		View::success('删出成功',U('index'));
	}
	
	public function recycle(){
		//分页处理
		//统计总数SELECT count(*) FROM...
		$total=Db::table('article')->join('category','category_cid','=','cid')->where("is_recycle=0")->count();
		//执行分页
		$page=Page::row(2)->make($total);
		View::with('page',$page);
		
		//数据处理
		//SELECT * FROM article JOIN category ON category_cid=cid;
		$data=Db::table('article')->join('category','category_cid','=','cid')->field('aid,title,cname')->limit(Page::limit())->where("is_recycle=1")->get();
		View::with('data',$data);
		View::make();
	}
	//还原
	public function restore(){
		//获得要还原文章的id，给默认值0，并且强制转整
		$aid=Q('get.aid',0,'intval');
		//修改is_recycle的值
		$this->model->where("aid={$aid}")->update(array('is_recycle'=>0));
		View::success('还原成功');
	}
	
	//真正删除
	public function realDel(){
		$this->model->del(Q('get.aid',0,'intval'));
		View::success('删除成功');
	}
}



































 ?>