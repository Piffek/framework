<?php
namespace App;

class Controllers extends BaseControllers
{
	protected $request;
	
	public function __construct($request){
		$this->request = $request;	
		
	}

}