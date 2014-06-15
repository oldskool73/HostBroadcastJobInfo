angular.module('agencyDirectorService', [])
	.factory('AgencyDirector', function($http) {

		return {
			// list all the partners
			list : function() {
				return $http.get('/api/agencydirectors');
			},

			search: function(val) {
				return $http.get('/api/agencydirectors', {
					params: {
						search: val
					}
				});
			}
		};

	});