<?php namespace wechat;
class Message extends WeChat{
	//判断用户关注事件
	public function isSubscribe(){
		return $this->message->MsgType=='event' && $this->message->Event =='subscribe';
	}
	
	//判断用户取消关注事件
	public function isUnsubscribe(){
		return $this->message->MsgType=='event' && $this->message->Event =='unsubscribe';
	}
	//判断用户发的消息是否文本
	public function isTextMessage(){
		return $this->message->MsgType =='text';
	}
	public function text($content){
		$time = time();
		//会员的openid
		$toUser=$this->message->FromUserName;
		//公众号
		$fromUser=$this->message->ToUserName;
		$xml=<<<str
		<xml>
	<ToUserName><![CDATA[{$toUser}]]></ToUserName>
	<FromUserName><![CDATA[{$fromUser}]]></FromUserName>
	<CreateTime>{$time}</CreateTime>
	<MsgType><![CDATA[text]]></MsgType>
	<Content><![CDATA[{$content}]]></Content>
	</xml>
str;
	echo $xml;
	exit;
	}
}
