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
		
		$req = new Requests();
		
		$className = '\\src\\packageName\\Controller\\' . $controller;
		$cont =  new $className($req->valueMethod());
		return $cont->$method();
	}
	
	public function post($url, $controller, $method){
		$req = new Requests();
		$className = '\\src\\packageName\\Controller\\' . $controller;
		$cont =  new $className($req->valueMethod());
		return $cont->$method();
		
	}

	

	
}