<?php

	// DATABASE
	$host 		= "localhost"; 		// Host name
	$username 	= "root"; 			// Mysql username
	$password 	= ""; 				// Mysql password
	$db_name 	= "realcount"; 		// Mysql password
	
	
	$connection = mysql_connect($host, $username, $password) or die ("Error: Kunne ikke koble til databasen");
	mysql_select_db($db_name, $connection);
	
	
	error_reporting(E_ALL ^ E_NOTICE);

?>