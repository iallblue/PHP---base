<?php
// namespace Me {
	/**
	 * 类与对象 OOP 
	 * 类常量 自动加载函数 析构函数和构造函数 访问控制
	 * 对象继承 范围解析操作符:: static关键字 抽象类
	 * 对象接口 traits 重载 遍历对象 魔术方法 Final关键字
	 * 对象复制 对象比较 类型约束 后期静态绑定 对象和引用
	 * 对象序列化  
	 */
	

/*------------ 基本定义 ------------*/
	/**
	 * 以class开头 后面是类名 后面是{} 
	 * 伪变量 $this
	 * new 创建对象
	 * extends 继承 PHP是单继承 不能多继承
	 * :: class 使用className:: class 可以获取一个字符串 包含了类ClassName的完全限定名称
	 */
	class A{

		function foo()
		{
			echo "hello world<br>";
		}
	}
	A::foo();//可以直接调用不需要实例
	// $a_obj = new A();
	// $a_obj->foo();
	
	/*   继承   */
	class baseClass
	{
		function disp()
		{
			echo "this is display in baseClass<br>";
		}
	}
	class sonClass extends baseClass
	{
		function disp()
		{	
			//调用父类的
			parent::disp();
			echo "this is display in sonClass<br>";
		}
	}
	$son = new sonClass();
	$son->disp();

	/*   ::class   */

		class MyClass
		{

		}
		echo MyClass::class; //获得包含类的完全限定名称

/*------------ 基本属性 ------------*/
	/**
	 * 被 public private protected 修饰
	 * 在类成员的方法里面 可以用->(对象修饰符)：$this->属性来访问非静态属性
	 * 静态属性用::来进行访问 self::属性(在类内) 
	 */
	
/*------------ 类常量 ------------*/
	/**
	 * 在类内始终保持不变的值定义为常量，在定义和使用常量的时候不需要使用$
	 */
	class Test
	{
		const con_str = "<br>hello world<br>";
		
		public function showCon()
		{
			echo self::con_str;
		}
	}

	echo Test::con_str;
	$class = new Test();
	$class->showCon();
	echo $class::con_str;


/*------------ 自动加载对象 ------------*/
	/**
	 * __autoload() 被抛弃
	 * spl_autoload_register() 建议使用
	 */
	function __autoload($classname)
	{
		//require_once $classname . ".php";
		// require_once "./testClass.php";
		// 加载异常
		throw new Exception("unable to load $classname");
		
	}

	// $obj = new testClass();
	// $obj->foo1();

	try {
		$new_obj = new WrongClass();
	} catch (Exception $e) {
		echo $e->getMessage() . "<br>";
	}	



	/*   自动加载异常   */

//} //end namespace

