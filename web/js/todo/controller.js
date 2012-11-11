'use strict';

function TodoCtrl($scope) {
	$scope.todoList = [
		{text: 'Learn angularJs', done: false},
		{text: 'Learn jQuery', done: false},
		{text: 'Write better test scripts', done: false}
	];
	
	$scope.addToList = function() {
		$scope.todoList.push({text: $scope.Todo.text, done: false});
		$scope.Todo.text = null;
	}
	
	$scope.clearDone = function() {
		var todoList = [];
		angular.forEach($scope.todoList,function(item, key){
			if (!item.done) {
				todoList.push(item);
			}
		});
		$scope.todoList = todoList;
	}
	$scope.getCompleted = function() {
		var completedCount = 0;
		angular.forEach($scope.todoList, function(item) {
			if (item.done) {
				completedCount++;
			}
		});
		
		return completedCount;
	}
}