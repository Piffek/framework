<?php
namespace app;

class BaseController
{
	protected $request;
	public function __construct($request){
		$this->request = $request;	
		
		$this->loader = new \Twig_Loader_Filesystem( __DIR__ .'/../src/packageName/Resources/view');
		$this->twig = new \Twig_Environment($this->loader);
	}
}