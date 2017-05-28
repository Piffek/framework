<?php 

namespace app\Factory;

interface RequestsFactory{
	
	public function get($url, $controller, $method);
	
	public function post($url, $controller, $method);
	
}