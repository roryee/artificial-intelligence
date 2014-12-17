 
streamsCtrls.controller 'homeCtrl', [
	'$scope'
	'Post'
	'$route'
	($scope, Post, $route) ->
		
		$scope.posts = Post.query()
		
		$scope.postNew =
			title: ""
			content_raw: ""
			type: "streams"
			status: "publish"
		
		$scope.save = (catId) ->
			Post.save $scope.postNew, ->
				$route.reload();
      
]
