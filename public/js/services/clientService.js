angular.module('clientService', [])
	.factory('Client', function($http) {

		return {
			// list all the jobs
			list : function() {
				return $http.get('/api/clients');
			},

			search: function(val) {
				return $http.get('/api/clients', {
					params: {
						search: val
					}
				});
			}
		};

	});