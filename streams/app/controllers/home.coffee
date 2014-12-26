 
streamsCtrls.controller 'homeCtrl', [
  '$scope'
  '$rootScope'
  'Post'
  'Comment'
  '$route'
  ($scope, $rootScope, Post, Comment, $route) ->
    
    $scope.search = $rootScope.search
    
    $scope.posts = []
    Post.query {}, (posts) ->
      console.log posts
      for post in posts
        post.comments = Comment.query { postId: post.ID }
        $scope.posts.push post
		
    console.log $scope.posts
      
]
