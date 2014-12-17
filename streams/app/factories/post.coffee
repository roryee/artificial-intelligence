streamsFactories.factory 'Post', [
	'$resource',
	($resource) ->
	
		Post = $resource WP_API_Settings.root + '/posts/:ID', {
			type: 'streams'
			ID: '@ID'
		}, {
			update:
				method: 'PUT'
		}, {}
		
		return Post
	
]
