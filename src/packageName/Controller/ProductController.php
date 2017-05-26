<?php


namespace src\packageName\Controller;

use app\DefaultController;

class ProductController extends DefaultController
{
	public function show(){
		
		echo $this->request['id'];
		
		
	}
	
	public function addProduct(){
		
		echo $_POST['text'];
		
	}
	
}
