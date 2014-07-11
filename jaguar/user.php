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
            <form class="form-horizontal" name="regForm" ng-submit='Register(login);'>
				<fieldset>

				<!-- Form Name -->
				<legend>Registro</legend>

				<!-- Text input-->
				<div class="control-group">
				  <label class="control-label" for="">Nombre de Usuario</label>
				  <div class="controls">
					<input ng-model="login.username" class="input-xlarge" type="text" required>
					
				  </div>
				</div>

				<!-- Password input-->
				<div class="control-group">
				  <label class="control-label" for="passwordinput">Password</label>
				  <div class="controls">
					<input ng-model="login.password" class="input-xlarge" type="password" required>
					
				  </div>
				</div>

				<!-- Text input-->
				<div class="control-group">
				  <label class="control-label" for="">E-mail</label>
				  <div class="controls">
					<input ng-model="login.email" class="input-xlarge" type="email" required>
					
				  </div>
				</div>
				
				<!-- Button -->
					<div class="control-group">
					  <label class="control-label" for=""></label>
					  <div class="controls">
						<button ng-disabled="!regForm.$valid" type="submit" class="btn btn-success">Registrar</button>
					  </div>
					</div>

				</fieldset>
			</form>
		</section>
    </body>
</html>