<?php namespace Common\Model;
use Hdphp\Model\Model;
//商品操作模型
class Goods extends Model{
	//指定模型操作的表（固定写法）
	protected $table="goods";
	//自动验证（固定写法）
	protected $validate=array(
		//array(字段名，验证方法，错误信息，验证条件，验证时间)
		array('gname','required','商品名称名称不能为空',3,3),
		array('category_cid','num:1,99999','请选择分类',3,3),
	);
	//***************************************************************
	//自动完成
	protected $auto=array(
		array('addtime','time','function',3,1),
		array('user_uid','uid','method',3,1),
		array('type_tid','tid','method',3,1)
	);
	//自动完成
	public function uid(){
		return $_SESSION['uid'];
	}
	//自定义方法获取tid
	public function tid(){
		//获得Post提交过来的分类 id
		$cid=Q('post.category_cid',0,'intval');
		//实例化分类模型
		$cateModel= new \Common\Model\Cate;
		//通过类型id获得类型id然后可以获得类型里面的数据
		// pluck 从数据表中取得单一数据列的单一字段
	 	$c=$cateModel->where("cid={$cid}")->pluck('type_tid');
		//返回 $c;
		return $c;
	}
	
	//***************************************************************
	//编辑商品
	public function editData(){
		//获得要编辑商品的id
		$gid=Q('get.gid',0,'intval');
		//yi.验证
		//goods验证失败返回假
		if(!$this->create()) return false;
		//2.productDetail表验证失败返回假
		$proData=new \Common\Model\ProductDetail;
		if(!$proData->create()){
			//把商品详细模型里面的错误压入到当前模型，因为控制器调用的就是当前模型的错误
			$this->error=$proData->getError();
			return false;
		}
		//3.goodspropery表验证失败返回假
		$goproModel= new \Common\Model\GoodsProperty;
		if($goproModel->create()){
			//把商品属性模型里面的错误压入到当前模型，因为控制器调用的就是当前的模型的错误
			$this->error=$goproModel->getError();
			return false;
		}
		
		//er.修改goods表
		//如果想不用where就能修改必须在模板放主键的隐藏域
		$this->save();
		//修改productDetail表
		$data=array(
			'gallery'=>implode(',', Q('post.gallery',array())),
			'detail'=>Q('post.detail'),
			'service'=>Q('post.service'),
			'goods_gid'=>$gid
		);
		$did = Q("pdid",0,'intval');
		$proData->where('pdid='.$did)->save($data);
		//修改goods_property表
		//先删除再添加
		$b=$goproModel->where("goods_gid=$gid")->delete();
		//添加
		$attrs=Q('post.attr',array());
		$specs=Q('post.spec',array());
		foreach ($attrs as $k=>$v){
			if (empty($v)) continue;
			$data=array(
				'goods_gid'=>$gid,
				'gpvalue'=>$v,
				'property_pid'=>$k
			);
			$goproModel->add($data);
		}
		foreach($specs as $k=>$v){
			foreach($v['value'] as $k2=>$v2){
				if(empty($v2)) continue;
				$data=array(
					'goods_gid'=>$gid,
					'gpvalue'=>$v2,
					'property_pid'=>$k,
					'appendprice'=>$v['price'][$k2]
				);
				$goproModel->add($data);
			}
		}
		//返回真，这样编辑过程中的错误就会被getError捕获到，并反馈处理，如果没有返回真，那么提示错误的时候是空白的什么都看不到
		return true;
	}
	//***************************************************************
	//删除商品
	//这里要传递参数$gid
	public function delData($gid){
		//1.删除goods表
		//删除商品id为get传递过来的参数
		$this->where("gid={$gid}")->delete();
		//2.删除 product_detail表
		//实例化商品详细模型
		$proModel= new \Common\Model\ProductDetail;
		//执行删除，为get传递过来要删除商品的id
		$proData=$proModel->where("goods_gid={$gid}")->delete();
		//3.删除goods_properry
		//实例化商品属性表
		$goproModel= new \Common\Model\GoodsProperty;
		//执行删除，删除get传递过来要删除商品的那个id
		$goproData=$goproModel->where("goods_gid={$gid}")->delete();
	}
	//***************************************************************
	//添加
	//此方法是自定义的，未来想添加的时候直接调用就可以了
	public function addData(){
	//yi，验证
		//添加之前必须要经过create，否则无法添加
		//只有create才能触发自动验证，自动完成
		if(!$this->create()) return false;
		//执行添加，会返回自增主键
		$gid=$this->add();
		//添加商品详细表
		$detailModel= new \Common\Model\ProductDetail;
		//把数组变为字符串，用逗号的形式
		$gallery=implode(',',Q('post.gallery',array()));
		//重组数组添加
		$data=array(
			'gallery'=>$gallery,
			'detail'=>Q('post.detail'),
			'service'=>Q('post.service'),
			'goods_gid'=>$gid
		);
		//添加到商品详细表
		$detailModel->add($data);
		//添加商品属性表goods_property
		//实例化商品属性模型
		$proModel=new \Common\Model\GoodsProperty;
		//获得post提交上来的属性数组，赋值给变量$attrs
		$attrs = Q('post.attr',array());
		//获得post提交上来的规格数组，赋值给变量$sepcs
		$specs = Q('post.spec',array());
		//遍历post提价过来的属性的数组，进行添加，这里需要用到$k,要得到添加多少条数据
		foreach($attrs as $k=>$v){
			//如果是空的话，不添加 
			if(empty($v))continue;
			//重组数组添加
			$data = array(
				'goods_gid'=>$gid,
				'gpvalue'=>$v,
				'property_pid'=>$k
			);
			//添加到商品属性表
			$proModel->add($data);
		}
		//遍历Post提交过来的规格的数组，重组，进行添加
		foreach($specs as $k=>$v){
			//遍历$v['value']，进行添加
			foreach($v['value'] as $k2=>$v2){
				//如果为空的话不添加
				if(empty($v2))continue;
				//重组数组添加
				$data = array(
					'goods_gid'=>$gid,
					'gpvalue'=>$v2,
					'property_pid'=>$k,
					'appendprice'=>$v['price'][$k2]?:0
				);
				//添加到商品属性表，需要传递参数
				$proModel->add($data);
			}
			
		}
		return true;
		}
	//***************************************************************
}























 ?>