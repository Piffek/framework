<?php

namespace App;
use Src\packageName\Controllers;
use Closure;


class Routers
{
	
	protected $router = [];
	
	public static function load($fileWithRoutes){
		
		$router = new static;
		
		require $fileWithRoutes;
		
		return $router;
		
	}
	
	public function get($url, $controller, $method){

			if($url === Requests::getFirstPartOfUrl() && 'GET' === Requests::getUrlMethod()){
				
				return $this->ifMethodIsChecked($controller, $method);
			}
	}

	
	public function post($url, $controller, $method){

			if($url === Requests::getFirstPartOfUrl() && 'POST' === Requests::getUrlMethod()){
				
				return $this->ifMethodIsChecked($controller, $method);
			}
		
		
	}
	
	public function group(array $array,  $callback){
		
		call_user_func($callback, new Routers);
		
	}
	
	public function ifMethodIsChecked($controller, $method){
		
		$className = '\\Src\\packageName\\Controllers\\' . $controller;
		
		if(!method_exists($className, $method)){
			
			throw new \Exception('in '.$controller.' not appear '.$method.' method');
			
		}
		$cont =  new $className(Requests::groupURLToKeyAndValueAvailableInControllers());
		$cont->$method();
		
	}

	
	

	
}