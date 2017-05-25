<?php


namespace src\packageName\Controller;

use app\DefaultController;

class LoginController extends DefaultController
{
	public function index(){
		echo $this->request['imie'];
		//require __DIR__ . '/../Resources/view/index.php';
		
	}
	
}
