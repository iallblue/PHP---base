<?php
// 显示所有错误
error_reporting(E_ALL);
	/**
	 *		php数据类型测试(php - 弱类型语言)
	 *		
	 *	1.标量类型：bool int float string
	 *  2.复合类型：array object 
	 *  3.特殊类型：NULL resouce
	 */
	
	$a_str = "helloworld";
	$a_bool = TRUE;
	$a_int = 6;

	/**
	 * 	is_"type"
	 */

	if (is_string($a_str)) {
		echo "'$a_str' is a string.<br>";
	} else {
		echo "not string";
	}
	
	if (is_bool($a_bool)) {
		echo "'$a_bool' is a bool.<br>";
	} else {
		echo "not bool";
	} 

	if (is_int($a_int)) {
		echo "'$a_int' is a string.<br>";
	} else {
		echo "not int";
	} 

	/**
	 * 	1.查看表达式 更倾向于 var_dump();
	 * 	2.类型转换相关 settype();
	 * 		settype($var,"int");
	 */
/*------------ bool test------------*/	
	/**
	 * 下面的都被转换为bool时值被认为是：false
	 * 1.FALSE
	 * 2.int 0
	 * 3.float 0.0
	 * 4.空数组 array()
	 * 5.空字符串 和 字符串"0"
	 * 6.不包含任何成员变量的对象 
	 * 7.特殊类型 NULL
	 */
	var_dump((bool)"");//false
	var_dump((bool)2);//true
	var_dump((bool)0.0);//false
	var_dump((bool)array());//false
	var_dump((bool)array(1));//true
	var_dump((bool)"0");//false
	var_dump((bool)"false");//注意是字符串 true

/*------------ Integer test------------*/	
	/**
	 * 	各种进制表示
	 *1.二进制 0b
	 *2.八进制 0-----------------------------易忘-------------------------
	 *3.十六进制 0x
	 */
	$a = 1/2;
	var_dump($a);//被转换为float类型了

	$b = 123;//十进制
	$c = -123;//负数
	$d = 0012999999;//八进制 被认为是 10 无效部分被截断
	$e = 0x1a;//十六进制

	var_dump($b);
	var_dump($c);
	var_dump($d);
	var_dump($e);

	/**
	 * 1.八进制遇到非法的数字会被截断，只取有效的部分来进行计算
	 * 2.int类型遇到计算瓶颈(溢出...)，会被转为float
	 * 3.千万不要将未知的`分数`转为int，会出现难以预料的错误
	 * 4.当遇到函数类型转换时 用intval() 来转换 
	 * 5.round()函数
	 */
	$f = 2/1.0;
	var_dump($f);//注意函数类型
	$m = "123.123";
	var_dump(intval($m));

/*------------ flaot test------------*/	
	/**
	 * 	关于float比较重要的就是 精度 问题
	 * 	1.float 有双精度double,或是实数real
	 * 	2.最好不要比较两个浮点数的值，因为精度是非常无法统一的
	 */
	$a =  1.232;
	$b = 1.2e3;
	$c = 7E-10;
	var_dump($a);
	var_dump($b);
	var_dump($c);
/*------------ string test------------*/	
	/**
	 *	每个字符是一个字节，支持256的字符集，不支持unicode(输出特殊字符需要转义)
	 *1.单引号（在单引号中字符串会以 原来样子的变量显示 不会被值替换）
	 *2.双引号
	 *3.heredoc语法结构 <<< (只对包含变量使用有效)
	 *4.nowdoc结构	<<<''需要加上单引号 
	 */
	
	//heredoc()
	//$a = <<<EOL asdfasdfasdfasdfadsfdsf EOL;
	//var_dump($a);
echo <<<EOL
asdfasdfasdfasdfadsfdsf<br>
EOL;
//发现错误 假如后面这一行是最后一行则就会报错

	$arr = array('1','2');
	echo "$arr[1]<br>";