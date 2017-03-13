<?php
/**
 * 	预定义常量 - 脚本就是借用了cgi,cgi的环境变量则对应的就是预定义变量
 *超全局变量
 *$GLOBALS - 作用域中全部可用变量
 *$_SERVER - 服务器和执行环境信息
 *$_GET - httpGET请求
 *$_POST - httpPOST请求
 *$_FILES - http文件上传变量
 *$_REQUEST 
 *$_ENV - 环境变量
 *$_COOKIE 
 *$_SESSION
 *$php_errormsg - 前一个错误信息
 *$HTTP_RAW_POST_DATA - 原生post数据
 *$http_response_header - http响应头
 *$argc - 传递给脚本的参数数目
 *$argv - 传递给脚本的参数数组
 */
session_start();

/*   $GLOBALS   */
//变量名是数组的键名,不需要用 global $var;来访问

function test()
{
	$var = "local";

	echo "global var:" . $GLOBALS['var'] . "<br>";
	echo "local var:" . $var . "<br>";
}
$var = "global";
test();
var_dump($_SERVER);
var_dump($_SERVER['SERVER_NAME']);

var_dump($_ENV);
var_dump($_COOKIE);
var_dump($_SESSION);

/*   http_response_header   */
function test_header()
{
	file_get_contents("http://127.0.0.1");
	var_dump($http_response_header);
}
test_header();
@var_dump($http_response_header);

/*   $argc   */
//命令行参数

/*   $argv   */
//命令行值
// // var_dump($argc);
// if (PHP_SPAI != 'cli') {
// 	exit();
// }
@var_dump(PHP_SPAI);

$cli_mode = false;
if (isset($_SERVER['argc']) && $_SERVER['argc']>=1) {
	$cli_mode = true;
}

/*------------ 和c语言类似 ----------------*/