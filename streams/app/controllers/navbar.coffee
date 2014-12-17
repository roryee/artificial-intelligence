streamsCtrls.controller 'navbarCtrl', [
	'$scope'
	'$http'
	($scope, $http) ->
		
		$scope.urls = streamsConfig.urls
		$scope.sidebar = streamsConfig.sidebar
		
		userReq = $http.get WP_API_Settings.root + '/users/me'
		userReq.success (res) ->
			$scope.user = res
		
]
