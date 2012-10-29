'use strict';

/* Controllers */

function selectProduct($scope, $location) {
	$scope.masterItem = {category:"",subcategory:"",product:""};
	
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
		$scope.Item.subcategory = '';
		$scope.Item.product = '';
		$scope.subCategories = $scope.masterSubCategories[$scope.Item.category];
	}
	
	$scope.updateItem = function(Item) {
		localStorage.setItem('Item', JSON.stringify(Item));
		$location.path('/adInfo');
	}
	
	$scope.isClean = function() {
		if ($scope.Item == undefined) {
			return true;
		} else {
			return false;
		}
	}
}

function adInfo($scope, $location) {
	$scope.Item = JSON.parse(localStorage.getItem('Item'));
	
	$scope.previousStep = function() {
		$location.path('selectProduct');
	}
	
	$scope.nextStep = function() {
		console.log('Go to checkout');
	}
}