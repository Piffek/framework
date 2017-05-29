<?php
//require __DIR__ . '/../Resources/view/index.php';

namespace src\packageName\Controllers;

use src\packageName\Models\Framework;
use app\Controller;

class IndexController extends Controller
{
	public function index(){
		
		$framework = new Framework('framework');
	
		echo $this->render('index.html.twig', array('framework' => $framework->getAll()));
		
	}
	
}
