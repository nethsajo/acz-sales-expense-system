<?php

	$configs = [
		'path' => [
			'ASSETS'	=> URL_ROOT . 'assets/',
			'UPLOADS'	=> 'assets/uploads/'
		],
		'database' => [
			'DB_HOST'	    => 'localhost',
			'DB_NAME'	    => 'acz_db',
			'DB_USERNAME'	=> 'root',
			'DB_PASSWORD'	=> ''   
		],
		'CSRF' => [
			'TOKEN' => base64_encode(openssl_random_pseudo_bytes(16))
		],
		'session' => [
			'ID'	=> '',
			'TYPE'	=> '',
			'NAME'	=> '',
			'EMAIL'	=> '',
			'IMAGE'	=> ''	
		],
		'profile' => [
			'COMPANY_NAME'  => 'ACZ Digital and Printing Services',
			'DATE_FORMAT'   => 'F d, Y'
		]    
	];


	foreach ($configs as $config) {
		foreach ($config as $key => $value) {
		  define($key, $value);
		}
	}