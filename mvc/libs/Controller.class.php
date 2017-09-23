<?php

namespace libs;

class Controller {
	public $viewObject;

	public function __construct(){
		$this->viewObject = new View;
	}
	public function display($fileName=''){
		// 获取得到模板路径
			$c = Router::getInstance()->controller; //获取控制器
			$a = Router::getInstance()->action;   //获取方法

		if(empty($fileName)){  		//是否有默认文件

			
			$fileName = VIEWS.$c.DS.$a.'.html';   //默认当前控制器文件夹下方法.html
		}else{
			$fileName = VIEWS.$c.DS.$fileName.'.html'; 
		}
		
		$this->viewObject->display($fileName);  //文件百分百存在  
	}

	public function assign($data){
		$this->viewObject->assign($data);
	}



}