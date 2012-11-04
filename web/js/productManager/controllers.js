'use strict';

function productsListCtrl($scope, $http) {
	$http.get('/productManager/manageProducts').success(function(data) {
		$scope.products = data;
	}); 
	
	$http.get('/productManager/manageProducts?do=getCategories').success(function(data) {
		$scope.categoryList = data;
	});
	
	$scope.updateSubList = function() {
		$scope.Item.subcategory = "";
		$scope.products = [];
		$scope.subList = $scope.categoryList[$scope.Item.category].sub;
	}

	$scope.markSelected = function(product) {
		var selectValue = !product.selected
		product.selected = selectValue;
	}
	
	$scope.updateProduct = function() {
		$http.get('/productManager/manageProducts?do=getProducts&category=' + $scope.Item.category + '&subcategory=' + $scope.Item.subcategory).
			success(function(data) {
				$scope.products = data;
			});
	}
}

function manageCtrl($scope, $http) {
	$scope.SubcategoryContainer = {};
	$scope.theList = [];
	
	$http.get('/productManager/manageProducts').success(function(data) {
		$scope.products = data;
	}); 	
	
	$http.get('/productManager/manageProducts?do=getCategories').success(function(data) {
		$scope.categoryList = data;
	});
	
	$scope.insertIntoSubContainer = function(key) {
		if (!$scope.SubcategoryContainer[key]) {
			$scope.SubcategoryContainer[key] = [{}];
		} else {
			$scope.SubcategoryContainer[key].push({});
		}
		
		$scope.theList = $scope.SubcategoryContainer[key];	
	}	
	
	$scope.updateCategories = function() {
		angular.forEach($scope.categoryList, function(category,key) {
			category.price = $scope.MasterPrice;
		});
	}
	

}