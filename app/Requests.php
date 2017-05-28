<?php

namespace app;

class Requests{
	
	public $param = array();
	
	public static function url(){
		
		$url =  trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
		$arrWithUrl = explode('/', $url);
		return $arrWithUrl[0];
	}
	
	
	public static function spreadURLToKeyAndValue(){
	
		$path = trim($_SERVER['REQUEST_URI'], '/');
		@list($param) = explode('/',$path, 1);
		if($param){
	
			$param = explode('/', $path);
				
			$key = array_search(self::url(), $param);
			unset($param[$key]);
				
			$parameters = array();
			
			foreach(array_chunk($param,2) as $met){
				$parameters[$met[0]] = $met[1];
				
			}
			return $parameters;
		}
	
	}
	
	
	public static function urlMethod(){
	
		return $_SERVER['REQUEST_METHOD'];
	
	}
	
	
}