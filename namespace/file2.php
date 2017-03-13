<?php
/**
 * file2.php
 */


/*------------ 使用命名空间 ------------*/
	/**
	 * 			基础
	 * 《命名空间类似于文件系统》
	 *  访问文件系统方式：
	 * 1.foo.txt -> 被解析为 ： currentDIR(当前目录)/foo.txt eg:/home/test 下的foo.txt则被解析为 /home/test/foo.txt 
	 * 2.相对路径名形式如subDIR/foo.txt 会被解析为 currentDIR(当前目录)/subDIR/foo.txt
	 * 3.绝对路径名形式如/main/foo.txt 会被解析为/main/foo.txt
	 *
	 *在PHP的命名空间中元素使用相同的原理，（命名空间就是为了方便找到和组织自己的代码 类 常量 函数）
	 * 1.非限定名称或是不包括前缀的类名称，例如 $a = new foo();或foo::static_method();
	 *   若当前的命名空间是currentNamespace,foo将被解析为currentNamespace\foo.
	 *   如果用foo的代码是全局的，不包含在任何命名空间中的代码，则foo会被解析为foo
	 * 2. 限定名称(相对路径)或是包括前缀的名称,如$a = new subnamespace\foo();或subnamespace\foo::static_method();
	 *    如果当前的命名空间是currentnamespace,则foo会被解析为currentnamespace\subnamespace\foo.
	 *    如果使用foo的代码是全局的，不包含在任何命名空间中的代码，foo会被解析为subnamespace\foo.
	 *
	 * 3.完全限定名称(绝对路径)或是包含的全局前缀操作符的名称，例如$a = new \currentnamespace\foo();或\currentspace\foo::static_method();
	 *   在这种情况下foo总是会被解析为代码中文字名 currentspace\foo.
	 */
namespace Foo\Bar;

include "file1.php";

/*声明了和file1.php相同的内容*/
const FOO = 2;
function foo() {}
class foo 
{
	static function static_method(){}
}

/*非限定名称(被解析为当前的命名空间)*/
foo();
foo::static_method();
echo FOO;
echo "<br>";


/*限定名称(相对路径)*/
subnamespace\foo();//被解析为Foo\Bar\subnamespace\foo
subnamespace\foo::static_method();//被解析为Foo\Bar\subnamespace\foo 和类下的 static_method()
echo subnamespace\FOO;//1

echo "<br>";
/*完全限定名称(绝对路径)*/
\Foo\Bar\foo();//被解析为Foo\Bar\foo()
\Foo\Bar\foo::static_method();//被解析为Foo\Bar\foo::static_method()
echo \Foo\Bar\FOO;//2

/*访问任意全局类，函数和常量，都可以使用完全限定名称 注意\ 类似于linux下的根目录 如 \strlen()*/
function strlen($str) {
	echo "<br>this is : $str <br>";
}
const INI_ALL = 3;
class Exception {}

$len = \strlen("allblue");//调用全局函数strlen()
strlen("hello world");	//调用当前空间的自定义的strlen()函数
var_dump($len);
