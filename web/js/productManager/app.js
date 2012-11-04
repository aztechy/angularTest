'use strict';


// Declare app level module which dpeends on filters and services
angular.module('productManager', []).
	config(['$routeProvider', function($routeProvider) {
		$routeProvider.when('/selectProduct', {templateUrl: '/partials/productManager/selectProduct.html', controller: productsListCtrl});
		$routeProvider.when('/manage', {templateUrl: '/partials/productManager/manage.html', controller: manageCtrl});
		$routeProvider.otherwise({redirectTo: '/selectProduct'});
	}]);