'use strict';


// Declare app level module which dpeends on filters and services
angular.module('productManager', []).
	config(['$routeProvider', function($routeProvider) {
		$routeProvider.when('/selectProduct', {templateUrl: '/partials/productManager/selectProduct.html', controller: selectProduct});
		$routeProvider.when('/adInfo', {templateUrl: '/partials/productManager/adInfo.html', controller: adInfo});
		$routeProvider.otherwise({redirectTo: '/selectProduct'});
	}]);