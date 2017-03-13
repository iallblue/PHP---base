<?php
	/**
	 *	php运算符(一元 二元 三元)
	 * 1.优先级
	 * 2.算术运算符
	 * 3.赋值运算符
	 * 4.位运算符
	 * 5.比较运算符
	 * 6.错误控制运算符
	 * 7.执行运算符
	 * 8.递增/递减运算符
	 * 9.逻辑运算符
	 * 10.字符串运算符
	 * 11.数组运算符
	 * 12.类型运算符
	 */
	
/*------------ 优先级 ------------*/	

	/**
	 * 参照C语言 一元>二元>三元
	 */
	
/*------------ 算术运算符 ------------*/	
	
	/**
	 * + - * / %
	 */
	
/*------------ 赋值运算符 ------------*/	

	/**
	 * =
	 */
	
/*------------ 位运算符 ------------*/	

	/**
	 * &(按位相与) |(按位相或) ^(按位异或) ~(按位取反) <<(左移) >>(右移)
	 * 移位运算>> 的运算效率要远远高于 算术运算符 (* /)
	 */
	$val = 2;
	$place = 3;
	$val = $val << $place;
	echo $val . "<br>";
	
/*------------ 比较运算符 ------------*/	

	/**
	 * == ===(全等,比较对象的类型也相同) !== != <> < > <= >=
	 * 当比较关于数字和字符的比较时，会将字符转换成数字然后在进行相关比较
	 */
	
	//三元运算符
	//不清晰的逻辑
	echo (true ? 'true' : false ? 't' : 'f');

	echo "<br>";

	//正确的表达
	echo ((true ? 'true' : 'fasle') ? 't' : 'f');

/*------------ 错误控制运算符 ------------*/	

	/**
	 * @屏蔽错误
	 */
	
/*------------ 执行运算符 ------------*/	

	/**
	 * `` 单引号
	 * 作用类似于 shell的exec() 系统调用
	 * 前提是开启安全模式 或者 shell_exec()可用
	 */	
	
	$output = "ls -al"; 
	echo "<pre>$output</pre>";

/*------------ 递增递减运算符 ------------*/	

	/**
	 * 同C语言 ++ --
	 */
	
/*------------ 逻辑运算符 ------------*/	

	/**
	 * 基本同C语言 &&(and) ||(or) xor(逻辑异或 两者不同时为true)  ! 
	 */
	
	$res = 1 and 0;//这样写逻辑上是错误的，不是预想中的结果
	if (1 and 0) {
		echo "true";
	} else {
		echo "false";
	}
	var_dump($res);
	//&& 等逻辑运算符要高于赋值运算符 && 的运算等级也高于 and
	$res1 = true && false;
	var_dump($res1);

/*------------ 字符串运算符 ------------*/	

	/**
	 * 字符串连接符 .
	 */
	
/*------------ 数组运算符 ------------*/	

	/**
	 * +(联合) ==(两者有相同的键值对则为true ===(键值对相等而且顺序和类型都相等时为true))  
	 */
	
	//---------------------------------
	//+ 运算符把右边的数组的元素附加到左边数组的后面，两个数组中都有的键名，则只用左边数组的，右边的被忽略	
	$a = array("a" => "apple", "b" => "banana");
	$b = array("a" => "pear", "b" => "strawberry", "c" => "cherry");
	$c = $a + $b;	//c中增加了c=> 的元素
	var_dump($c);

/*------------ 类型运算符 ------------*/	

	/**
	 * instanceof
	 */	
	
	//------------------------------------
	// 判断一个PHP变量是否属于某一类的实例
	class MyClass 
	{
		//code 
	}
	class NotMyClass
	{
		//code
	}

	$obj = new MyClass();
	var_dump($obj instanceof MyClass);
	var_dump($obj instanceof NotMyClass);

	//------------------------------------
	// 判断一个PHP变量是否属于某一子类的实例
	class MySonClass extends MyClass
	{
		//code
	}
	$son = new MySonClass();
	var_dump($son instanceof MyClass);//true
	var_dump($son instanceof MySonClass);//true	


	//------------------------------------
	// 判断一个PHP变量是否实现某个接口
	interface MyInterface 
	{
		//code 
	}
	class MySonInterface implements MyInterface
	{
		//code
	}
	$son = new MySonInterface();
	var_dump($son instanceof MySonInterface);//true
	var_dump($son instanceof MyInterface);//true	

	/*   instanceof 是用来检测对象的 不是用来检测常量的   */

