<?php

namespace app;

abstract class BaseController
{
	public function twig(){
	
		$loader = new \Twig_Loader_Filesystem( __DIR__ .'/../src/packageName/Resources/view');
	
		return new \Twig_Environment($loader);
	
	}
	
}