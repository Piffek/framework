<?php 



$router->get('', 'IndexController', 'index');

$router->get('login', 'LoginController', 'indsfdex');

$router->get('produkt', 'ProductController', 'show');

$router->post('produkt', 'ProductController', 'addProduct');