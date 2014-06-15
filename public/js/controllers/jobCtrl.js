angular.module('jobController', [
	'jobService'
])
	// inject the Job service into our controller
	.controller('jobCtrl',function(
		$scope,
		$http,
		$location,
		$routeParams,
		Job
	) {

		// object to hold all the data for the new job form
		$scope.jobData = {};

		// loading variable to show the spinning loading icon
		$scope.loading = true;


		if ($routeParams.jobId) {
			loadJob($routeParams.jobId);
		} else {
			loadJobList();
		}

		$scope.openDatePicker = function($event,id) {
			console.log('open');
			$event.preventDefault();
			$event.stopPropagation();

			$scope[id + '_opened'] = true;
		};

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

		function loadJob(id) {
			Job.get(id)
				.success(function(data) {
					$scope.job = data;
					$scope.loading = false;

					formatScopeDates();
				});
		}

		function formatScopeDates() {
			var def = '0000-00-00';
			if ($scope.job.music_expire_date === def) {
				$scope.job.music_expire_date = null;
			}
			if ($scope.job.roll_over_date === def) {
				$scope.job.roll_over_date = null;
			}
			if ($scope.job.first_air_date === def) {
				$scope.job.first_air_date = null;
			}
			if ($scope.job.off_air_date === def) {
				$scope.job.off_air_date = null;
			}
		}

		//search all jobs for a value in a column, limit number of items to return
		//(if you want all items returned, send 'undefined' for limit)
		$scope.searchColumn = function(column,val,limit) {
			limit = limit || 8;
			return Job.search(column,val)
				.then(function(res){
					return res.data.slice(0,limit);
				});
		};

		$scope.viewJob = function(id) {
			$location.path('job/'+id);
		};

		// function to handle submitting the form
		// SAVE A Job ======================================================
		$scope.submitJob = function() {
			$scope.loading = true;

			// save the job. pass in job data from the form
			// use the function we created in our service
			Job.save($scope.jobData)
				.success(function(data) {

					// if successful, we'll need to refresh the job list
					Job.list()
						.success(function(getData) {
							$scope.jobs = getData;
							$scope.loading = false;
						});

				})
				.error(function(data) {
					console.log(data);
				});
		};

		// function to handle deleting a job
		// DELETE A Job ====================================================
		$scope.deleteJob = function(id) {
			$scope.loading = true;

			// use the function we created in our service
			Job.destroy(id)
				.success(function(data) {

					// if successful, we'll need to refresh the job list
					Job.list()
						.success(function(getData) {
							$scope.jobs = getData;
							$scope.loading = false;
						});

				});
		};

	});
	