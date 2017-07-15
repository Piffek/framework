<?php

namespace App\ServiceProvider;

class TwigServiceProvider extends ServiceProviders
{

	public function provide(){
		//return print_r($this->config['twig']['path']);
		$loader = new \Twig_Loader_Filesystem($this->config['path']);
	
		return new \Twig_Environment($loader);
		
	}
}