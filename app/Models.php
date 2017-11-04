<?php

namespace App;

use \PDO;

class Models
{
	public $table;
	public $pdo;
	
	public function __construct($table)
	{
		$this->table = $table;
	}
	
	/**
	 * connect to database.
	 * 
	 * @return \PDO
	 */
	public function connect()
	{
		$config = include __DIR__ . '/../config.php';
		$pdo = new PDO('mysql:host='.$config['database']['host'] .';dbname='.$config['database']['name'].'', ''.$config['database']['user'].'', ''.$config['database']['password'], $config['database']['options']);
		return $pdo;
	}
	
	/**
	 * get all parameters from database.
	 * 
	 * @return array
	 */
	public function getAll()
	{
		$sql = sprintf('select * from %s',
			$this->table
		);
		$query = $this->connect()->prepare($sql);
		$query->execute();
	
		return $query->fetchAll(PDO::FETCH_CLASS);
	}
	
	/**
	 * insert data to database.
	 * 
	 * @param array $param
	 */
	public function insert(array $param)
	{
		$sql = sprintf('insert into %s (%s) values (%s)',
			$this->table,
			implode(', ', array_keys($param)),
			':' . implode(', :', array_keys($param))
		);
		$query = $this->connect()->prepare($sql);
		$query->execute($param);
	}
}