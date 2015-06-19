var todoApp = angular.module('todoApp', []);

todoApp.controller('TodoCtrl', function ($scope, $http) {

	$http.get('api/task').success(function(data) {
		$scope.tasks = data;
	}).error(function(data) {
		$scope.tasks = data;
	});

	$scope.refresh = function() {
		$http.get('api/task').success(function(data) {
			$scope.tasks = data;
		}).error(function(data) {
			$scope.tasks = data;
		});
	}

	$scope.addTask = function() {
		var newTask = { title: $scope.taskTitle };
		// confirm($scope.taskTitle);

		$http.post('api/task', newTask).success(function(data) {
			$scope.refresh();
			$scope.taskTitle = '';
		}).error(function(data) {
			// alert(data.error);
			confirm(data.error);
		});
	}

	$scope.deleteTask = function() {
		$http.delete('api/task/' + task.id);
		$scope.tasks.splice($scope.tasks.indexOf(task), 1);
	}

	$scope.updateTask = function(task) {
		$http.put('api/task', task).error(function(data) {
			alert(data.error);
		});
		$scope.refresh();
	}
})