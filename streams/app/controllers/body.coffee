streamsCtrls.controller 'bodyCtrl', [
	'$scope'
	'$http'
	($scope, $http, Search) ->
		
		userReq = $http.get WP_API_Settings.root + '/users/me'
		userReq.success (res) ->
			$scope.user = res
		
		$scope.partials = streamsConfig.partials
		$scope.urls = streamsConfig.urls
		
		$scope.sidebar = streamsConfig.sidebar
		
]
