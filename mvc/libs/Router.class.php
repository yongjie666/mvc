<?php
namespace libs;

class Router {
	public static $instance = null;     //实例化后的资源存储在这

	private $controllerNamespace = '\controllers\\';   // 默认控制器的位置  也就是文件夹
	//private $controllerNamespace = '';
	public $controller='Index';    //默认的控制器
	public $action='index';		//默认的方法	

	private function __construct(){
		
		if(isset($_SERVER['PATH_INFO']) && !empty($_SERVER['PATH_INFO'])){
			$pathinfo = $_SERVER['PATH_INFO']; //获取地址栏inndex.php 后面的详细路径
		
			$arr_path = explode('/',$pathinfo);

			if(isset($arr_path[1]) && !empty($arr_path[1])) { //index.php 后面存在控制器名称 为下标为一的参数
				$this->controller = $arr_path[1];
			}
			if(isset($arr_path[2]) && !empty($arr_path[2]) ) {//index.php 后面存在方法名称 为下标为二的参数
				$this->action = $arr_path[2];
			}
			// 参数怎么获取
			for($i=3;$i<count($arr_path);$i+=2){  //一个参数是下标  一个是值
				if(isset($arr_path[$i])){
					$_GET[$arr_path[$i]] = isset($arr_path[$i+1]) ? $arr_path[$i+1] : '';
				}
			}
		}
	}

	public static function getInstance(){    //单利模式实现 
		if(!self::$instance){			//是否实例化
			self::$instance = new self;   // 第一个人实例化  
		}
		return self::$instance;  
	}

	public function getCon(){      //获取 控制器
		if(isset($_GET['c']) && !empty($_GET['c'])){    // c 参数 不能为空 同时 要存在 
			$this->controller = $_GET['c'];
		}
		return $this->controllerNamespace.$this->controller;  // 返回 控制器的位置  是可以实例化的；
	}

	public function getAc(){     //获取方法
		if(isset($_GET['c_a']) && !empty($_GET['c_a'])){
			$this->action = $_GET['c_a'];
		}
		return $this->action;
	}

}