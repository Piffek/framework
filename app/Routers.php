<?php

namespace App;
use Src\packageName\Controllers;
use Closure;


class Routers
{
	protected $groupStack = [];
	protected $middlewareGroups = [];
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
	
	public function groupForMiddleware(array $param ,  Closure $callback){
		$middlewareGroups[] = $param;
		print_r($middlewareGroups);
		call_user_func($callback, $this);
		$this->updateGroupStack($param);
		
	}
	
	protected function updateGroupStack(array $attributes)
	{

		foreach($attributes as $at){
			$this->groupStack[] = $at;
		}
		$this->groupStack;
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