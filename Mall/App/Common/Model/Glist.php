<?php namespace Common\Model;
use Hdphp\Model\Model;
//货品操作模型
class Glist extends Model{
	//指定模型操作的表
	protected $table='goodsList';
	//自动验证
	protected $validate=array(
		
	);
	
	/**
	 * 编辑
	 */
	 public function editData(){
	 	//编辑之前必须要经过create,否则无法编辑
	 	//只有create 才能触发自动验证，自动完成
		//
		//执行框架的编辑方法
		$str=implode(',',Q('post.grouppid'));
		//如果想不加where就能修改的话，需要在页面放主键的隐藏域
		$data=array(
			'grouppid'=>$str,
			'dcode'=>Q('post.dcode'),
			'dstock'=>Q('post.dstock'),
			'goods_gid'=>Q('post.goods_gid'),
			'glname'=>Q('post.glname'),
			'did'=>Q('post.did')
		);
		$this->save($data);
		
		return true;
	 }
	
	/**
	 * 添加
	 * 此方法是自定义的未来想添加的话直接调用这个方法就可以了
	 */
	 public function addData(){
	 	//执行添加之前必须要经过create否则无法添加
	 	//只有create才可以触发自动验证，自动完成
	 	if(!$this->create()) return false;


		//调用模型的添加方法
		$data=array(
			'grouppid'=>implode(',',Q('post.grouppid')),
			'dcode'=>Q('post.dcode'),
			'dstock'=>Q('post.dstock'),
			'goods_gid'=>Q('post.goods_gid'),
			'glname'=>Q('post.glname')
		);
		$this->add($data);
	 	//返回真，这样添加过程中的错误就会被getError接收到
	 	return true;
	 }
}



























 ?>