<?php


namespace src\packageName\Controllers;


use app\Controller;

class LoginController extends Controller
{
	public function index(){
		echo $this->render('login.html.twig', array('imie' => $this->request['imie']));
		
	}
	
}
