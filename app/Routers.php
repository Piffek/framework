<?php

namespace app;
use src\packageName\Controllers;
use app\Factory\RequestsFactory;

class Routers implements RequestsFactory
{
	
	protected $router = [];
	
	public static function load($fileWithRoutes){
		
		$router = new static;
		
		require $fileWithRoutes;
		
		return $router;
		
	}
	
	public function get($url, $controller, $method){

			if($url === Requests::url() && 'GET' === Requests::urlMethod()){
				
				$this->ifMethodIsChecked($controller, $method);
			}
	}

	
	public function post($url, $controller, $method){

			if($url === Requests::url() && 'POST' === Requests::urlMethod()){
				
				$this->ifMethodIsChecked($controller, $method);
			}
		
		
	}
	
	public function ifMethodIsChecked($controller, $method){
		
		$className = '\\src\\packageName\\Controllers\\' . $controller;
		$cont =  new $className(Requests::spreadURLToKeyAndValue());
		$cont->$method();
		
	}

	
	

	
}