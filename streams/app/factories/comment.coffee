streamsFactories.factory 'Comment', [
	'$resource'
	($resource) ->
		
		Comment = $resource WP_API_Settings.root + '/posts/:postId/comments/:comment', {
			postId: '@postId'
			comment: '@comment'
		}, {
			update:
				method: 'PUT'
		}, {}
		
		return Comment
		
]
