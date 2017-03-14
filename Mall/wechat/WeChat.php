<?php
namespace wechat;
/**
 * 微信处理的公共类
 * @author 向军 <2300071698@qq.com>
 */
class WeChat{
	//微信服务器使用的TOKEN
	private $token;
	//微信消息
	public $message;
	public function __construct(){
		$this->token = c('wechat.token');
		$this->message = $this->getMessage();
	}
	protected function getMessage(){
		if ( isset( $GLOBALS['HTTP_RAW_POST_DATA'] ) ) {
            $post = $GLOBALS['HTTP_RAW_POST_DATA'];

            return simplexml_load_string( $post, 'SimpleXMLElement', LIBXML_NOCDATA );
        }
	}
	//微信接入
	public function signature(){
		if(empty($_GET['echostr']) || empty($_GET["signature"]) || empty($_GET["timestamp"]) || empty($_GET["nonce"])){
			return ;
		}
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
		$token = $this->token;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		if( $tmpStr == $signature ){
			echo $_GET["echostr"];exit;
		}else{
			return false;  
		}
	}
	//实例化具体的功能类
	public function instance($name){
		$class = '\wechat\\'.$name;
		return 	new $class;
	}
}
