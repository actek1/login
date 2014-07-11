<?php
	$url = $_SERVER['REQUEST_URI'];

	$uri = array(
		"/login/jaguar/image/" 	=> "/jaguar/image.php",
		"/login/jaguar/about/" 	=> "/jaguar/about.php",
		"/login/jaguar/login/" 	=> "/jaguar/login.php",
		"/login/jaguar/loginView/" 	=> "/jaguar/loginView.php",
	);
	foreach($uri as $origin => $destiny){
		if($origin == $url){
			include_once($destiny);
			if ($destiny == "/jaguar/about.php"){
				$obj = new About();
				break;
			}
			if($destiny == "/jaguar/image.php"){
				$obj = new Image();
				break;
			}
		}
	}
?>