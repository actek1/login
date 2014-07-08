<?php
	$url = $_SERVER['REQUEST_URI'];

	$uri = array(
		"/login/jaguar/image/" 	=> "/jaguar/image.php",
		"/login/jaguar/about/" 	=> "/jaguar/about.php",
		"/login/jaguar/login/" 	=> "/jaguar/login.php",
		"/login/jaguar/loginView/" 	=> "/jaguar/loginView.php",
	);
	foreach($uri as $origin => $destiny){
		//echo $destiny." - ".$origin."<br>";
		if($origin == $url){
			include($destiny);
			//echo $destiny."<br>";
		}
	}
	//echo $url."<br>";
?>