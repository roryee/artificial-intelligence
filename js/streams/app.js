
var streams = angular.module('streams', [
  'ngSanitize',
  'ngResource',
  'ngRoute',
  'streamsFactories',
  'streamsCtrls'
]);

streams.config(function($routeProvider, $httpProvider) {
  $routeProvider
  .when('/', {
    templateUrl: streamsConfig.partials + '/home.html',
    controller: 'homeCtrl'
  })
  .when('/category/:catId', {
    templateUrl: streamsConfig.partials + '/categories.html',
    controller: 'catCtrl'
  })
  .when('/posts/:postId', {
    templateUrl: streamsConfig.partials + '/post.html',
    controller: 'postCtrl'
  })
  .otherwise({
    redirectTo: '/'
  });
  
  $httpProvider.defaults.headers.common['X-WP-Nonce'] = WP_API_Settings.nonce;

});
