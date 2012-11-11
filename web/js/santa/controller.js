'use strict';

function SantaCtrl($scope, $filter) {
	$scope.theHat = [];
		// {name: "Neon", matched:false, matchName: null},
	
	$scope.allMatched = false;
	
	$scope.addToHat = function() {
		if ($scope.name) {
			$scope.theHat.push({name: $scope.name, matched: false, matchName: null});
			$scope.name = null;			
		}
	}
	
	$scope.matchPeople = function() {
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
				theMatch.matched = true;				
			} 
		});
		$scope.allMatched = true;
	}
}