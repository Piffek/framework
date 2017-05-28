<?php

namespace app;
use Exception;
use src\packageName\Controller;
use app\Factory\RequestsFactory;

class Router implements RequestsFactory
{
	
	protected $router = [];
	
	public static function load($fileWithRoutes){
		
		$router = new static;
		
		require $fileWithRoutes;
		
		return $router;
		
	}
	
	public function get($url, $controller, $method){

			if($url === Requests::url() && 'GET' === Requests::urlMethod()){
				$className = '\\src\\packageName\\Controller\\' . $controller;
				$cont =  new $className(Requests::spreadURLToKeyAndValue());
				$cont->$method();
			}
	}

	
	public function post($url, $controller, $method){

			if($url === Requests::url() && 'POST' === Requests::urlMethod()){
				$className = '\\src\\packageName\\Controller\\' . $controller;
				$cont =  new $className(Requests::spreadURLToKeyAndValue());
				$cont->$method();
			}
		
		
	}

	
	

	
}