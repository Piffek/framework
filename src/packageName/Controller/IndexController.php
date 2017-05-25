<?php
//require __DIR__ . '/../Resources/view/index.php';

namespace src\packageName\Controller;

use app\DefaultController;

class IndexController extends DefaultController
{
	public function index(){
		echo $this->request['sad'];
		//require __DIR__ . '/../Resources/view/index.php';
		
	}
	
}
