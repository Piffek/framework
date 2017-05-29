<?php
//require __DIR__ . '/../Resources/view/index.php';

namespace Src\packageName\Controllers;

use Src\packageName\Models\Framework;
use App\Controllers;

class IndexController extends Controllers
{
	public function index(){
		
		$framework = new Framework('framework');
	
		echo $this->render('index.html.twig', array('framework' => $framework->getAll()));
		
	}
	
}
