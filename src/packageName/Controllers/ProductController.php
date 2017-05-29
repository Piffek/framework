<?php


namespace src\packageName\Controller;

use app\Controller;

class ProductController extends Controller
{
	public function show(){
		
		echo $this->request['id'];
		
		
	}
	
	public function addProduct(){
		
		echo $_POST['text'];
		
	}
	
}
