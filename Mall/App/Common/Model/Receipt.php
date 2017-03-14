<?php namespace Common\Model;
use Hdphp\Model\Model;
//前台收货地址操作模型
class Receipt extends Model{
	//指定模型操作的表
	protected $table='receiptaddress';
	//自动验证
//	protected $validate=array(
//		array('consignee','required','请输入收货人',3,3),
//		array('inplace','')
//	)

	/**
	 * 编辑地址
	 */
	 public function editData(){
	 	//编辑之前必须要经过create否则无法编辑
	 	if(!$this->create()) return false;
		//把post提交过来的信息进行重组，进行编辑
		$data=array(
			'consignee'=>Q('post.consignee'),
			'province'=>Q('post.province'),
			'city'=>Q('post.city'),
			'area'=>Q('post.area'),
			'FullAddress'=>Q('post.FullAddress'),
			'rfixphone'=>Q('post.rfixphone'),
			'rphone'=>Q('post.rphone'),
			'rid'=>Q('post.rid')
		);
		$act = Q('post.action','add');
		switch ($act) {
			case 'add':
				$this->add($data);
				break;
			
			case 'edit':
				$this->where(array('rid'=>Q('post.rid',0,'intval')))->save($data);
				break;
		}
	 	//调用框架的编辑方法
		return $data;
		return true;
	 }
	/**
	 * 添加
	 */
	 public function addData(){
	 	//添加之前必须要经历create，否则无法添加
	 	//只有create才可以触发自动验证，自动完成
	 	if(!$this->create()) return false;
		//调用框架的添加方法
		$data=array(
			'consignee'=>Q('post.consignee'),
			'province'=>Q('post.province'),
			'city'=>Q('post.city'),
			'area'=>Q('post.area'),
			'FullAddress'=>Q('post.FullAddress'),
			'rphone'=>Q('post.rphone'),
			'rfixphone'=>Q('post.rfixphone'),
			'order_orid'=>Q('post.order_orid'),
			'client_clid'=>$_SESSION['clid']
		);
		$rid=$this->add($data);
		//返回真，这样添加过程中错误就会被getError捕获到
		return $rid;
		return true;
	 }
}















 ?>