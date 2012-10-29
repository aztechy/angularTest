'use strict'

/* Services */

angular.module('receiptToolServices', ['ngResource']).
	factory('BillItem', function($resource) {
		return $resource('/frontend_dev.php/receiptTool/getBillItems', {}, {
			getAll: {method: 'GET', isArray: true}
		});
	});