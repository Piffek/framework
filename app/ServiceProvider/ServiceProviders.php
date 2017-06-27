<?php

namespace App\ServiceProvider;

abstract class ServiceProviders
{
	protected $config;

	public function __construct(array $config){
		$this->config = $config;
	}

	abstract public function provide();
}