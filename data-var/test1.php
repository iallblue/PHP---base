<?php
error_reporting(E_ALL);
	/**
	 * 	预备知识
	 * 	1.形式是$var 变量名区分大小写 变量名以字母或者下划线开头不能以数字开头($this是特殊变量不能被赋值)，检测变量名是否合法是通过正则表达式
	 * 	2.引用传递(&)
	 */
	
/*------------ 引用传递 test------------*/	
	
	$var = 'hello';
	$var1 = &$var;
	$var1 = 'world';
	echo $var;	
	
	//注意只有有名字的变量才能被引用赋值
	//$var2 = &(2 * 3); //报错

	/**
	 * 尽量保证初始化变量
	 * ->:被初始化为
	 * 1.bool -> false
	 * 2.int and float -> 0
	 * 3.string and array -> "" and array()
	 */


/*------------ 变量范围 ------------*/	
	/**
	 * 1.include 则在include之前的变量可在include的文件中使用
	 * 2.在php中使用全局变量必须要声明global 不声明在函数内调用会自动按照局部变量来处理
	 */
	$a = 100;
	function fun()
	{
		echo "----" . $a . "<<<<<";
	}
	//@fun(); //不会输出100
	

/*------------ global关键字 ------------*/	
	$g1 = 100;
	$g2 = 200;
	function foo1()
	{
		global $g1,$g2;	//也可使用$GLOBALS[];
		// $g1 = 300;
		$GLOBALS['g1'] = 500;
	} 

	function foo2()
	{
		global $g1,$g2;
		// $g1 = 400;
		$GLOBALS['g1'] = 600;

	} 
	foo1();
	var_dump($g1);

	/**
	 * $_POST,$_GLOBALS是超全局变量 但大多数 预定义变量并不是超全局变量 需要global直接说明
	 */
	
	function test_global()
	{
		global $HTTP_POST_VARS;

		echo $HTTP_POST_VARS['name'];
	}

	/*   函数外使用global并不算错   */

	/*  static(在编译时确定的)static是针对变量的   */
	function test()
	{
		static $count = 0;//不加static会无限循环 <50
		$count++;
		echo $count . "<br>";
		if ($count < 10) {
			test();
		}
		//$count--;
	}

	test();	
	// echo $count;
	// $var3 = 100;
	function test2()
	{
		// global $var3 = 100;//错误书写
		global $var3; //在引入是不能赋值
		$var3 = 120;
	}
	test2();
	var_dump($var3);


	/*   stdClass 是一个zend的保留类(类似于所有对象的基类)   */
	function &get_instance_ref() {
	    static $obj;

	    echo 'Static object: ';
	    var_dump($obj);
	    if (!isset($obj)) {
	        // 将一个引用赋值给静态变量
	        $obj = &new stdclass; 
 	    }
   		// $obj->property++;
   	    return $obj;
	}

	$obj1 = get_instance_ref();

/*------------   可变变量   ------------*/

/*------------ php外的变量 ------------*/
	/**
	 * 来自html
	 * 来自post或者get提交（其实本质上都是cgi设置的环境变量）
	 */

