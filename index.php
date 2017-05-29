<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


use App\Routers;

require 'bootstrap.php';


Routers::load(__DIR__ . '/src/packageName/routes.php');