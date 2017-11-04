<?php

namespace App\ServiceProvider;

class TwigServiceProvider extends ServiceProviders
{
    /**
     * Add twig to controller.
     * {@inheritDoc}
     * @see \App\ServiceProvider\ServiceProviders::provide()
     */
	public function provide()
	{
		$loader = new \Twig_Loader_Filesystem($this->config['path']);
	
		return new \Twig_Environment($loader);
	}
}