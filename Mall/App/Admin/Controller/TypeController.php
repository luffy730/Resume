<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;

//后台类型管理控制器
	class TypeController extends CommonController{
		//设置私有属性
		private $model;
		//构造方法实例化的时候自动执行，里面会放一些共用的方法，哪里使用直接调用即可
		public function __construct(){
			//调用父级的构造方法，不然会被覆盖，不能使用父级内的方法，会出错
			parent::__construct();
			//实例化自定义的模型
			$this->model= new \Common\Model\Type;
		}
		
		//修改
		public function edit(){
			//2.修改
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
			$tid=Q('get.tid',0,'intval');
			$oldData=$this->model->where("tid={$tid}")->find();
			View::with('oldData',$oldData);
			View::make();
		}
		
		//删除类型
		public function del(){
				//获得要删除类型的id
				//给默认值，并且强制转整
				$tid=Q('get.tid',0,'intval');
				//组织sql删除语句
				//DELETE FROM type WHERE tid={$tid};
				$this->model->where("tid={$tid}")->delete();
				//成功提示；
				View::success('删除成功');
			
		}
		
		//添加类型
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
		
		//显示类型
		public function index(){
			//获得所有类型数据
			$data=$this->model->get();
			//分配变量在页面输出
			View::with('data',$data);
			//载入模板
			View::make();
		}
	}



























 ?>