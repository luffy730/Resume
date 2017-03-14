<?php namespace Common\Model;
use Hdphp\Model\Model;
//商品详细操作模型
class ProductDetail extends Model{
	//指定模型操作的表
	protected $table='product_detail';
	//自动验证
	protected $validate=array(
//		array(字段名，验证方法，错误信息，验证条件，验证时间)
		array('detail','required','商品详细不能为空',3,3),
		array('service','required','售后服务不能为空',3,3)
	);
	//自动完成
	protected $auto=array(
		array('gallery','upload','method',3,3),
	);
	

}

























 ?>