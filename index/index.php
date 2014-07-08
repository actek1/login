<html ng-app>
    <head>
        <title>Login</title>
		<meta charset="utf-8"> 
        <link rel="stylesheet" type="text/css" href="/login/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="css/twitts.css" />
		<script type="text/javascript" src="angular/angular.min.js"></script>
		<script type="text/javascript" src="js/app.js"></script>
    </head>
    <body ng-controller="LoginController as login">
        <section class="container">
            <form class="form-horizontal">
				<fieldset>
					<!-- Form Name -->
					<legend>Login</legend>

					<!-- Text input-->
					<div class="control-group">
					  <label class="control-label">Usuario</label>
					  <div class="controls">
						<input type="text" ng-model="username" placeholder="Username" class="input-medium">
						
					  </div>
					</div>

					<!-- Password input-->
					<div class="control-group">
					  <label class="control-label">Contraseña</label>
					  <div class="controls">
						<input type="password" ng-model="password" placeholder="Password" class="input-medium">
						
					  </div>
					</div>

					<!-- Button -->
					<div class="control-group">
					  <label class="control-label" for=""></label>
					  <div class="controls">
						<button ng-click='SignUp();' class="btn btn-success">Enviar</button>
					  </div>
					</div>
				</fieldset>
			</form>
		</section>
    </body>
</html>