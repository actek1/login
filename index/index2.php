<html>
    <head>
        <title>Index</title>
		<meta charset="utf-8"> 
        <link rel="stylesheet" type="text/css" href="/login/bootstrap/css/bootstrap.min.css" />
    </head>
    <body class="container">
        <h1 class="text-info">WEBSERVICES</h1>
			<section>
				<?php
					$url = $_SERVER['REQUEST_URI'];

					$uri = array(
						"/jaguar/image/" 	=> "jaguar/imagen.php",
						"/jaguar/about/" 	=> "jaguar/about.php",
					);
					foreach($uri as $key => $value){
						echo $value." - ".$key."<br>";
						if($key == $url){
							require_once($value);

						}
					}

					echo $url."<br>";
				?>
			</section>
    </body>
</html>