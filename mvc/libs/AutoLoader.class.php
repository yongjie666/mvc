<?php

class AutoLoader{

	public function __construct(){
		spl_autoload_register(array($this,"load"));   //实例化 自动调用    // 使用命名空间  namespace     use  
	}

	public function load($className){
		#$className  形参   //  命名空间  use 后面的东西   
		$className = str_replace("\\", DS, $className);  //将斜杠 转换成适合  Windows 或者 linux  \/   兼容性    
		$className.='.class.php';   
		// echo $className.'</br>';
		try{
		if(file_exists($className)){
			include $className;
		}else{
			throw(new Exception('对不起，我们这里没有你说的这个mm'));
			//exit;
		}
	}catch(Exception $e){
		echo $e->getMessage();
		
		}
	}
}