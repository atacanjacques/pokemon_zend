<?php

return [
'db' => [
	'driver' => 'Pdo',
	'dsn' => 'mysql:dbname=pokemon_zend;host=localhost',
	'username' => 'root',
	'password' => '',
	'driver_options' => [
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
		]
	]
];