function LoginController($scope, $http) {

	$scope.SignUp = function() {
		$http.post('login.php', {'uname': $scope.username, 'pswd': $scope.password},
		{headers: {'Accept': 'application/json'}}
		).success(function(data, status, headers, config) {
				//alert(data.uname); 
				//alert(data.pswd);
				console.log(data);
		}).error(function(data, status) {
		   alert(status);
		});
	};
}