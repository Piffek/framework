<?php

namespace App;

abstract class BaseController
{
	public function render($template, array $parameters){
	
		$loader = new \Twig_Loader_Filesystem( __DIR__ .'/../src/packageName/Resources/view');
	
		$twig = new \Twig_Environment($loader);
		
		return $twig->render($template, $parameters);
	
	}
	
}