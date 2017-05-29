<?php


namespace Src\packageName\Controllers;


use App\Controllers;

class LoginControllers extends Controllers
{
	public function index(){
		echo $this->render('login.html.twig', array('imie' => $this->request['imie']));
		
	}
	
}
