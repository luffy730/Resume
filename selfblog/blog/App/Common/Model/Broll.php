<?php namespace Common\Model;
use Hdphp\Model\Model;

//友情链接操作模型
class Broll extends Model{
	//指定模型操作（固定的写法）
	protected $table="link";
	//自动验证（固定写法）需要通过create方法才触发
	protected $validate=array(
		array('lname','required','友情链接名称不能为空',3,3),
		array('url','required','链接地址不能为空',3,3)
	);
	//自动完成，需要通过create方法才触发
	protected $auto=array(
		array('addtime','time','function',3,1),
		array('logo','up','method',3,3),
		array('user_uid','uid','method',3,1)
	);
	
	public function uid(){
		return $_SESSION['uid'];
	}
	
	//处理上传
	public function up(){
		//如果有隐藏域，证明是修改，直接返回原地址
		if($logo=Q('post.logo'))return $logo;
		//$_FILES能打印出来才能上传
//		sp($_FILES);exit;
		$files=Upload::type('jpg,png,gif')->size(2000000)->make();
		//如果上传成功
		if($files){
			//此处return的值会存入thumb字段
			return $files[0]['path'];
		}else{
			//否则上传失败，用户不上传就不压错误了，因为我们允许用户不上传
			if($_FILES['logo']['error']!=4){
			//这个时候把上传的错误压入到模型的error属性里面，这样外面控制器的getError方法就可以调取到错误了
			$this->error=Upload::getError();	
			}
			//返回空字符串给thumb字段
			return '';
		}
	}
	
	//编辑
	public function editData(){
		//1.验证
		//link表验证失败，返回假
		if(!$this->create()) return false;
		//如果有上传压入错误返回假
		if($this->error) return false;
		
		//2.修改
		//修改
		$this->save();
		//返回真
		return true;
	}
	
	//删除链接
	public function del($lid){
		$this->where("lid={$lid}")->delete();
	}
	
	//添加链接
	public function addData(){
		//link表验证失败返回假
		if(!$this->create()) return false;
		//如果有上传压入的错误返回假
		if($this->error) return false;
		//把字符串变为数组
		$this->add();
		return true;
	}
}




























 ?>