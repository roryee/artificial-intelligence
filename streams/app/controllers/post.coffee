streamsCtrls.controller 'postCtrl', [
	'$scope'
	'Post'
	'$routeParams'
	'$http'
	($scope, Post, $routeParams, $http) ->
		
		$scope.state = 'read'
		$scope.sidebar = streamsConfig.sidebar
		
		postId = $routeParams.postId
		
		$scope.post = Post.get {
			ID: postId
		}
		
		$scope.edit = ->
			$scope.state = 'write'
		
		$scope.delete = ->
			$scope.post.$delete()
		
		$scope.cancel = ->
			$scope.state = 'read'
			
		$scope.save = ->
			$scope.cancel()
			$scope.post.$update()
		
]
