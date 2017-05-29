<?php

namespace App;
use Src\packageName\Controllers;


class Routers
{
	
	protected $router = [];
	
	public static function load($fileWithRoutes){
		
		$router = new static;
		
		require $fileWithRoutes;
		
		return $router;
		
	}
	
	public function get($url, $controller, $method){

			if($url === Requests::url() && 'GET' === Requests::urlMethod()){
				
				return $this->ifMethodIsChecked($controller, $method);
			}
	}

	
	public function post($url, $controller, $method){

			if($url === Requests::url() && 'POST' === Requests::urlMethod()){
				
				return $this->ifMethodIsChecked($controller, $method);
			}
		
		
	}
	
	public function ifMethodIsChecked($controller, $method){
		
		$className = '\\src\\packageName\\Controllers\\' . $controller;
		
		if(!method_exists($className, $method)){
			
			throw new \Exception('in '.$controller.' not appear '.$method.' method');
			
		}
		$cont =  new $className(Requests::spreadURLToKeyAndValue());
		$cont->$method();
		
	}

	
	

	
}