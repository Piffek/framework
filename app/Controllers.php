<?php
namespace App;

class Controllers extends BaseControllers
{
	protected $request;
	
	/**
	 * get request.
	 * @param unknown $request
	 */
	public function __construct($request)
	{
		$this->request = $request;	
		
	}

}