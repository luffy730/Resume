<?php namespace Common\Model;
use Hdphp\Model\Model;
//后台品牌操作模型
class Band extends Model{
	//指定模型操作的表（固定写法）
	protected $table="band";
	//自动验证(固定写法)
	protected $validate=array(
	//array(字段ing，验证方法，错误信息，验证条件，验证时间)
		array('bname','required','品牌名称不能为空',3,3),
	);
	//自动完成需要经过create方法触发
	protected $auto=array(
		array('logo','up','method',3,3),
		array('is_hot','isHot','method',3,3)
	);
	//是否热门处理
	public function isHot(){
		//返回form提交过来的is_hot的值，给默认值0，并且强制转整
		return Q('post.is_hot',0,'intval');
	}
	//处理上传
	public function up(){
		//$_FIELS能打印出来才能上传
//		sp($_FILES);exit;
		if(Q('post.logo'))return Q('post.logo');
		//对上传文件进行限制
		$files=Upload::type('jpg,png,gif')->size(2000000)->make();
//			sp($files);die;
		
		//如果上传成功
		if($files){
			//此处return的值会存入logo字段
			return $files[0]['path'];
		}else{
			//否则上传失败
			//如果用户有上传但是上传失败，用户不上传就不压错误了，因为我们允许用户不上传
			if($_FILES['logo']['error']!=4){
				//这个时候把上传额错误压入到模型的error属性里面，这样外面的控制器的getError方法就可以调取到错误了
				$this->error=Upload::getError();
			}
			//返回空字符串给thumb
			return '';
		}
	}
	
	//编辑
	public function editData(){
		//1.验证
		//.如果没有经过create验证失败，返回假
		if(!$this->create()) return false;
		//上传失败，返回假
		if($this->error()) return false;
		
		//2.修改
		//如果不加where就能修改的话，必须在页面放主键的隐藏域
		$this->save();
		//返回真，这样编辑过程中如果出错了就会被getError捕获到，如果没有返回的话， 错误提示就是空白的什么都没有
		return true;
	}
	
	//此方法是自定义的，未来想添加的时候直接调用这个方法就可以了
	public function addData(){
		//调用add方法之前必须要经过create，否则无法添加
		//只有create才会触发自动验证
		//1.验证
		if(!$this->create()) return false;
		//如果有上传压入的错误返回假
		if($this->error) return false;
	
	
	//2.添加
		//把字符串变为数组
		$type=explode('|', Q('post.tname'));
		//遍历添加
		foreach($type as $bname){
			//键名为字段名，键值就是要插入的值
			$data=array('bname'=>$bname);
			//add 可以不传参，也可以传参
			$this->add();
		}
		//返回真，这样添加过程中出的错误就会被getError接收到，不然显示错误的时候是空白的，不知道哪里错了
		return true;
	}
}

























 ?>