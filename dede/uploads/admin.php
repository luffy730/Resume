<?php
define('APP_NAME','Admin');
define('APP_PATH','./Admin/');
define('THINK_PATH','./ThinkPHP/');
define('APP_DEBUG',TRUE);
define('COMCONF_PATH', './Common/Conf/');
define('SELF', str_replace('\\','/',dirname(__FILE__)).'/');
require THINK_PATH.'ThinkPHP.php';
