<?php
//require __DIR__ . '/../Resources/view/index.php';

namespace src\packageName\Controller;

use app\DefaultController;

class IndexController extends DefaultController
{
	public function index(){
		
		require __DIR__ . '/../Resources/view/index.php';
		
	}
	
}
