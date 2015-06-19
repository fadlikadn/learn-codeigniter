<!DOCTYPE html>
<html lang="en" ng-app="todoApp">
<head>
	<title>Todo App with CodeIgniter + AngularJS</title>
	<link rel="stylesheet" type="text/css" href="static/css/bootstrap.min.css">
</head>
<body ng-controller="TodoCtrl">

	<div class="col-md-10">
		<form role="form" ng-submit="addTask()">
			<div class="form-group col-md-5">
				<div class="form-row">
					<label for="title">Title</label>
					<input type="text" class="form-control" name="title" ng-model="taskTitle" placeholder="Enter task title" required />
				</div>
				<div class="form-row">
					<button type="submit" class="btn btn-default">Add task</button>
				</div>
			</div>
			
		</form>
	</div>

	<div class="col-md-10">
		<table>
			<tr ng-repeat="task in tasks track by $index">
				<td>{{ $index + 1 }}</td>
				<td>
					<input class="todo" type="text" ng-model-options="{ updateOn: 'blur' }" ng-change="updateTask(tasks[$index])" ng-model="tasks[$index].title" />
				</td>
				<td style="text-align:center">
					<input class="todo" type="checkbox" ng-change="updateTask(tasks[$index])" ng-model="tasks[$index].status" ng-true-value="'1'" ng-false-value="'0'" /> 
				</td>
				<td style="text-align:center">
					<a class="btn btn-xs btn-warning" ng-click="deleteTask(task[$index])">Delete</span></a>
				</td>
			</tr>
		</table>
	</div>

	<script type="text/javascript" src="static/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="static/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="static/js/angular.min.js"></script>
	<script type="text/javascript" src="static/js/app.js"></script>
</body>
</html>