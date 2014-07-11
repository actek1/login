function LoginController($scope, $http) {

	$scope.SignUp = function(login) {
		$http.post('/login/jaguar/login/', {'uname': login.username, 'pswd': login.password},
		{headers: {'Accept': 'application/json'}}
		).success(function(data, status, headers, config) {
				$scope.login = {};
				switch(data.value)
				{
					case '0': alert('Datos correctos');
					break;
					case '1': alert('Password Incorrecto');
					break;
					case '2': alert('Username Incorrecto');
					break;
					case '3': alert('Username y Password Incorrecto');
					break;
				}
				alert(data.access_code); 
				console.log(data);
		}).error(function(data, status) {
		   console.log(data);
		   alert(data.error);
		});
	};	
	
	$scope.Register = function(login) {
		$http.post('/login/jaguar/user/new/', {'uname': login.username, 'pswd': login.password, 'email': login.email},
		{headers: {'Accept': 'application/json'}}
		).success(function(data, status, headers, config) {
				$scope.login = {};
				alert('Usuario Registrado Correctamente'); 
				console.log(data);
		}).error(function(data, status) {
		   alert(status);
		});
	
	};
}