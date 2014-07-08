<?php
	$path= 'img/jaguar.jpg';
	
	$binary = fread(fopen($path, "r"), filesize($path));
	$base64 = base64_encode($binary);
?>