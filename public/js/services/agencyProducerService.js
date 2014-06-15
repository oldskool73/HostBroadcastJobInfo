angular.module('agencyProducerService', [])
	.factory('AgencyProducer', function($http) {

		return {
			// list all the partners
			list : function() {
				return $http.get('/api/agencyproducers');
			},

			search: function(val) {
				return $http.get('/api/agencyproducers', {
					params: {
						search: val
					}
				});
			}
		};

	});