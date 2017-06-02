<?php


namespace Src\packageName\Controllers;

use App\Controllers;
use Src\packageName\Models\Framework;

class ProductControllers extends Controllers
{
	public function show(){
		
		echo $this->request['id'];
		
		
	}
	
	public function addProduct(){
		//test
		$framework = new Framework('framework');
		$framework->insert([
			'text' => $_POST['text'],
			'nazwa' => 'nazwa',
		]);
		
	}
	
}
