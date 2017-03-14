<?php namespace Common\Model;
use Hdphp\Model\Model;
//前台注册操作模型
class Reg extends Model{
	//指定模型操作的表
	protected $table='client';
	//自动验证
	protected $validate=array(
		//array(字段名，验证方法，错误信息，验证条件，验证时间)
		array('cIdentification','requried','请输入账号',3,1	),
		array('nickname','required','请输出昵称',3,1),
		array('code','required','请输入验证码',3,1),
		array('pwd','required','请输入密码',3,1)
	);
	
	/**
	 * 注册到数据库
	 */
	 public function regData(){
	 	//执行注册之前必须要经过create，否则无法注册
	 	//只有create才可以执行自动验证，
	 	if(!$this->create()) return false;
		//调用框架的方法执行注册
		$data=array(
			'cIdentification'=>Q('post.cIdentification'),
			'nickname'=>Q('post.nickname'),
			'pwd'=>Q('post.pwd',0,'md5')
		);
		$this->add($data);
		//返回真,这样注册过程中的错误就会被getError接收到
		return true;
	 }
}




















 ?>