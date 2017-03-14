<?php namespace Common\Model;
use Hdphp\Model\Model;

//标签操作模型
class Tag extends Model{
	//指定操作的表（不定写法）
	protected $table="tag";
	//自动验证
	protected $validate =array(
		array('tname','required','标签名不能为空',3,3)
	);
	//添加数据
	public function addData(){
		if(!$this->create()) return false;
		//把字符串变为数组
		$tag=explode('|',Q('post.tname'));
		//遍历添加
		foreach($tag as $tname){
			//键名为字段名，键值就是要插入的值
			$data=array('tname'=>$tname);
			//add可不传参，也可以传参，
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
	return true;	
	}
	
	//传入文章数据，然后指出
	public function getTag($data){
		foreach($data as $k=>$v){
			$data[$k]['tag']=Db::table('article_tag')
			->join('tag','tag_tid','=','tid')
			->where("article_aid={$v['aid']}")
			->get();
		}
		return $data;
	}
	
}













 ?>