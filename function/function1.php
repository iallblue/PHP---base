<?php
	/**
	 *	基本知识(php的函数 可以完全不用考虑返回值的事情)	
	 * 1.自定义函数
	 * 2.函数参数
	 * 3.返回值
	 * 4.可变函数
	 * 5.内置函数
	 * 6.匿名函数
	 */
	
/*------------ 自定义函数 ------------*/
	/*   普通函数   */

	function foo1()
	{
		echo "hello<br>";
		return;
	}	
	foo1();

	/**
	 * 调用函数的时候必须要函数 预先定义,而且函数内可以声明函数
	 * 函数的作用域是全局空间的
	 */
	function foo2 ()
	{
		function bar()
		{
			echo "my life is nice <br>";
		}
	}

	foo2();

	//-----------------------
	//bar()可以调用 在foo2()调用后
	bar();


/*------------ 函数参数 ------------*/
	/**
	 * 参数和变量不是一回事！但他们都存储在函数栈中
	 */
	
	/*   通过引用传递参数   */
	function fun1(&$var)
	{	
		$var = 100;
	}

	$a = 200;
	fun1($a);//和C语言不同，若是引用传递，C语言需要传递一个地址过去
	echo $a; //被改变了


	/*   默认参数(应该讲默认参数的值放在右侧)   */
	//允许使用数组和NULL来作为默认参数
	function fun2($var,$str = "i am a defalut")
	{	
		echo "<br> $var <br>";
		echo "<br> $str <br>";
	}
	fun2("i am the first val");

/*------------ 返回值 ------------*/

	/*   函数返回一个引用   */
	//注意两个 & 缺一不可
	function &return_reference(&$val)
	{
		return $val;
	}

	$myvar = "100";
	$newvar = &return_reference($myvar);
	$newvar = "200";
	var_dump($myvar);

	/*   可变函数   */
	/**
	 *  参数名可以当做函数调用
	 *  主要用于自定义的函数 不能作用 echo  print isset等。。。
	 */
	//作用范围可以为类内的函数 和 静态方法
	function myfun1()
	{
		echo "hello this myfun<br>";
	}
	$str = "myfun1";
	$str();//调用可变函数

/*------------ 匿名函数 ------------*/

	/*   匿名函数   */
	/**
	 * 别称：闭包函数(每次听到都感觉好高大上)
	 * 允许临时创建一个没有名字的函数，经常用做函数的callback()
	 */
	
	//-------------------------
	//匿名函数
	echo preg_replace_callback('~-([a-z])~', function ($match) {
    	return strtoupper($match[1]);
	}, 'hello-world');
	// 输出 helloWorld
	
	/*    匿名函数变量赋值   */
	$greet = function($name)
	{
		echo "welcome  $name<br>";	
	};	//很容易忘记;
 
	$greet('jack');
	$greet('mark');

	/*   Closures(内置类) 和作用域   */
	class MyCart
	{
		const PRICE_APPLE = 1.00;
		const PRICE_MILK = 3.00;
		const PRICE_EGGS = 6.95;

		protected $products = array();

		public function add($product,$number)
		{
			$this->products[$product] = $number;
		}

		public  function getNumber($product)
		{
			return isset($this->products[$product]) ? $this->products[$product] : FALSE;
		}

		public function getTotal($tax)
		{
			$total = 0.0;

			$call = function ($number,$product) use ($tax,&$total){
				$itemPrice = constant(__CLASS__ . "::PRICE_" . strtoupper($product));
				$total += ($itemPrice * $number) * ($tax + 1.0);
			};
			array_walk($this->products, $call);//为数组数组中的每个元素调用 $call函数
			return round($total,2);
		}
	}

	$myCart = new MyCart();

	//添加商品
	$myCart->add("apple",1);
	$myCart->add("milk",3);
	$myCart->add("eggs",6);

	//得到总结果 有$tax = 0.05
	echo $myCart->getTotal(0.05) . "<br>";



//----------------------------------
//PHP不支持函数重载