'use strict';


// Declare app level module which dpeends on filters and services
angular.module('receiptTool', ['receiptToolServices']).
	config(['$routeProvider', function($routeProvider) {
		$routeProvider.when('/', {templateUrl: '/partials/receiptTool/view.html', controller: viewCtrl });
		$routeProvider.when('/edit', {templateUrl: '/partials/receiptTool/edit.html', controller: editCtrl });
		$routeProvider.otherwise({redirectTo: '/'});
	}]);