streams = angular.module 'streams', [
	'ngSanitize'
	'ngResource'
	'ngRoute'
	'streamsFactories'
	'streamsCtrls'
]

streams.config [
	'$routeProvider'
	'$httpProvider'
	($routeProvider, $httpProvider) ->
		
		$routeProvider.when '/',
			templateUrl: streamsConfig.partials + '/home.html'
			controller: 'homeCtrl'

		$routeProvider.when '/category/:catId',
			templateUrl: streamsConfig.partials + '/categories.html'
			controller: 'catCtrl'

		$routeProvider.when '/posts/:postId',
			templateUrl: streamsConfig.partials + '/post.html'
			controller: 'postCtrl'

		$routeProvider.otherwise
			redirectTo: '/'
		
		
		$httpProvider.defaults.headers.common['X-WP-Nonce'] = WP_API_Settings.nonce
		
]
