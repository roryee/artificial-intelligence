streamsCtrls.controller 'navbarCtrl', [
	'$scope'
	'Post'
	'$route'
	($scope, Post, $route) ->
		
		$scope.urls = streamsConfig.urls
		
		$scope.postNew =
			title: ""
			content_raw: ""
			post_format: "standard"
			type: "streams"
			status: "publish"
			
		# $rootScope.search =
		# 	query: ''
		# 	sort: 'date'
		# 	order: 'desc'
		#
		# $scope.search = $rootScope.search
		
		$scope.save = ->
      console.log $scope.postNew
			Post.save $scope.postNew
			
		
		$scope.temp = ->
			console.log $scope.postNew.post_format
		
]
