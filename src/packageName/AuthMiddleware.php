<?php

namespace Src\packageName;
use App\Middleware\LayerInterface;
use \Closure;

class AuthMiddleware implements LayerInterface {

	public function handle($object, Closure $next){
		//change parameters
		$_POST['text'] = '23443';
		
		//next middleware
		return $next($object);

	}

}