<?php


namespace Src\packageName\Controllers;

use App\Controllers;

class ProductControllers extends Controllers
{
	public function show(){
		
		echo $this->request['id'];
		
		
	}
	
	public function addProduct(){
		
		echo $_POST['text'];
		
	}
	
}
