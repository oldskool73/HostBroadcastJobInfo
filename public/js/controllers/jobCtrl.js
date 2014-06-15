angular.module('jobController', [
	'jobService',
	'clientService',
	'creativePartnerService',
	'agencyProducerService',
	'agencyDirectorService'
])
	// inject the Job service into our controller
	.controller('jobCtrl',function(
		$scope,
		$http,
		$location,
		$routeParams,
		Job,
		Client,
		CreativePartner,
		AgencyProducer,
		AgencyDirector
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


		$scope.getClientList = function(val) {
			return Client.search(val)
				.then(function(res){
					return res.data;
				});
		};

		$scope.getCreativePartnerList = function(val) {
			return CreativePartner.search(val)
				.then(function(res){
					return res.data;
				});
		};

		$scope.getAgencyProducerList = function(val) {
			return AgencyProducer.search(val)
				.then(function(res){
					return res.data;
				});
		};

		$scope.getAgencyDirectorList = function(val) {
			return AgencyDirector.search(val)
				.then(function(res){
					return res.data;
				});
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
				});
		}

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
	