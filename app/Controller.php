<?php
namespace app;

class Controller extends BaseController
{
	protected $request;
	
	public function __construct($request){
		$this->request = $request;	
		
	}

}