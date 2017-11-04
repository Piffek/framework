<?php

namespace Src\packageName;

use App\Middleware\LayerInterface;
use \Closure;

class AuthMiddleware implements LayerInterface 
{
	public function handle($object, Closure $next)
	{
		return $next($object);

	}

}