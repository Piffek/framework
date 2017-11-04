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

	/**
	 * Load router.
	 *
	 * @param unknown $fileWithRoutes file with router
	 * @return \App\Router
	 */
	
	public static function load(string $fileWithRoutes)
	{
		$router = new static;
		require $fileWithRoutes;
		
		return $router;
		
	}
	
	/**
	 *
	 * Make get request.
	 *
	 * @param string $url        name of URL.
	 * @param string $controller name of Controller.
	 * @param string $method     name of Method.
	 */
	public function get(string $url, string $controller, string $method)
	{
		if($url === Requests::getFirstPartOfUrl() && 'GET' === Requests::getUrlMethod()){
			return $this->ifMethodIsChecked($controller, $method);
		}
	}

	
	/**
	 *
	 * Make post request.
	 *
	 * @param string $url        name of URL.
	 * @param string $controller name of Controller.
	 * @param string $method     name of Method.
	 */
	public function post($url, $controller, $method)
	{
		if($url === Requests::getFirstPartOfUrl() && 'POST' === Requests::getUrlMethod()){
			return $this->ifMethodIsChecked($controller, $method);
		}
	}
	

    /**
     * Group function stack middleware name and add this to $group array.
     * 
     * @param Closure $callback method of group.
     * @param array $param - array with middleware name.
     */
	public function group(array $param, Closure $callback)
	{
		$this->stackGroup($param);
		
		//trigger method get or post.
		call_user_func($callback, $this);
		array_pop($this->groups);
	}
	
	
	/**
	 * add middleware name to array.
	 * 
	 * @param array $middlewareName name of middleware
	 * @return array
	 */
	public function stackGroup(array $middlewareName)
	{
	    return $this->groups[] = $middlewareName;
		
	}
	

	/**
	 * check method if exists.
	 * 
	 * @param string $controller
	 * @param string $method
	 * @throws \Exception
	 * @return unknown
	 */
	public function ifMethodIsChecked(string $controller, string $method)
	{
		$className = '\\Src\\packageName\\Controllers\\' . $controller;
		if(!method_exists($className, $method)){
		    $error = 'in %s not appear %s method';
		    throw new \Exception(sprintf($error, $controller, $method));
		}
		$this->runMiddleware($this, new Middleware());
		$cont =  new $className(Requests::groupURLToKeyAndValueAvailableInControllers());
		
		return $cont->$method();
		
	}
	
	/**
	 * run middleware.
	 * 
	 * @param Routers $routers
	 * @param Middleware $onion
	 * @throws \Exception
	 */
	public function runMiddleware(Routers $routers, Middleware $onion)
	{
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