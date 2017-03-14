<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;

//站点配置管理控制器
class WebSetController extends CommonController{
	//构造方法，实例化的时候回自动执行
	public function __construct(){
		//调用父级的构造方法，不然会被覆盖
		parent::__construct();
	}
	
	//显示
	public function index(){
		$model=new \Admin\Model\WebSet;
		if(IS_POST){
			foreach (Q('post.') as $name=> $value)
			{
				//UPDATE webset SET value='后盾网blog教学',WHERE name='webname';
				$model->where("name='{$name}'")->save(array('value'=>$value));
			}
			//返回合法的php代码
			$phpCode=var_export($_POST,true);
			$str=<<<str
<?php
return {$phpCode};
?>
str;
			//更改配置项文件
			file_put_contents('./Config/self.php',$str);
			View::success('修改成功');
		}
		$data=$model->get();
		View::with('data',$data);
		View::make();
		
	}
	
	
}


























 ?>