angular.module('jobController')
	.controller('jobListCtrl',function(
		$scope,
		$http,
		$location,
		$routeParams,
		Job
	) {

		// loading variable to show the spinning loading icon
		$scope.loading = true;

		loadJobList();

		function loadJobList() {
			// get all the jobs first and bind it to the $scope.jobs object
			// use the function we created in our service
			// GET ALL Jobs ====================================================
			Job.list()
				.success(function(data) {
					$scope.jobs = data;
					$scope.loading = false;
				});
		}

		$scope.viewJob = function(id) {
			$location.path('job/'+id);
		};
	})
;
	