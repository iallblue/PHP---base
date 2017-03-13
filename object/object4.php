<?php
/*------------ interface ------------*/

	/**
	 * 	接口(interface)
	 * 	可以指定某个类必须实现那些方法，但不需要定义这些方法的具体内容
	 * 	接口中定义的所有方法都必须是public的
	 * 	实现接口(implements) 类中必须实现所有方法(可以实现多接口)
	 * 	接口也可以通过使用 extends
	 * 	接口中也可以使用常量 但子接口子类不能覆盖 
	 */
	interface class1
	{
		const VAR1 = "mcx";
		public function fly();
	}
	//子类不能修改常量
	class SonClass implements class1
	{
		// const VAR1 = "allblue";
		public function fly()
		{
			// echo "i believe i can fly";
			echo class1::VAR1;
			// echo "the const is :" . VAR1;
		}
	}

	$obj = new SonClass();
	// $obj::VAR1 = "allblue";//错误方式
	echo $obj::VAR1;
	$obj->fly();

/*------------ 重载 ------------*/



/*------------ 遍历对象 ------------*/
	/**
	 * 可通过foreach遍历属性
	 */
	
	class Test
	{
		public $var1 = "public";
		protected $var2 = "protected";
		private $var3 = "private";

		public function test1()
		{
			echo "hello";
		}

		public function testFor()
		{
			echo "<br>-------------Foreach---------------<br>";
			foreach ($this as $key => $value) {
				echo $key . "---" . $value . "<br>";
			}
		}
	}
	$obj = new Test();
	$obj->testFor();
/*------------ 魔术方法 ------------*/
	/**
	 * __toString() __sleep() 
	 * ...
	 * __是表示是魔术方法
	 */
	
	//-----------------------------
	//__toString
	class TestClass1
	{
		function __toString()
		{
			return "this is test to string<br>";
		}
	}

	$obj = new TestClass1();
	echo $obj;

/*------------ final关键字 ------------*/
	/**
	 *	final 的类 不能被继承
	 *	final 的方法 不能被覆盖 
	 */
	
	final class finClass 
	{
		public function test()
		{
			echo "this class will not extends";
		}
	}

	//提示错误
	// class wrongClass extends finClass
	// {

	// }


/*------------ 对象赋值clone ------------*/
	/**
	 * clone 关键字 会调用__clone() 假如父类声明了 
	 */
	// class baseClass
	// {
	// 	public $var = 1;

	// 	public function __clone()
	// 	{
	// 		$this->val = 100;
	// 	}

	// }

	// class cloneClass
	// {
	// 	function myclone()
	// 	{
			
	// 	}
	// }
	
