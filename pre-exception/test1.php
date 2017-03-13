<?php 
/**
 * 	预处理异常
 * Exception 
 * {
 * 		//属性
 * 		protected string $message;
 * 		protected int $code;
 * 		protected string $file;
 * 		protected int $line;
 *
 * 		//方法
 * 	 	public __construct()
 * 	 	final public string  getMessage()
 * 	 	final public Exception getPrevious()
 * 	 	final public int getCode()
 * 	 	final public string getFile()
 * 	 	final public int getLine()
 * 	 	final public array getTrace() //获取异常追踪信息
 * 	 	final public string getTraceAsString()
 * 	 	public string __toString()    //将对象转为字符串
 * 	 	final private void __clone()
 * 
 * }	
 */
/*   __construct(string $message,$code)   */

/* 	 getMessage()   */


try {
	throw new Exception("find error",100);
} catch (Exception $e) {
	echo $e->getMessage();	
	echo "<br>";
	var_dump($e->getCode());
	echo $e->getFile();
	var_dump($e->getTrace());
}

function test()
{
	throw new Exception();
}

try {
	test();
} catch (Exception $e) {
	var_dump($e->getTrace());
	echo $e->getTraceAsString();
	// var_dump($e);
	echo $e;
}