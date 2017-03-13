<?php 
	/**
	 * 	namespace (命名空间)
	 * 	分组 + 封装 /home/grep/test.txt /home/other/test.txt
	 * 1.用户的代码和php内部的类/函数/常量/或第三方类/函数/常量名字相同
	 * 2.为了增加代码的可读性，当代码的目录很深的时候在引入相应的代码就变得很累	
	 *
	 * 命名空间主要用于类的构造 函数 常量
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
	 * 
	 */
/**
 * file1.php
 */
namespace Foo\Bar\subnamespace;

const FOO = 1;
function foo(){}
class foo
{
	static funcition static_method() {}
}
