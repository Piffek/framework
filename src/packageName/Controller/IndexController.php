<?php
//require __DIR__ . '/../Resources/view/index.php';

namespace src\packageName\Controller;

use app\DefaultController;
use Framework;

class IndexController extends DefaultController
{
	public function index(){
		
		$framework = new \src\packageName\Model\Framework();
		foreach($framework->getAll() as $row){
			echo $row['nazwa'];
		}
		//require __DIR__ . '/../Resources/view/index.php';
		
	}
	
}
