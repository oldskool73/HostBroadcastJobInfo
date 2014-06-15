angular
	.module('broadcastApp', [
		'ngRoute',
		'ui.bootstrap',
		'navController',
		'jobController'
	])
	.config(function ($routeProvider) {
		$routeProvider
		.when('/', {
			templateUrl: 'views/jobListTpl.html',
			controller: 'jobCtrl'
		})
		.when('/job/:jobId', {
			templateUrl: 'views/jobTpl.html',
			controller: 'jobCtrl'
		})
		.otherwise({
			redirectTo: '/'
		});
	})
	;
