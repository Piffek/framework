<?php
namespace App\Middleware;


use \Closure;

interface LayerInterface {
	
	public function handle($object, Closure $next);
	
}