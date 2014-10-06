<?php
return array(
	'development' => 
	array(
		'default' => 
		array(
			'type' => 'pdo',
			'table_prefix' => '',
			'connection' => 
			array(
				'dsn' => 'mysql:host=localhost;dbname=fuel_task',
				'username' => 'root',
				'password' => 'root',
			),
		),
	),
);
