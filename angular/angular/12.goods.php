<?php
$goods=[
	['gname'=>'苹果手机'],
	['gname'=>'小米手环']
];
class goods{
	public function hot(){
		global $goods;
		$row = isset($_GET['row'])?$_GET['row']:2;
		echo json_encode($goods);exit;
	}
}
$obj = new goods;
call_user_func_array([$obj,$_GET['a']], []);
