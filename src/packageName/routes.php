<?php 



$router->get('', 'IndexController', 'index');

$router->get('login', 'LoginController', 'index');

$router->get('produkt', 'ProductController', 'show');

$router->post('produkt', 'ProductController', 'addProduct');