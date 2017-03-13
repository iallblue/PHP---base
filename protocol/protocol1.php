<?php 
/**
 * PHP封装了大量的协议
 * http
 * ftp
 * file
 * zlib
 */

/*   http   */
$url = "http://www.exam.com/redirect.php";

$fp = fopen($url,"r");

$meta_data = stream_get_meta_data($fp);
foreach ($meta_data as $key => $response) {
	/*   是否被重定向   */
	if (strtolower(substr($response,0,10)) == 'location: ') {
		/*   更新重定向后的url   */
		$url = substr($response,10);
	}
}
/**
 * http连接是只读的 openssl可以支持https
 */