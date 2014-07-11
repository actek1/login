<?php
	include("process_encode.php");
	class About{	
		function __construct(){
			echo '<img src="data:image/jpg;base64,'.ProcessEncode::encode().'"/>';
		}
	}
?>