<?php
	/**
	 * 	范围解析操作符(::)
	 * 可以访问静态成员 类常量 还可以用于覆盖类中的属性和方法。 
	 */
	
	class MyClass
	{
		const VAR1 = "this is const<br>";
	}
	$class = "MyClass";
	echo $class :: VAR1;

/*------------ Static ------------*/
	//self parent static 用于在类定义的内部对属性或方法的访问
	/**
	 *	声明类属性或方法，就可以不实例化类而直接访问
	 *	静态属性可以不通过一个已实例化的对象来访问(但静态方法可以)
	 *	$this 在静态方法不能使用
	 *	静态属性不能由对象通过->来访问
	 */
	
	class StaClass
	{
		public static $sta_var = "grow";

		public function getStaValue()
		{
			return self::$sta_var;
		}
	}

	class SonStaClass extends StaClass
	{
		public function getParSta()
		{
			return parent::$sta_var;
		}
	}

	echo "<br>" .  StaClass::$sta_var . "<br>";
	$father = new StaClass();
	echo "<br>" .  $father->getStaValue() . "<br>";
	echo "<br>" .  SonStaClass::$sta_var . "<br>";//子类可以继承父类的静态变量
	SonStaClass::$sta_var = "world";
	$son = new SonStaClass();
	echo "<br>" .  $son->getStaValue() . "<br>";
	echo "<br>father:" .  StaClass::$sta_var . "<br>";


/*------------ 抽象类 ------------*/
	/**
	 *	 抽象类和抽象方法
	 *抽象类是不能被实例化的，任何一个类至少有一个抽象方法，那这个`类`就必须被声明为抽象的
	 *当子类继承抽象类的时候，就必须要实现父类的所有抽象方法(这些抽象方法访问控制绝对不能超过父类的)
	 *
	 */
	//抽象类是不能被实例的
	abstract class AbsClass
	{	
		//抽象方法 子类必须实例化 父类是不能实现的
		abstract protected function getVal(); 
		abstract protected function prefixValue($var);

		//普通方法(非抽象方法)
		public function foo()
		{
			echo $this->getVal() . "<br>";
		}
	}

	class FirClass extends AbsClass
	{
		protected function getVal()
		{
			return "i am the First value<br>";
		}

		public function prefixValue($prefix)
		{
			return "-$prefix-Fir";
		}
	}
	
	class SecClass extends AbsClass
	{
		public function getVal()
		{
			return "i am the Second value<br>";
		}

		public function prefixValue($prefix)
		{
			return "-$prefix-Sec";
		}
	}

	$class1 = new FirClass();
	$class1->foo();
	echo $class1->prefixValue('BAT_') . "<br>";

	$class2 = new SecClass();
	$class2->foo();
	echo $class2->prefixValue('BAT_') . "<br>";


	//-------------------------------------
	//关于定义抽象类的参数
	abstract class AbsClass1
	{
		abstract public function echoName($name);
	}

	class FirClass1 extends AbsClass1
	{
		public function echoName($name,$str = "hello")//此时$str必须要指定默认值
		{
			echo $name . "\t" . $str;
		}
	}

	$obj = new FirClass1();
	$obj->echoName("mcx","this is test");



