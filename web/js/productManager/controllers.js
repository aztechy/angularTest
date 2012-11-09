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

function manageCtrl($scope, $http, $filter) {
	$scope.SubcategoryContainer = [];
	
	$http.get('/productManager/manageProducts').success(function(data) {
		$scope.products = data;
	}); 	
	
	$http.get('/productManager/manageProducts?do=getCategories').success(function(data) {
		$scope.categoryList = data;
	});
	
	$scope.insertIntoSubContainer = function(key) {
		//Push only if we haven't exceeded the subcategory limit.
		var itemsForKey = $scope.categoryList[key].sub.length;
		var itemsPushedForKey = $filter('filter')($scope.SubcategoryContainer, {id:key}).length;
		if (itemsPushedForKey < itemsForKey) {
			$scope.SubcategoryContainer.push({id: key, subname: null, subid: null, selected: false});			
		}

	}	
	
	$scope.updateCategories = function() {
		angular.forEach($scope.categoryList, function(category,key) {
			category.price = $scope.MasterPrice;
		});
	}
	
	$scope.detectChange = function(key, subkey,model) {
			console.log($scope.SubcategoryContainer[subkey]);
			var selectedItem = $scope.SubcategoryContainer[subkey];
			var subItem = $filter('filter')($scope.categoryList[key].sub, {token:model});
			console.log(subItem);
			selectedItem.selected = true;
			selectedItem.subname = subItem[0].token;
			selectedItem.subid = subItem[0].id;
	}
}