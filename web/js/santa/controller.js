'use strict';

function SantaCtrl($scope, $filter, $http) {
	// {name: "Neon", matched:false, matchName: null},
	$http.get('/todo/santaData').success(function(data) {
		$scope.theHat = data;
	});
	
	$scope.allMatched = false;
	
	$scope.isAllMatched = function() {
		var noMatch = 0;
		angular.forEach($scope.theHat, function(person) {
			if (person.matched == false) {
				noMatch++;
			}
		});
		
		if (noMatch) {
			return false;
		} else {
			return true;
		}
	}
	$scope.reset = false;
	
	$scope.addToHat = function() {
		if ($scope.name) {
			var santa = {name: $scope.name, matched: false, matchName: null}
			$http({
				method: 'POST',
				url: '/frontend_dev.php/todo/santaData', 
				data: jQuery.param(santa),
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			}).success(function(data) {
				if (data.status == 'success') {
					santa.id = data.id;
				}
			});
			$scope.theHat.push(santa);
			$scope.name = null;
		}
	}
	
	$scope.matchPeople = function(reset) {
		if (reset == true) {
			angular.forEach($scope.theHat, function(person) {
				person.matched = false;
				person.matchName = null;
			});
		}
		angular.forEach($scope.theHat, function(person) {
			var othersList = [];
			$filter('filter')($scope.theHat, function(otherPerson) {
				if ((otherPerson.name != person.name) && (otherPerson.matched == false)) {
					othersList.push(otherPerson);
				}
			});
			
			if (othersList.length) {
				// Get the random matchPerson
				var randomnumber=Math.floor(Math.random()*othersList.length);
				var theMatch = othersList[randomnumber];

				// Assign that person to the current person and mark the matchPerson matched.
				person.matchName = theMatch.name
				person.mid = theMatch.id;
				theMatch.matched = true;
				
				$http({
					method: 'PUT',
					url: '/todo/santaData', 
					data: jQuery.param(person),
					headers: {'Content-Type': 'application/x-www-form-urlencoded'}
				}).success(function(data) {
					if (data.status == 'success') {
						// Do something.
					}
				});

			} 
		});

		$scope.allMatched = true;
		$scope.reset = true;
	}

	$scope.clearList = function() {
		$scope.theHat = [];
		$http({
			method: 'delete',
			data: null,
			url: '/todo/santaData', 
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).success(function(data) {
			if (data.status == 'success') {
				// Do something.
			}
		});
	}
}