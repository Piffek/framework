<?php

namespace App\Middleware;

use \Closure;

/**
 * 
 * Interface to handle layer
 */
interface LayerInterface 
{
	public function handle($object, Closure $next);	
}