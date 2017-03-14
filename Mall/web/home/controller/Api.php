<?php
namespace web\home\controller;
use wechat\WeChat;
/**
 * 微信处理的接口
 */
class Api{
	//微信处理实例对象
	protected $wx;
	public function __construct(){
		$this->wx = new WeChat;
		//微信接入绑定
		$this->wx->signature();
	}
	public function handler(){
		$message = $this->wx->instance('Message'); 
		//关注时回复
		if($message->isSubscribe()){
			$message->text('感谢关注我们的公众号');
		}
		//文本消息回复 
		if($message->isTextMessage()){
			$message->text('你好!!!');
		}
	}
}
