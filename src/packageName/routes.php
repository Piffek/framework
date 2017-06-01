<?php 


$router->groupForMiddleware(['middleware'=>'auth'], function($router) {


	$router->get('',  'IndexControllers', 'index');
	
	$router->get('login', 'LoginControllers', 'index');
	
	$router->get('produkt', 'ProductControllers', 'show');
	
	$router->post('produkt', 'ProductControllers', 'addProduct');
	
});
	
$router->groupForMiddleware(['middleware'=>'auth2'], function($router) {
	
	$router->get('/kubek',  'IndexControllers', 'index2');
});