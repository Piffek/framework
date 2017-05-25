<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


use app\Requests;
use app\Router;

require 'app/bootstrap.php';


Router::load(__DIR__ . '/src/packageName/routes.php');