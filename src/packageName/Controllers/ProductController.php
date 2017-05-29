<?php


namespace Src\packageName\Controller;

use App\Controllers;

class ProductController extends Controllers
{
	public function show(){
		
		echo $this->request['id'];
		
		
	}
	
	public function addProduct(){
		
		echo $_POST['text'];
		
	}
	
}
