<?php

namespace App;

use App\ServiceProvider\TwigServiceProvider;
use Dotenv\Dotenv;

class BaseControllers
{
    protected $config;
    protected $view;

    public function __construct()
    {
        $this->loadConfig();
        $this->loadEnv();
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
	
	/**
	 * load env.
	 */
	public function loadEnv()
	{
	    $dotenv = new Dotenv($this->loadConfig()['env']['path']);
	    $dotenv->load();
	}
}