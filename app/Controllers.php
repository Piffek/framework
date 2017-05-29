<?php
namespace App;

class Controllers extends BaseController
{
	protected $request;
	
	public function __construct($request){
		$this->request = $request;	
		
	}

}