<?php


namespace src\packageName\Controller;

use app\BaseController;

class ProductController extends BaseController
{
	public function show(){
		
		echo $this->request['id'];
		
		
	}
	
	public function addProduct(){
		
		echo $_POST['text'];
		
	}
	
}
