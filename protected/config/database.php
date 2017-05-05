<?php

return array(
//	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database

	'connectionString' => 'pgsql:host=localhost;dbname=postgres;port=5432;',
	'emulatePrepare' => true,
	'username' => 'postgres',
	'password' => 'postgres',
	'charset' => 'utf8',
);