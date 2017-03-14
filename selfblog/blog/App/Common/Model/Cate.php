<?php namespace Common\Model;
use Hdphp\Model\Model;
//分类操作模型
class Cate extends Model{
	//指定模型操作的表（protected $table是固定的写法）
	protected $table='category';
	//自动验证(固定写法)
	protected $validate=array(
		//array(字段名，验证方法，错误信息，验证条件，验证时间)
		array('cname','required','分类名称不能为空',3,3),
		array('ctitle','required','分类标题不能为空',3,3),
		array(
			'csort','num:0,65535','分了排序必须为数字而且是0-65535之间',3,3
		),
	);
	
	//此方法是自定义的，未来想添加的时候直接调用这个方法就可以添加了
	public function addData(){
		//调用add方法之前，必须经过create ，否则无法添加
		//create 才会触发自动验证
		if($this->create()){
			//调用框架里面的添加方法
			$this->add();
			return true;
		}
		return false;
	}
	
	//修改
	public function editData(){
		if(!$this->create()) return fales;
		//如果不想加where就能修改，那么必须在页面放主键的隐藏域
		$this->save();
		return true;
	}
	
	//获得除了自己和自己的所有的子集分类
	public function getNoMy($cid){
		//获得所有子集的分类的cid
		$cids=$this->getSon($this->get(),$cid);
		//把自己压进去
		$cids[]=$cid;
		//变成字符串形式21,22,23,40
		$strCids=implode(',',$cids);
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