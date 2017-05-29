<?php


namespace src\packageName\Controllers;


use app\Controller;

class LoginController extends Controller
{
	public function index(){
		echo $this->request['imie'];
		//require __DIR__ . '/../Resources/view/index.php';
		
	}
	
}
