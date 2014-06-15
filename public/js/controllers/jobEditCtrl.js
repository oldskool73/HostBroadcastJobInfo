angular.module('jobController')
	// inject the Job service into our controller
	.controller('jobEditCtrl',function(
		$scope,
		$http,
		$location,
		$route,
		$routeParams,
		Job
	) {

		$scope.job = {};

		$scope.newKeyNumber = '';

		// loading variable to show the spinning loading icon
		$scope.loading = true;

		$scope.title = 'Edit Job';

		loadJob($routeParams.jobId);
		setTimeout(function() {
			var offset = $('#toolbar').offset();
			console.log(offset.top);
			$('#toolbar').affix({
				offset: {
					top: offset.top - 10
				}
			});
		}, 1000);

		function loadJob(id) {
			Job.get(id)
				.success(function(data) {
					$scope.job = data;
					$scope.loading = false;

					formatScopeDates();
				});
		}

		$scope.cancelForm = function() {
			$location.path('/');
		};

		$scope.refreshForm = function() {
			$route.reload();
		};
		

		// function to handle submitting the form
		// SAVE A Job ======================================================
		$scope.submitJob = function() {
			$scope.loading = true;

			// save the job. pass in job data from the form
			// use the function we created in our service
			Job.update($scope.job)
				.success(function(data) {
					loadJob($scope.job.id);
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

		//search all jobs for a value in a column, limit number of items to return
		//(if you want all items returned, send 'undefined' for limit)
		//used for all the typeahead input values
		$scope.searchColumn = function(column,val,limit) {
			limit = limit || 8;
			return Job.search(column,val)
				.then(function(res){
					return res.data.slice(0,limit);
				});
		};

		//show a date picker
		$scope.openDatePicker = function($event,id) {
			console.log('open');
			$event.preventDefault();
			$event.stopPropagation();

			$scope[id + '_opened'] = true;
		};

		//remove weird values from unset dates
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

		$scope.deleteKeyNumber = function(id) {
			$.each($scope.job.key_numbers,function(idx,key) {
				if (key.id === id) {
					$scope.job.key_numbers.splice(idx,1);
					return false;
				}
			});
		};

		$scope.addKeyNumber = function(newKeyNumber) {
			$scope.job.key_numbers.push({
				id: generateQuickGuid(),
				number: $scope.newKeyNumber
			});
			$scope.newKeyNumber = '';
		};

		$scope.deleteSecondary = function(id) {
			console.log(id);
			$.each($scope.job.secondary,function(idx,key) {
				if (key.id === id) {
					$scope.job.secondary.splice(idx,1);
					return false;
				}
			});
		};

		function generateQuickGuid() {
			return Math.random().toString(36).substring(2, 15) +
				Math.random().toString(36).substring(2, 15);
		}

	})

	//controller for the 'new secondary' section
	//
	.controller('secondaryCtrl',function(
		$scope
	) {

		$scope.secondary = {};
		$scope.isVisible = false;

		$scope.addSecondary = function() {
			$scope.job.secondary.push($scope.secondary);
			$scope.secondary = {};
			$scope.isVisible = false;
		};

		$scope.cancelAddSecondary = function() {
			$scope.isVisible=false;
			$scope.secondary={};
		};
	})
;
	