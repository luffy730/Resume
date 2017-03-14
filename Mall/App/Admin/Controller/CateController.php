<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;

//分类管理控制器
class CateController extends CommonController{
	//设置私有属性，自己用，私有比较快
	private $model;
	//构造方法实例化的时候回自动执行，里面会放一些经常用的方法
	public function __construct(){
		//调用父级的构造方法， 不然会被覆盖，这样就调用不到父级中设置的方法了，而且出错
		parent::__construct();
		//实例化的时候回自动执行
		$this->model= new \Common\Model\Cate;
	}
	
	//修改分类
	public function edit(){
		//3.修改
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
			
		
		//1.获取旧数据
		//获取get提交过来tid,给默认值0，强制转整
		$cid=Q('get.cid',0,'intval');
		//得到要修改那条分类的数据，因为只需要一条，所以这里用find 不是get
		$oldData=$this->model->where("cid={$cid}")->find();
		$tid=Q('get.tid',0,'intval');
		//实例化分类模型
		$typeModel=new \Common\Model\Type;
		$typeData=$typeModel->get();
		View::with('type',$typeData);
		//分配变量在页面输出
		View::with('oldData',$oldData);
		//2.处理所属分类（父级分类不能是自己和自己的子集）
		$cate=$this->model->getNoMy($cid);
		$cate=Data::tree($cate,'cname');
		View::with('cate',$cate);  
		//载入模板
		View::make();
	}
	
	//删除分类
	public function del(){
		//接收get传递过来的cid
		$cid=Q('get.cid',0,'intval');
		//1.在删除当前分类之前获得当前分类的pid
		//find输出一条，要删除的分类的cid
		$data=$this->model->where("cid={$cid}")->find();
		//把要删除分类的pid，赋给$pid
		$pid=$data['pid'];
		//2.找到要删除的当前的分类所有的子集，然后更改他们的pid为要删除分类的pid
		$this->model->where("pid={$cid}")->update(array('pid'=>$pid));
		//3.删除
		//DELETE FROM category WHERE cid={$cid};
		$this->model->where("cid={$cid}")->delete();
		View::success('删除成功');	
	}
	
	//添加分类
	public function add(){
		//在表单提交的时候进行添加
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
	
	//添加子分类
	public function addSon(){
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
			//把数组转为json
			echo json_encode(
				array(
					'status'=>0,
					'message'=>$this->model->getError()
				)
			);
			exit;

		}
		//1.获得所属分类的名称和cid
		//接收get里面的cid，默认值为0，强制转整
		$cid=Q('get.cid',0,'intval');
		//组织sql语句
		//SELECT cid,cname FROM category WHERE cid=$cid;
		//filed 如果只输出个别字段名的话需要加上，框架提供
		//这里用find，只输出一条
		$data=$this->model->where("cid={$cid}")->field('cid,cname,sort')->find();
		//分配变量，就可以在页面输出了
		//处理所属类型
		//实例化类型模型
		$typeModel=new \Common\Model\Type;
		$typeData=$typeModel->get();
//		sp($typeData);exit;
		View::with('typeData',$typeData);
		View::with('data',$data);
		//载入模板
		View::make();
	}
	
	//显示分类
	public function index(){
		
		if(IS_POST){
			$data = Q('post.',array());
			foreach($data as $k=>$v){
				$this->model->where("cid={$k}")->update(array('sort'=>$v));
			}
		}
		//获取所有分类数据
		$data=$this->model
		->orderBy('sort','ASC')
		->get();
		//让数据呈现树状形式显示
		$treeData=Data::tree($data,'cname','cid','pid');
		//分配变量，在页面输出
		View::with('data',$treeData);
		//载入模板
		View::make();
	}
}




























 ?>