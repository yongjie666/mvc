<?php

namespace libs;

class View {

	// 属性
	public $templateFile ; // 默认为当前控制器文件夹下方法名.html

	public $data;

 	public function assign($item){

 			$this->data = $item;
 		
	}


	public function display($templateFile=''){
		$data = $this->data;  
		extract($data);   //打散函数  
		// 找到哪个控制器方法
		// 将文件包含进来
		$fileContent = file_get_contents($templateFile);
		$file = $this->parseTemplate($fileContent);
		include $file;
	}


	public function parseTemplate($content){
		$filename = md5($content);  //文件里面的内容生成MD5 散列值 保证缓存文件唯一
		$filename = RUNTIME.$filename.'.php';
		if(!file_exists($filename)){

			// 解析文件
			// 其他规则放到前面 
			$content = preg_replace('#\{foreach#', '<?php foreach', $content);  //替换foreach 首  
			$content = preg_replace('#\{endforeach\}#', '<?php endforeach; ?>', $content);  //替换foreach尾
			$content = preg_replace('#\{#iU','<?= ', $content); //大括号替换为php首解析 
			$content = preg_replace('#\}#iU','?>', $content);   //大括号替换为php尾解析

			file_put_contents($filename,$content);
		}
		return $filename;
	}


}