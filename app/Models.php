<?php

namespace App;
use \PDO;

class Models
{

	public $table;
	public $pdo;
	public function __construct($table){
		
		$this->table = $table;
	}
	
	public function connect(){
		
		$config = require 'config.php';
		$pdo = new PDO('mysql:host='.$config['database']['host'] .';dbname='.$config['database']['name'].'', ''.$config['database']['user'].'', ''.$config['database']['password'].'', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")) or die();
		return $pdo;
		
	}
	
	public function getAll(){
		
		$query = $this->connect()->prepare("SELECT * FROM ".$this->table."");
		$query->execute();
	
		return $query->fetchAll(PDO::FETCH_CLASS);
	}
	
	
}