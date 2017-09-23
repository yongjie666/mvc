<?php
namespace controllers;
use libs\Controller;
class Demo extends Controller{

	public function show(){
		var_dump($_GET);
	}


}