<html ng-app>
    <head>
        <title>Login</title>
		<meta charset="utf-8"> 
        <link rel="stylesheet" type="text/css" href="/login/bootstrap/css/bootstrap.min.css" />
		<script type="text/javascript" src="/login/angular/angular.min.js"></script>
		<script type="text/javascript" src="/login/js/app.js"></script>
    </head>
    <body ng-controller="LoginController as login">
        <section class="container">
            <form class="form-horizontal" name="loginForm">
				<fieldset>
					<!-- Form Name -->
					<legend>Login</legend>

					<!-- Text input-->
					<div class="control-group">
					  <label class="control-label">Usuario</label>
					  <div class="controls">
						<input type="text" ng-model="login.username" placeholder="Username" class="input-medium" required>
						
					  </div>
					</div>

					<!-- Password input-->
					<div class="control-group">
					  <label class="control-label">Contraseña</label>
					  <div class="controls">
						<input type="password" ng-model="login.password" placeholder="Password" class="input-medium" required>
						
					  </div>
					</div>

					<!-- Button -->
					<div class="control-group">
					  <label class="control-label" for=""></label>
					  <div class="controls">
						<button ng-disabled="!loginForm.$valid" ng-click='SignUp(login);' class="btn btn-success">Enviar</button>
					  </div>
					</div>
				</fieldset>
			</form>
		</section>
    </body>
</html>