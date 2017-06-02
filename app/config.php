<?php

return [
	'database' => [
		'host' => '127.0.0.1', 
		'name' => 'framework',
		'user' => 'root', 
		'password' => '',
		'options' => [
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET utf8",
			PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
				
		]
	]
];
