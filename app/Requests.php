<?php

namespace app;

class Requests{


	public function valueMethod(){
	
		$path = trim($_SERVER['REQUEST_URI'], '/');
		@list($action, $param) = explode('/',$path, 2);
		if($param){
			
			$param = explode('/', $path);
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