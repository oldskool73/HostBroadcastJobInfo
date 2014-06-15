angular.module('jobService', [])
	.factory('Job', function($http) {

		return {
			// list all the jobs
			list : function() {
				return $http.get('/api/jobs');
			},

			get : function(id) {
				return $http.get('/api/job/' + id);
			},

			// save a job (pass in job data)
			save : function(jobData) {
				return $http({
					method: 'POST',
					url: '/api/job',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: $.param(jobData)
				});
			},

			// destroy a job
			destroy : function(id) {
				return $http.delete('/api/job/' + id);
			}
		};

	});