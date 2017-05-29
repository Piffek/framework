<?php


namespace src\packageName\Controllers;


use app\BaseController;

class LoginController extends BaseController
{
	public function index(){
		echo $this->request['imie'];
		//require __DIR__ . '/../Resources/view/index.php';
		
	}
	
}
