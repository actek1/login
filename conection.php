<?php
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$db = 'login';
	$conection = new mysqli($host, $username, $password, $db);
	//check db
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
 ?>