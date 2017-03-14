<?php namespace Home\Controller; 

use Hdphp\Controller\Controller;

//前台控制器
class IndexController extends Controller{

	//首页
	public function index(){
		//显示最新的5片文章
		$arcData=Db::table('article')
		->join('category','cid','=','category_cid')
		->orderBy('sendtime','DESC')
		->limit(5)
		->get();
		$tagModel= new\Common\Model\Tag;
		//调用模型获取标签的方法给原有的文章数据组合上标签
		$arcData=$tagModel->getTag($arcData);
		View::with('arcData',$arcData);
		
		View::make();
	}
	
	//显示验证码
	public function code(){
		$num=Config::get('self.codelen');
		Code::num($num)->make();
	}
	
	
   
}





