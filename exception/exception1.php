<?php
/**
 * exception(类似于os中的中断异常)
 *
 * 在PHP代码中所产生的异常可被throw语句抛出并被catch语句捕获，可以有多个catch来捕获多个类型的异常，每个try至少要对应一个catch，当找不到所对应的catch 会找最后一个catch来捕获
 */


/*扩展 PHP内置的异常处理类*/
/*自定义一个异常类        */
class MyException extends Exception
{
	//构造函数
	public function __construct($mes, $code = 0)
	{	
		//保证所有变量都能被正确赋值
		parent::__construct($mes,$code);
	}

	//类输出
	public function __toString()
	{
		return __CLASS__ . ":[{$this->code}]: {$this->message}<br>";
	}

	public function customFunction()
	{
		echo "this is a custom exception function <br>";
	}
}


/**
 * 测试异常处理机制类
 */
class TestException
{
	public $var;

	const THR_NONE = 0;
	const THR_CUSTOM = 1;
	const THR_DEFAULT = 2;

	public function __construct($a_val = self::THR_NONE)
	{	
		switch ($a_val) {
			case self::THR_CUSTOM:
					//自定义异常
					throw new MyException("1 is an right val",5);
				break;
			case self::THR_DEFAULT:
					//默认异常
					throw new Exception("2 is an wrong val",6);
				break;
			default:
				//没有异常的话
				$this->var = $a_val;
				break;
		}

	} 
}

// example 1
try {
	$obj = new TestException(TestException::THR_CUSTOM);
} catch (MyException $e){ //捕获异常
	echo "Caught my exception:<br>",$e;
	$e->customFunction();
} catch(Exception $e) {	//默认异常 被忽略
	echo "caught default exception<br>",$e;
}

@var_dump($obj);
echo "<br>";


// example 2
try {
	$obj = new TestException(TestException::THR_DEFAULT);
} catch (MyException $e) {	//忽略
	echo "Caught my exception:<br>",$e;
	$e->customFunction();
} catch (Exception $e) {	//被捕获
	echo "caught default exception<br>",$e;
}

@var_dump($obj);
echo "<br>";

// example 3
try {
	$obj = new TestException(TestException::THR_CUSTOM);
} catch (MyException $e) {
	//捕获异常
	echo "Defalut Exception caught",$e;
}
var_dump($obj);
echo "<br>";

// example 4
try {
	$obj = new TestException();
} catch (Exception $e) {
	//任何异常都会被忽略
	echo "Defalut Exception caught",$e;
}
var_dump($obj);