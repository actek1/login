<?php
	include("process_encode.php");
	class Image{	
		function __construct(){
			echo ProcessEncode::encode();
		}
	}
?>