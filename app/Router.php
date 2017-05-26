<?php

namespace app;
use Exception;
use src\packageName\Controller;

class Router{
	
	protected $router = [];
	
	public static function load($fileWithRoutes){
		
		$router = new static;
		
		require $fileWithRoutes;
		
		return $router;
		
	}
	
	public function get($url, $controller, $method){
		try{
			if($url === Requests::url() && 'GET' === Requests::urlMethod()){
				$className = '\\src\\packageName\\Controller\\' . $controller;
				$cont =  new $className(Requests::valueMethod());
				$cont->$method();
			}
		}catch (\Exception $e){
			throw new \Exception($e->getMessage());
		}
	}

	
	public function post($url, $controller, $method){

		try{
			if($url === Requests::url() && 'POST' === Requests::urlMethod()){
				$className = '\\src\\packageName\\Controller\\' . $controller;
				$cont =  new $className(Requests::valueMethod());
				$cont->$method();
			}
		}catch (\Exception $e){
			throw new \Exception($e->getMessage());
		}
		
	}

	
	

	
}