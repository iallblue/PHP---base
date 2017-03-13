<?php 
	/**
	 * 	namespace (命名空间)
	 * 	分组 + 封装 /home/grep/test.txt /home/other/test.txt
	 * 1.用户的代码和php内部的类/函数/常量/或第三方类/函数/常量名字相同
	 * 2.为了增加代码的可读性，当代码的目录很深的时候在引入相应的代码就变得很累	
	 *
	 * 命名空间主要用于类的构造 函数 常量
	 */
	
/*------------ 实例 ------------*/
namespace my\space;

class MyClass {}
function foo(){}
const MYCONST = 1;

$a = new MyClass();
$c = new \my\space\MyClass;

$a = strlen("hi");

$d = namespace\MYCONST;

$d = __NAMESPACE__ . '\MYCONST';
var_dump($d);
echo constant($d);

/*------------ 定义命名空间 ------------*/
namespace MySpace;

const VA1 = 1;
class Conn{}
function test(){}

/*------------ 定义子命名空间 ------------*/
	/**
	 * 使用子命名空间会让代码层次更清晰
	 */
namespace MySpace\sub\level;	

const VA1 = 1;	  /*   MySpace\sub\level\VA1   */
class Conn{}      /*   MySpace\sub\level\Conn  */
function test(){} /*   MySpace\sub\level\test   */

/*------------ 相同文件的定义多个命名空间 ------------*/
	/**
	 * 1.在同一个文件中多个命名空间，用{}包起来会让代码逻辑清晰
	 * 2.在实际中不提议在一个文件中声明多个命名空间
	 * 3.将全局的非命名空间中的代码和命名空间的代码组合在一起，只能使用大括号形式，全局代码用namespace 不加名称加上大括号构成
	 */
	
	// 会报错
	// 因为对于命名空间的{} 在{}之前只能有declare() 语句
	
namespace OneSpace{

	exit();

	const VA1 = 1;
	class Conn{}
	function test(){}

}	

namespace AnoSpace{

	const VA1 = 1;
	class Conn{}
	function test(){}

}


namespace {
	/*   global code  */
	session_start();
	$var1 = OneSpace\Conn();
	echo OneSpace\Conn::start();
}