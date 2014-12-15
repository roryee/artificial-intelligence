
var appCtrls = angular.module('streamsCtrls', ['streamsFactories', 'ngRoute']);

appCtrls

.controller('navbarCtrl', function($scope, $http, Category) {
	
	$scope.cats = Category.query();
	
	$scope.urls = streamsConfig.urls;
	
	$http.get(WP_API_Settings.root + '/users/me').success(function(res) {
		$scope.user = res;
	});
	
	$scope.sidebar = streamsConfig.sidebar;
	
})

.controller('homeCtrl', function($scope, Post, Category, $route) {
	
	$scope.posts = Post.query();
	$scope.cats = Category.query();
	
	$scope.postNew = {
		title: "",
		content_raw: "",
		type: "streams",
		status: "publish",
		terms: {
			post_tag: [],
			stream_cats: []
		}
	};
	
	$scope.save = function(catId) {
		console.log(catId);
		console.log($scope.postNew);
		$scope.postNew.terms.stream_cats.push(catId);
		Post.save($scope.postNew, function() {
			$route.reload();
		});
	}
	
	$scope.togNew = false;
	
	$scope.sort = 'date';
	$scope.sortRev = true;
	
	$scope.sidebar = streamsConfig.sidebar;
	
})

.controller('catCtrl', function($scope, Post, Category, $routeParams) {
	
	var catId = $routeParams.catId;
	
	$scope.cat = Category.get({ID: catId});
	
	$scope.posts = Post.query({
		"filter[taxonomy]": "stream_cats",
		"filter[term]":     $scope.cat.slug
	});
	
	$scope.sort = 'date';
	$scope.order = 'desc';
	
	$scope.sidebar = streamsConfig.sidebar;
	
})

.controller('postCtrl', function($scope, Post, $routeParams, $http) {
	
	var postId = $routeParams.postId;
	
	$scope.post = Post.get({ID: postId});
	
	$scope.state = 'read';
	
	$scope.edit = function() {
		$scope.state = 'write';
	}
	
	$scope.delete = function() {
		$scope.post.$delete();
	}
	
	$scope.cancel = function() {
		$scope.state = 'read';
	}
	
	$scope.save = function() {
		$scope.state = 'read';
		$scope.post.$update();
	}
	
	$scope.sidebar = streamsConfig.sidebar;
	
})



// .controller('catCtrl', function($scope, Post, $routeParams) {
//
// })
