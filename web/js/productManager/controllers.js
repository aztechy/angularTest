'use strict';

/* Controllers */

function selectProduct($scope) {
	$scope.masterSubCategories = {
		for_sale: [
			{ key: 'cars', display: 'Cars' },
			{ key: 'homes', display: 'Homes'}
		],
		community: [
			{ key: 'garage_sale', display: 'Garage Sale' },
			{ key: 'psa', display: 'Public Service Announcement' }
		],
	};
	
	$scope.masterProducts = {
		defaults: [
			{ id: 1, name: '7 day posting', price: 10 },
			{ id: 2, name: '14 day posting', price: 20 },
			{ id: 3, name: '30 day posting', price: 50 },
		],
		garage_sale: [
			{ id: 1, name: '7 day posting', price: 40 },
			{ id: 2, name: '14 day posting', price: 80 },
			{ id: 3, name: '30 day posting', price: 500 },
		],
	}
		
	$scope.updateProducts = function() {
		$scope.products = $scope.masterProducts[$scope.Item.subcategory];
		if ($scope.products == undefined) {
			$scope.products = $scope.masterProducts.defaults;
		}
	}
	
	$scope.updateSubcategory = function() {
			$scope.subCategories = $scope.masterSubCategories[$scope.Item.category];
	}
}