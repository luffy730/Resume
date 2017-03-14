<?php
class TalkController{
	private static $pdo = NULL;
	//构造方法  
	public function __construct(){
		if($_GET['a']!='login' && !isset($_SESSION['nickname'])){
			header('Location:index.php?a=login');
		}
		if(is_null(self::$pdo)){
			
			try{
				$dsn = 'mysql:host=mmgyq.com;dbname=c65_guyongqing';
				$pdo = new PDO($dsn,'c65_guyongqing','admin888gyq',array(PDO::ATTR_PERSISTENT=>TRUE));
				$pdo->query("SET NAMES UTF8");
				self::$pdo = $pdo;
			}catch(Exception $e){
				die("Connect Error");
			}
		}
	}
	//显示首页
	public function index(){
		include './show.html';
	}
	
	//获得数据 
	public function get(){
		header("Content-Type:text/event-stream");
		header('Cache-Control:no-cache');
		$sql="SELECT * FROM te_message ORDER BY time ASC LIMIT 15";
		$result = self::$pdo->query($sql);
		$rows = $result->fetchAll(PDO::FETCH_ASSOC);
		foreach ($rows as $v){
			$time=date('H:i:s',$v['time']);
			echo "data:<img src='{$v['avatar']}' style='width:30px;' />  [$time] <span style='color:#ac3231'>{$v['nickname']}</span> : {$v['content']} <br /> \n";
		}
		echo "retry:1000\n";
		echo "\n\n";
		ob_flush();
		flush();
	}
	//登陆
	public function login(){

		if(!empty($_POST)){
			$_SESSION['nickname']=$_POST['nickname'];
			header('Location:./index.php');
		}
		include './login.html';
	}
	//存入数据库 
	public function put(){
		$content=$_POST['content'];
		$avatar=$_POST['avatar'];
		$time=time();
		$nickname = $_SESSION['nickname'];
		$sql= "INSERT INTO te_message(content,time,nickname,avatar) VALUES ('{$content}',{$time},'{$nickname}','{$avatar}')" ;
		echo $sql;
		self::$pdo->exec($sql);
	}
}
	session_start();
	date_default_timezone_set("PRC");
	$action = $_GET['a'] = isset($_GET['a'])?$_GET['a']:"index";
	$controller = new TalkController();
	$controller->$action();
?>