<?php
/**
 * 	PHP是动态类型的语言
 * 1.可以在new对象的时候，由变量来指定对象名
 * 		$class_name = "ClassName";
 * 		$obj = new $class_name;	//注意此时new 后面是变量名
 * 	但是在命名空间中则不能直接这样做，必须使用完全限定名称(包括命名空间前缀的类名称)
 */

/*动态访问命名空间中的元素*/
namespace namespacename;

class MyClass
{
	function __construct() 
	{
		echo  __METHOD__,"\n";
	}
}
function funcname()
{
	echo __FUNCTION__,"\n";
}
const MY_CON = "i am a const";

$a = "\\namespacename\MyClass";
$obj = new $a;
$b = "namespacename\MyClass";
$obj = new $b; //同上 注意可以不用最前面的 \


/*namespace 关键字和__NAMESPACE__常量*/

//输出当前的命名空间
echo "  <br>" . __NAMESPACE__;

/*namespace 可以用来显式访问当前命名空间的或子命名空间中的元素，它等价于类中的self关键字*/
echo "<br>";
echo namespace\MY_CON;