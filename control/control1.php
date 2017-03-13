<?php 
	/**
	 *	流程控制
	 * if else
	 * else if 
	 * while
	 * do-while
	 * for 
	 * foreach
	 * break
	 * continue
	 * switch 
	 * declare
	 * return
	 * require
	 * include 
	 * require_once 
	 * include_once
	 * goto(bad)
	 */
/*------------ 流程控制 ------------*/	
	

	/*  declare   */
	//----------------------------------
	//declare(ticks=1);//每执行一条指令(ticks=1)就执行一次的register_tick_function注册的函数

	// A function called on each tick event
	function tick_handler()
	{
	    echo "tick_handler() called<br>";
	}

	register_tick_function('tick_handler');

	$a = 1;

	if ($a > 0) {
	    $a += 2;
	    print($a);
	} 

	/*   include   */
		/**
		 * 被包含文件先按参数给出的路径寻找，如果没有给出目录（只有文件名）时则按照 include_path 指定的目录寻找。
		 * 如果在 include_path 下没找到该文件则 include 最后才在调用脚本文件所在的目录和当前工作目录下寻找。
		 * 如果最后仍未找到文件则 include 结构会发出一条警告；这一点和 require 不同，后者会发出一个致命错误。
		 */
		
	/*   require   */
		/**
		 * 基本同include 只是错误处理方式不一样
		 * include会发出警告，而require会终止代码继续执行
		 */
	include "test.php";
	echo $my_val;

	/*   include_once   */
		/**
		 * 和include 一样 只是包含文件只会被包含一次
		 */

	/*   require_once   */
		/**
		 * 和require 一样 只是包含文件只会被包含一次
		 */

