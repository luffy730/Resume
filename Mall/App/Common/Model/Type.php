<?php namespace Common\Model;
use Hdphp\Model\Model;
//类型表操作模型
class Type extends  Model{
	//指定要操作的表（不定写法）
	protected $table="type";
	//自动验证
	protected $validate=array(
		array('tname','required','类型名称不能为空',3,3)
	);
	//添加数据
	public function addData(){
		if(!$this->create()) return false;
		//把字符串变为数组
		$type=explode('|',Q('post.tname'));
		//遍历添加
		foreach($type as $tname){
			//键名为字段名，键值就是要插入的值
			$data=array('tname'=>$tname);
			//add 可不传参，也可以传参
			$this->add($data);
		}
		return true;
	}
	
	//修改
	public function editData(){
		//修改之前必须要经历create
		//只有create才能触发自动验证，自动完成
		if(!$this->create()) return false;
		//如果想不加where就能修改，那么必须在页面放主键的隐藏域
		$this->save();
		//返回真，如果没有返回的话，修改过程中出的错误就不会被getError接收到，报错的时候回显示空
		return true;
	}
}



















 ?>