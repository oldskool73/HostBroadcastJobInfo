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
			controller: 'jobListCtrl'
		})
		.when('/job/:jobId', {
			templateUrl: 'views/jobTpl.html',
			controller: 'jobEditCtrl'
		})
		.otherwise({
			redirectTo: '/'
		});
	})
	;

angular
	.module('jobController', [
		'jobService'
	]);

