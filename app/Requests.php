<?php

namespace App;

class Requests
{
	public $param = array();
	
	/**
	 * get first param from url.
	 * 
	 * @return mixed
	 */
	public static function getFirstPartOfUrl()
	{
		$url =  trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
		$arrWithUrl = explode('/', $url);
		return $arrWithUrl[0];
	}
	
	/**
	 * group url to key and value.
	 * 
	 * @return array
	 */
	public static function groupURLToKeyAndValueAvailableInControllers()
	{
		$path = trim($_SERVER['REQUEST_URI'], '/');
		@list($param) = explode('/',$path, 1);
		if($param){
			$param = explode('/', $path);
			$key = array_search(self::getFirstPartOfUrl(), $param);
			unset($param[$key]);
			$parameters = array();
			foreach(array_chunk($param,2) as $met){
				$parameters[$met[0]] = $met[1];
			}
			
			return $parameters;
		}
	}
	
	/**
	 * return param from url as method from controller.
	 * 
	 * @return unknown
	 */
	public static function getUrlMethod()
	{
		return $_SERVER['REQUEST_METHOD'];
	
	}
}