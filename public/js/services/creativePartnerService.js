angular.module('creativePartnerService', [])
	.factory('CreativePartner', function($http) {

		return {
			// list all the partners
			list : function() {
				return $http.get('/api/creativepartners');
			},

			search: function(val) {
				return $http.get('/api/creativepartners', {
					params: {
						search: val
					}
				});
			}
		};

	});