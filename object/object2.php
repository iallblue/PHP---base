<?php
	/**
	 *	object class
	 */

/*------------ 构造函数和析构函数 ------------*/
	/**
	 * 如果子类中定义了构造函数则不会隐式调用父类的构造函数
	 * 需要用到parent::__construct();
	 * 若子类中没有定义构造函数则会继承父类的构造函数
	 * >5.3.3 PHP命名空间中与类名同名的方法不再作为构造函数（不包括不再命名空间的类）
	 * 析构函数逻辑同上
	 */
	
	class FatherClass 
	{
		function __construct()
		{
			echo "<br>this is a father construct<br>";
		}

		function __destruct()
		{
			echo "<br>bye bye<br>";
		}
	}

	class SonClass extends FatherClass
	{
		function __construct()
		{
			echo "<br>this is son<br>";
			parent::__construct();
		}

		function __destruct()
		{
			echo "<br>son  bye bye<br>";
			parent::__destruct();
		}
	}

	$obj = new SonClass();

/*------------ 访问控制 ------------*/
	/**
	 * public(var) protected private 
	 * 在类外只能访问 public 属性的字段
	 * 继承只能继承public 和 protected
	 * 为声明的方法默认是public
	 */
	class MyClass
	{
		public $public = "public<br>";
		protected $protected = "protected<br>";
		private $private = "private<br>";

		function testEcho()
		{
			echo $this->public;
			echo $this->protected;
			echo $this->private;
		}

		private function testPri()
		{
			echo "this is private from base<br>";
		}
	}

	/**
	 * SonClass
	 */
	class SonClass2 extends MyClass
	{
		//子类只可以继承父类的public 和 protected
		protected $protected = "son---protected<br>";

		function testEcho()
		{
			echo $this->public;
			echo $this->protected;
			echo $this->private;//无法继承
		}

	}

	$obj = new MyClass();
	echo $obj->public;
	// echo $obj->protected;//不能被访问到
	$obj->testEcho();
	// $obj->testPri();//不能访问私有成员

	$son = new SonClass2();
	echo $son->public;//继承父类的
	$son -> testEcho();

	/*   类内可以访问同一个类的不同实例的私有成员   */
	class Test
	{
		private $private;

		public function __construct($private)
		{
			$this->private = $private;
		}

		private function fun1()
		{
			echo "<br>Accessed the private method<br>";
		}

		public function fun2(Test $ano)
		{
			$ano->private = "hello---world";
			print_r($ano->private);
			//访问私有方法
			$ano->fun1();
		}
	}

	$test = new Test('test');
	$test->fun2(new Test('another'));