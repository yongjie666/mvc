<?php

namespace libs;

class  Configure {

	public static $config;
	public static function getConfigs(){
		self::$config = require APP_PATH.DS.'config'.DS."web.php";
		return self::$config;
	}
	public static function getDb(){
		return self::$config['db'];
	}



}