<?php

namespace App;
use App\ServiceProvider\TwigServiceProvider;

class BaseControllers
{
    protected $config;
    protected $view;

    public function __construct(){
        $this->loadConfig();
    }

	public function render($template, array $parameters){
		  $twig = new TwigServiceProvider($this->loadConfig()['twig']);
		  return $twig->provide()->render($template, $parameters);
	}

	public function loadConfig(){
		return $this->config = include __DIR__ . '/../config.php';
	}


	
}