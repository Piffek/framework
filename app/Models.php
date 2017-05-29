<?php

namespace App;
use \PDO;

class Models
{

	public $table;
	public $pdo;
	public function __construct($table){
		$this->table = $table;
		try{
			$config = require 'config.php';
			$this->pdo = new PDO('mysql:host='.$config['database']['host'] .';dbname='.$config['database']['name'].'', ''.$config['database']['user'].'', ''.$config['database']['password'].'', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")) or die();
	
		}
		catch(PDOException $e){
			echo'Błąd :' . $e->getMessage();
		}
	}
	
	public function getAll(){
		$query = $this->pdo->prepare("SELECT * FROM ".$this->table."");
		$query->execute();
	
		return $query->fetchAll(PDO::FETCH_CLASS);
	}
	
	
}