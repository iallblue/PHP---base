<?php
	/**
	 *	使用命名空间：别名/导入
	 *允许通过别名引用或导入外部的完全限定名称，是命名空间的一个重要特征。
	 *
	 * PHP命名空间支持 有两种使用别名或导入方式：为类名称使用别名，或为命名空间名称使用别名。PHP不支持导入函数和常量
	 *
	 * PHP中使用---use--- 来实现
	 * 
	 */


/*namespace foo;
use My\Full\Classname as Another1;	//导入

class Another
{

}
//需要include进来
use My\Full\NSname; //等同于use My\Full\NSname as NSname 相同

use \A_object; //注意前面的\ 这个是倒入全局类

$obj = new namespace\Another;	//实例化foo\Another 对象
$obj = new Another;	//实例化My\Full\Classname 对象
NSname\subn\my_fun(); //调用函数 My\Full\Nsname\my_fun 因为前面引用了 use My\Full\NSname
$a = new A_object(array(1)); //实例化A_object 对象 主要因为 use \A_object

*/
	/**
	 * tips
	 * 对于上面的情况 当导入命名空间的名称时，不需要前面加 \ 因为导入的名称必须是完全限定的！ 导入类可以加上 \
	 */
//需要include进来
/*use My\Full\Classname as Another, My\Full\NSname;

$obj = new Another; // 实例化一个 My\Full\Classname 对象
$a = 'Another';
$obj = new $a;*/

/*   关于全局空间   */
namespace A\B\C;

function fopen($str)	//调用命名空间的fopen()  A\B\C\fopen()
{
	echo "<br>$str<br>";
	@$fp = \fopen("a.txt"); //调用全局的fopen() 系统内置的函数
	var_dump($fp);
	return $fp;
}

fopen("逍遥");//调用命名空间的fopen() 

/*定义命名空间 - 定义子命名空间 - 使用*/

echo INI_ALL;