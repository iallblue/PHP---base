<?php
//显示所有错误
error_reporting(E_ALL);

/*------------ array test------------*/	
	/**
	 *	array key=>value的映射
	 *1.数字索引和关联索引
	 */
	
	/*   在数组中使用多个键名 则后面的键名所指定的值会覆盖之前的值   */
	$arr = array(
		"1" =>"123",
		1 => "456"
		);
	var_dump($arr);	//只输出 1 => 456

	/*   key为可选项 当未指定键名的时候，php会将之前使用的键名+1作为key   */
	$arr0 = array('0','1','2');
	var_dump($arr0);
	$arr1 = array(
		"adsf",
		"adfg",
		"rty",
		"6" => 123,
		"allblue"
		);
	var_dump($arr1); //注意此时 allblue的key对应于7
	var_dump($arr1[7]);

	/*   数组的间接引用   */
	function foo()
	{
		return array(1,2,3);
	}

	$res = foo();//返回数组值
	var_dump($res);
	/**
	 * 通过$arr[] 不指定键名 会在数组的最后增加一个元素
	 * unset() 可以删除一个键值
	 */
	$res[] = 100;
	var_dump($res);//新增加了一个元素
	unset($res[1]);//不会重建索引
	var_dump($res);
	//unset($res[]); //会报错
	//var_dump($res);
	
	$arr = array(
		'k1' => 'black',
		'k2' => 'blue',
		6
		);
	var_dump($arr); //6 的索引会是 0 
	/**
	 * 数组常用函数
	 * 1.foreach
	 * 2.count() 统计数组的元素
	 * 3.填充数组 很有用 $arr[] = value - 不指定键值名(key)直接在数组的最后一个元素上追加
	 * 4.sort() 数组排序
	 */
	
/*------------ object test------------*/	
	/**
	 * Object
	 */
class obj
{
	function fun1()
	{
		echo "i am a funl";
	}
}
$my_obj = new obj();
$my_obj->fun1();

/*------------ resouce test------------*/	
	/**
	 * resource 是一种特殊变量，保存一个对外部资源的引用
	 * 如：打开文件的句柄，数据库的连接
	 * 一般情况下，资源所占用的内存会被zend引擎自动回收，但是数据库连接则不会
	 */


/*------------ NULL test------------*/	
	/**
	 * 以下情况会被认为是NULL
	 * 1.本身被赋值为NULL
	 * 2.尚未被复制
	 * 3.被unset()
	 * ps : 可参考 is_null()和unset()
	 */
	$var = null;
	var_dump($var);
	if (is_null($var)) {
		echo '$va1 is null';
	} else {
		echo '$va1 is not null';		
	}
/*------------ 特殊(伪)类型 test------------*/	
	/**
	 * >PHP5.4 callable类型
	 */

	function my_callback_function()
	{
		echo "hello world";
	}

	call_user_func('my_callback_function');	//把回调函数作为参数传递

/*------------ 强制类型转换 ------------*/	
	/**
	 * (bool)
	 * (int)
	 * (object)
	 * ...
	 */


