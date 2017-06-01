<?php

namespace App;
use Src\packageName\Controllers;
use Closure;


class Routers
{

	public $router = [];
	public $groups = [];

	
	public static function load($fileWithRoutes){
		
		$router = new static;
		
		require $fileWithRoutes;
		
		return $router;
		
	}
	
	public function get($url, $controller, $method){
	
			if($url === Requests::getFirstPartOfUrl() && 'GET' === Requests::getUrlMethod()){
				
				print_r($this->groups);
				
				return $this->ifMethodIsChecked($controller, $method);
			}
	}

	
	public function post($url, $controller, $method){

			if($url === Requests::getFirstPartOfUrl() && 'POST' === Requests::getUrlMethod()){
				
				return $this->ifMethodIsChecked($controller, $method);
			}
		
		
	}
	


	public function group(array $param, Closure $callback){
		
		$this->stackGroup($param);
		
		call_user_func($callback, $this);
		
		array_pop($this->groups);
	}
	
	public function stackGroup(array $attr){
		
		$this->groups[] = $attr;
		
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