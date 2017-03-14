<?php namespace Home\Controller; 

use Hdphp\Controller\Controller;

//测试控制器
class IndexController extends Controller{
	
    //动作
    public function index(){
       //实例化分类控制模型
	   $catModel = new \Common\Model\Cate;
	   //精品团购输出******************************
	   //实例化商品模型
	   $gomodel= new \Common\Model\Goods;
	   //获得所有商品数据
	   $goData= $gomodel
	   ->where("is_bout=1")
	   ->orderBy('addtime','ASC')
	   ->limit(4)
	   ->get();
	   //精品团购输出******************************
	   //一楼输出******************************
	   $newModel= new \Common\Model\Goods;
	   $newData= $newModel->where('category_cid in(13,40,42)')->get();
	   View::with('new',$newData);
	   //一楼输出******************************
	   //二楼输出******************************
	   $firstModel= new \Common\Model\Goods;
	   $firstData= $firstModel->where('category_cid=16')->get();
	   View::with('first',$firstData);
	   //二楼输出******************************
	   //三楼输出******************************
	   $secondModel= new \Common\Model\Goods;
	   $secondData= $secondModel->where('category_cid in(20,21)')->get();
	   View::with('second',$secondData);
	   //三楼输出******************************
	   //四楼输出******************************
	   $thirdData = $firstModel->where('category_cid in (77,78,87,88,90)')->get();
	   View::with('third',$thirdData);
	   //四楼输出******************************
	   //品牌输出******************************
	   $brandModel = new \Common\Model\Band;
	   $brandData= $brandModel->limit(10)->get();
	   View::with('brand',$brandData);
	   //品牌输出******************************
	   //特色购输出******************************
	    $fourthData = $firstModel->where('category_cid in (77,78,87,88,90)')->limit(3)->get();
	   View::with('fourth',$fourthData);
	     $fifthData= $firstModel->where('category_cid in(11,12,13)')->limit(3)->get();
	   View::with('fifth',$fifthData);
	   //特色购输出******************************
	   //或的所有分类数据
	   //调取缓存分类
	   //第二次查询的时候会直接调取静态变量
	   $cats = $catModel->getAll();
	   //获得顶级分类数据
	   $oldCats=$catModel->where("pid=0")->get();
	   //调用框架方法自动找子集，类似递归，找到所有子分类
	   $newCats=Data::channelLevel($cats);
	   //分配变量，在页面输出
	   View::with('go',$goData);
	   //分配变量在页面输出
	   View::with('oldCats',$oldCats);
	   //分配变量在页面输出
	   View::with('cats',$cats);
	   //分配变量在页面输出
	   View::with('newCats',$newCats);
//	   sp($newCats);
	   //载入模板
       View::make();
    }
	//用户退出
	public function out(){
		//清除session变量
		session_unset();
		//清除session文件
		session_destroy();
		//跳转index方法载入模板
		go(U('index'));
	}
}
