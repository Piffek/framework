<?php 





$router->group(['middleware'=>'auth'], function($router){

	$router->get('',  'IndexControllers', 'index');
	
	$router->get('produkt', 'ProductControllers', 'show');
	
	$router->post('produkt', 'ProductControllers', 'addProduct');
	
});


$router->group(['middleware'=>'auth4'], function($router){

	$router->get('login2', 'LoginControllers', 'index');
});



$router->group(['middleware'=>'auth2'], function($router){

	$router->get('login', 'LoginControllers', 'index');

});

