'use strict';

// let's define the scotch controller that we call up in the about state
routerApp.controller('ScotchController', function($scope) {
	$scope.message = 'test';
	// confirm('scotchController');
	$scope.scotches = [
		{
			name: 'Macallan 12',
			price: 50
		},
		{
			name: 'Chivas Regal Royal Salute',
			price: 10000
		},
		{
			name: 'Glenfiddich 1937',
			price: 20000
		}
	];
});