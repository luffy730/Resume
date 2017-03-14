<?php
namespace wechat;
//微信菜单管理
class Button extends WeChat{
	public function create($data){
		$url ="https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".
		$this->getAccessToken();
		$res = Curl::post($url,$data);
		$res = json_decode($res,true);
		if($res['errcode']!=0){
			$this->error = $res['errmsg'];
			return false;
		}
		return true;
	}
}
