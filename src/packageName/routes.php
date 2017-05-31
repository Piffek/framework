<?php 


$router->group(['middleware' => 'auth'], function($router) {


	$router->get('',  'IndexControllers', 'index');
	
	$router->get('login', 'LoginControllers', 'index');
	
	$router->get('produkt', 'ProductControllers', 'show');
	
	$router->post('produkt', 'ProductControllers', 'addProduct');
	
});
