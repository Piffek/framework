<?php
//require __DIR__ . '/../Resources/view/index.php';

namespace src\packageName\Controllers;

use app\DefaultController;
use src\packageName\Models\Framework;

class IndexController extends DefaultController
{
	public function index(){
		
		$framework = new Framework('framework');
		print_r($framework->getAll());
		//require __DIR__ . '/../Resources/view/index.php';
		
	}
	
}
