<?php namespace Home\Controller;
use Hdphp\Controller\Controller;
//前台注册控制器
class RegController extends Controller{
	//定义私有属性
	private $model;
	//构造方法实例化的时候会自动执行
	public function __construct(){
		//调用父级的构造方法，不然会被覆盖
		parent::__construct();
		//实例化注册模型
		$this->model= new \Common\Model\Reg;
	}
	/**
	 * 注册
	 */
	 public function reg(){
	 	//在表单提交的时候进行注册
	 	if(IS_POST){
			if($this->model->regData()){
					//把数组转为json
				echo json_encode(
					array(
						'status'=>1,
						'message'=>'注册成功'
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
		
	 }
	/**
	 * 显示
	 */
	 public function index(){
	 	//载入模板
	 	View::make();
	 }
	 //调用框架方法显示验证码
	 public function code(){
	 	//调用框架方法显示验证码
	 	Code::width(200)
	 	->height(100)
	 	->fontSize(40)
	 	->fontColor('#f00f00')
	 	->make();
	 }
}























 ?>