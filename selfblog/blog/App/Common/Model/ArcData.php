<?php namespace Common\Model;
use Hdphp\Model\Model;

//文章内容表操作模型
class ArcData extends Model{
	//指定模型操作的表（固定写法）
	protected $table="article_data";
	
	protected $validate=array(
		array('content','required','文章内容不能为空',3,3)
	);
}














 ?>