function LoginController($scope, $http) {

	$scope.SignUp = function() {
		$http.post('/login/jaguar/login/', {'uname': $scope.username, 'pswd': $scope.password},
		{headers: {'Accept': 'application/json'}}
		).success(function(data, status, headers, config) {
		
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
	
	$scope.Register = function() {
		$http.post('insert_user.php', {'uname': $scope.username, 'pswd': $scope.password, 'email': $scope.email},
		{headers: {'Accept': 'application/json'}}
		).success(function(data, status, headers, config) {
				//alert(); 
				console.log(data);
		}).error(function(data, status) {
		   alert(status);
		});
	
	};
}