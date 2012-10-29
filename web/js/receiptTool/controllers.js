'use strict'

function viewCtrl($scope, $location, BillItem) {
	// $scope.items =  BillItem.getAll();
	$scope.items = BillItem.getAll();
	
	$scope.getUnpaid = function() {
		var unpaidTotal = 0;
		_.each($scope.items, function(item) {
			if (!item.done) {
				unpaidTotal += (item.price * 1.0775 * 1.2);	
			}
		})
		return unpaidTotal;
	}
	
	$scope.addItem = function() {
		if ($scope.item) {
			$scope.item.done = false;
			$scope.items.push($scope.item);
			$scope.item = '';			
		}
	}
}

function editCtrl($scope, $location, BillItem) {
	
}