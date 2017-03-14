<?php namespace Common\Model;
use Hdphp\Model\Model;

class Property extends Model{
	//指定模型操作的表（固定写法）
	protected $table="property";
	//自动验证（固定写法）
	protected $validate=array(
		//array(字段名，验证方法，错误信息，验证条件，验证时间)
		array('pname','required','属性名称不能为空',3,3),
		array('value','required','属性值不能为空',3,3),
	);
	
	//此方法是自定义的，未来想添加的时候直接用这个方法就可以了
	public function addData(){
		//调用add方法之前，必须要经过create，否则无法添加
		//只有create才会触发自动验证
		if($this->create()){
			//调用框架里面的添加方法
			$this->add();
			//返回真，否则添加的过程中出现的错误就不会被getError获取到，体会错误的时候是空白的
			return true;
		}
		return false;
	}
	
	//编辑
	public function editData(){
		//修改之前必须要经历create 
		//只有create才可以触发自动验证，自动完成
		if(!$this->create()) return false;
		//如果不想不加where就能修改，那么必须在页面放主键的隐藏域
		$this->save();
		//返回真，如果没有返回的话，修改过程中出的错误就不会被getError接收到，报错的时候回显示空白
		return true;
	}
}





















 ?>