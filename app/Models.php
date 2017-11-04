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
	public function connect() : \PDO
	{
	    $pdo = new PDO(
	        'mysql:host='.getenv('host').';dbname='.getenv('db_name').'', ''.getenv('user').'', ''.getenv('password'),
	        [
	            PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET utf8",
	            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
	        ]
	        );
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