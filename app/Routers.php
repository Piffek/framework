<?php

namespace App;
use Src\packageName\Controllers;
use Closure;
use App\Routers;
use App\Middleware\Middleware;



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
			    
				return $this->ifMethodIsChecked($controller, $method);

			}
	}

	
	public function post($url, $controller, $method){

			if($url === Requests::getFirstPartOfUrl() && 'POST' === Requests::getUrlMethod()){
				
				return $this->ifMethodIsChecked($controller, $method);
			}
		
		
	}
	

    /*
     * Group function stack middleware name and add this to $group array.
     * call_user_func - trigger method get or post.
     * param $callback - method of group.
     * param $param - array with middleware name.
     */
	public function group(array $param, Closure $callback){
		
		$this->stackGroup($param);
		
		call_user_func($callback, $this);
		
		array_pop($this->groups);
	}
	
	
	/*
	 * add middleware name to array.
	 */
	public function stackGroup(array $middlewareName){
		
	    return $this->groups[] = $middlewareName;
		
	}
	

	
	public function ifMethodIsChecked($controller, $method){
		
		$className = '\\Src\\packageName\\Controllers\\' . $controller;
		
		if(!method_exists($className, $method)){
		    $error = 'in %s not appear %s method';
		    throw new \Exception(sprintf($error, $controller, $method));
			
		}
		
		$this->runMiddleware($this, new Middleware());
			
		$cont =  new $className(Requests::groupURLToKeyAndValueAvailableInControllers());
		return $cont->$method();
		
	}
	
	public function runMiddleware(Routers $routers, Middleware $onion){
		
		$middleware = '\\Src\\packageName\\' . $this->groups[0]['middleware'] . 'Middleware';
		
		if(class_exists($middleware)){
			
			$end = $onion->layer([
					
					new $middleware(),
					
			])->handle($routers, function($routers){});
			
			}else{
				throw new \Exception('This middleware not exists');
			}

		
	}

	
	

	
}