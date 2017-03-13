<?php
header('Content-type:text/html;charset=utf8');
/*------------ 常量 ------------*/
	/**
	 * 	可用define()来定义，>5.3可用const来定义，一旦定义就无法更改
	 *1.常量只能包含标量数据（boolean，integer，float 和 string）。可以定义 resource 常量，但应尽量避免，因为会造成不可预料的结果
	 *2.引用常量不需要 加上$
	 *3.可通过constants("动态常量名引用常量")
	 *4.要检查是否定义某常量可用 defined()来进行
	 * 
	 */
	define("MYC","hello");
	echo MYC;
	const ALLBLUE = "world";//>5.3
	echo ALLBLUE;	

	/*   魔术常量   */

	/**
	 * 主要是根据不同的扩展库而定义的，只有加载这些库之后才会有
	 */
	echo "<br> line:" . __LINE__ . "<br>";
	echo "<br> 文件完整路径:" . __FILE__ . "<br>";
	echo "<br> 文件所在目录:" . __DIR__ . "<br>";
	echo "<br> 函数名称:" . __FUNCTION__ . "<br>";
	echo "<br> 类的名称:" . __CLASS__ . "<br>";
	echo "<br> 命名空间:" . __NAMESPACE__ . "<br>";

/*------------ 表达式 ------------*/

	/**
	 * + - * /
	 * ++  -- ?
	 */
