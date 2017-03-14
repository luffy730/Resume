<?php namespace Home\Controller;
use Hdphp\Controller\Controller;
//内容控制器
class ContentController extends Controller{
	public function index(){
		$data=Db::table('article')
			  ->join('article_data','article_aid','=','aid')
			  ->where("aid=".Q('get.aid',0,'intval'))
			  ->get();
			  $tagModel =new \Common\Model\Tag;
			  $data=$tagModel->getTag($data);
			  View::with('data',$data[0])->make();
	}
}

















 ?>