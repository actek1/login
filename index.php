<?php
	$url = $_SERVER['REQUEST_URI'];

	$uri = array(
		"/login/jaguar/image/" 	=> "/jaguar/imagen.php",
		"/login/jaguar/about/" 	=> "/jaguar/about.php",
		"/login/jaguar/login/" 			=> "/jaguar/login.php",
	);
	foreach($uri as $key => $value){
		//echo $value." - ".$key."<br>";
		if($key == $url){
			include($value);
			//echo $value."<br>";
		}
	}
	//echo $url."<br>";
?>