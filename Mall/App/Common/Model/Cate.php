<?php namespace Common\Model;
use Hdphp\Model\Model;
//分类操作模型
class Cate extends Model{
	//指定模型操作的表（固定写法）
	protected $table="category";
	//自动验证（固定写法）
	protected $validate=array(
		//array(字段名，验证方法，错误信息，验证条件，验证时间)
		array('cname','required','分类名称不能为空',3,3),
		array('sort','required','分类排序必须是数字，而且是在0-65535之间的',3,3)
	);
	//自动完成
	protected $auto=array(
		array('type_tid','0','string',3,1)
	);
	
	/**
	 * [getAll] 获得所有的数据
	 * @return [type] [description]
	 */
	public function getAll(){
		//声明静态变量 为空
		static $cateData=NULL;
		//如果静态变量存在（里面有值）就返回出去
		if($cateData) return $cateData;
		//获取缓存
		$data=S('category');
		//如果缓存不存在，那么查询数据库，重新设置缓存
		if(!$data){
			//查询数据库
			$temp=$this->get();
			//声明一个用来储存数据的数组
			$data=array();
			foreach ($temp as $v){
				//把cid主键作为键名
				$data[$v['cid']]=$v;
			}
			//设置缓存
			S('category',$data);
		}
		//存入静态变量
		$cateData=$data;
		return $data;
	}
	
	/**
	 * [getOne 获得单条数据]
	 * @param [type] $id [主键 id]
	 * @return [type]   [description]
	 */
	 public function getOne($id){
	 	//获得所有的数据
	 	$data=$this->getAll();
		//如果类型 id存在的话
		if(isset($data[$id])){
			//返回 类型id
			return $data[$id];
		}
	 }
	 /**
	  * [updateCache 更新缓存]
	  * @return [type] [description]
	  */
	 public function updateCache(){
	 	//清除缓存
	 	Cache::del('category');
	 } 
	 /**
	  * [store 添加]
	  */
	  public function store(){
	  	if(!$this->create()) return false;
		//跟新缓存
		$this->updateCache();
		return $this->add();
	  }
	//此方法是自定义的，未来想添加的时候直接调用这个方法就可以了
	public function addData(){
		//调用add方法之前，必须要经过create，否则无法添加
		//只有create才会触发自动验证
		if($this->create()){
			$this->updateCache();
			//调用框架里面的添加方法
			$this->add();
			
			//返回真，否则添加过程冲出现的错误就不会被getError获取到，提示错误的时候就是空白的
			return true;
		}
		return false;
	}
	
	//编辑
	public function editData(){
		if(!$this->create()) return false;
		//如果不想加where就能修改，那么必须在页面放主键的隐藏域
		$this->save();
		//返回真，否则编辑过程冲出现的错误就不会被getError获取到，提示错误的时候就是空白的
		return true;
	}
	
	//获得除了自己和自己的所有的子集的分类
	public function getNoMy($cid){
		//获得所有分类的cid
		$cids=$this->getSon($this->get(),$cid);
		//把自己压进去
		$cids[]=$cid;
		//变成字符串形式21,22,24,30
		$strCids=implode(',', $cids);
		//返回结果
		return $this->where("cid NOT IN({$strCids})")->get();
	}
	
	/**
	 * 递归获得所有的子集的cid
	 * @param $data 全部分类数据
	 * @param $cid 当前分类的cid
	 */
	 
	 public function getSon($data,$cid){
	 	//声明空数组用来保存子集的cid
	 	$temp=array();
		//遍历全部分类数据，得到所有分类
		foreach ($data as $v){
			//找到了子集
			//如果当前分类的父级id等于当前分类的cid
			if($v['pid']==$cid){
				//把当前分类的cid存入到数组中，因为它可能还有子集分类，如果不存到数组就只能存一条，下次会覆盖之前的
				$temp[]=$v['cid'];
				//合并数组temp 是getSon最钟要返出去的数组，因为每执行一次GetSon 递归
				$temp=array_merge($temp,$this->getSon($data,$v['cid']));
			}
		}
		//返回结果，
		return $temp;
	 }
}























 ?>