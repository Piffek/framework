<?php
//require __DIR__ . '/../Resources/view/index.php';

namespace src\packageName\Controller;

use app\DefaultController;
use src\packageName\Model\Framework;

class IndexController extends DefaultController
{
	public function index(){
		
		$framework = new Framework('framework');
		foreach($framework->getAll() as $row){
			echo $row['nazwa'];
		}
		//require __DIR__ . '/../Resources/view/index.php';
		
	}
	
}
