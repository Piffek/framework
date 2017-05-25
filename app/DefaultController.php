<?php
namespace app;

class DefaultController
{
	protected $request;
	public function __construct($request){
		$this->request = $request;	
	}
}