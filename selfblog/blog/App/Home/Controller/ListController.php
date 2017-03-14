<?php namespace Home\Controller; 
use Hdphp\Controller\Controller;
//列表页控制器
class ListController extends Controller{

    //首页
    public function index(){
    		//获得分类或者是标签的名称
    		$cid = Q('get.cid',0,'intval');
    		$tid = Q('get.tid',0,'intval');
		$tagModel = new \Common\Model\Tag;
    		if($cid){
    			$cateModel = new \Common\Model\Cate;
			//名称
    			$name = '分类';
			//值
			$value = $cateModel->where("cid={$cid}")->pluck('cname');
			//下面有多少文章
			//(1)获得当前分类的所有子分类的cid
			$cids = $cateModel->getSon($cateModel->get(),$cid);
			$cids[] = $cid;
			//(2)统计总数
			$arcModel = new \Common\Model\Arc;
			//category_cid IN(20,21,22)"
			$count = $arcModel->where("category_cid IN(" . implode(',', $cids) . ")")->count();
			//文章
			$data = Db::table('article')
					->join('category','category_cid','=','cid')
					->where("category_cid IN(" . implode(',', $cids) . ")")
					->get();
					
			$data = $tagModel->getTag($data);
    		}
		if($tid){
			//名称
			$name = '标签';
			//值
			$value = $tagModel->where("tid={$tid}")->pluck('tname');
			//下面有多少文章
			$arcTagModel = new \Common\Model\ArcTag;
			$count = $arcTagModel->where("tag_tid={$tid}")->count();
			//文章
			$data = Db::table('article_tag')
					->join('article','article_aid','=','aid')
					->join('category','category_cid','=','cid')
					->where("tag_tid={$tid}")->get();
			$data = $tagModel->getTag($data);
		}
		View::with('name',$name);
		View::with("value",$value);
		View::with("count",$count);
		View::with('data',$data);
    		View::make();
    }
}







