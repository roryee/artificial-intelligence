var appFactories = angular.module('streamsFactories', ['ngResource']);

appFactories.factory('Post', function($resource) {
	
	var Post = $resource(WP_API_Settings.root + '/posts/:ID', {
		type: 'streams',
		ID: '@ID'
	}, {
		update: {
			method: 'PUT'
		}
	}, {});
	
	return Post;
	
})

.factory('Category', function($resource) {
	var Category = $resource(WP_API_Settings.root + '/taxonomies/stream_cats/terms/:ID', {
		ID: '@ID'
	}, {});
	
	return Category;
})

;
