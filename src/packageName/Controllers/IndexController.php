<?php
//require __DIR__ . '/../Resources/view/index.php';

namespace src\packageName\Controllers;

use src\packageName\Models\Framework;
use app\BaseController;

class IndexController extends BaseController
{
	public function index(){
		
		$framework = new Framework('framework');
		print_r($framework->getAll());
		//require __DIR__ . '/../Resources/view/index.php';
		
	}
	
}
