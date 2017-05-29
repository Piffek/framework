<?php
namespace app;

class BaseController
{
	protected $request;
	public function __construct($request){
		$this->request = $request;	
	}
}