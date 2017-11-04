<?php

namespace App;

use App\ServiceProvider\TwigServiceProvider;

class BaseControllers
{
    protected $config;
    protected $view;

    public function __construct()
    {
        $this->loadConfig();
    }

    /**
     * Render twig template.
     * 
     * @param string $template
     * @param array $parameters
     * @return unknown
     */
	public function render(string $template, array $parameters)
	{
		  $twig = new TwigServiceProvider($this->loadConfig()['twig']);
		  return $twig->provide()->render($template, $parameters);
	}

	/**
	 * load config file.
	 * @return unknown
	 */
	public function loadConfig()
	{
		return $this->config = include __DIR__ . '/../config.php';
	}


	
}