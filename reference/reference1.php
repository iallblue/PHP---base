<?php
/**
 * 	what's reference 
 * 	php的引用是符号表别名，和C语言指针不一样(C语言是指向同一个内存位置)，PHP是引用了同一个符号表中的符号，
 * 	PHP是用符号名来访问符号对应的变量内容
 */



/*取消引用*/
/*只是断开了变量名和变量内容之间的绑定，并不意味着变量内容被销毁了*/
$a = 10;
$b = &$a;
$b = 100;
// var_dump(get_defined_vars());
var_dump($b);
var_dump($a);
unset($b);
var_dump($a);
//var_dump(get_defined_vars());
echo "just just <br>";
$GLOBALS["baz"] = 100;
function foo(&$var)
{
	$var = &$GLOBALS['baz'];
}
$bar;
foo($bar);//函数结束后会被销毁
var_dump($bar);