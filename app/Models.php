<?php

namespace app;
require_once 'config.php';
use \PDO;

class Models
{
	public $table;
	public $pdo;
	public function __construct($table){
		$this->table = $table;
		try{
			$this->pdo = new PDO('mysql:host='.DATABASE_HOST .';dbname='.DATABASE_NAME.'', ''.DATABASE_USER.'', ''.DATABASE_PASS.'', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")) or die();
			echo("");
	
		}
		catch(PDOException $e){
			echo'Błąd :' . $e->getMessage();
		}
	}
	
	public function getAll(){
		$query = $this->pdo->prepare("SELECT * FROM ".$this->table."");
		$query->execute();
	
		if (isset($query)) {
			return $query;
		} else {
			return null;
		}
	}
	
	public function getWhere($what,$var){
		$query = $this->pdo->prepare("SELECT * FROM ".$this->table." WHERE :".$what." = ".$what."");
		$query->bindParam(':lang', $var);
		$query->execute();
		if (isset($query)) {
			return $query;
		} else {
			return null;
		}
	}
}