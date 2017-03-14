<?php namespace Common\Model;
use Hdphp\Model\Model;
//货品操作模型
class Desc extends Model{
	//指定模型操作的表（固定写法）
	protected $talbe='description';
	//自动验证（固定写法）
	protected $validate=array(
		array(),
	)
	
	/**
	 * 添加
	 * 自定义的方法未来想添加的时候直接调用这个方法就可以了
	 */
	 public function addData(){
	 	//添加必须要经过create，否则无法添加
	 	//只有create 才可以触发自动验证和自动完成
	 	if(!$this->create()) return false;
		//指定框架里面的添加方法
		$this->add();
		//返回真，这样添加过程中出的错误就会被getError捕获到并且反馈出来，如果没有返回真的话，提示错误信息的时候是空白的
		return true;
	 }
}
























 ?>