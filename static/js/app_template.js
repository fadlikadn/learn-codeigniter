'use strict';

// Declare app level module which depends on filters, and services
var routerApp = angular.module('routerApp', [
	'ngAnimate',
	'ngSanitize',
	'ngResource',
	'ngCookies',
	'ui.router'
	]);

routerApp.run(
	['$rootScope', '$state', '$state', '$stateParams',
		function ($rootScope, $state, $stateParams) {
			$rootScope.$state = $state;
			$rootScope.$stateParams = $stateParams;

		}
	]
);

routerApp.config(
	[			 '$stateProvider', '$urlRouterProvider','$controllerProvider',	'$compileProvider',	'$filterProvider',	'$provide',
		function ($stateProvider, 	$urlRouterProvider,	 $controllerProvider, 	$compileProvider,	$filterProvider,	$provide) {

			// lazy controller, directive and service
			routerApp.controller 	= $controllerProvider.register;
			routerApp.directive	= $compileProvider.directive;
			routerApp.filter 		= $filterProvider.register;
			routerApp.factory 	= $provide.factory;
			routerApp.service 	= $provide.service;
			routerApp.constant	= $provide.constant;
			routerApp.value		= $provide.value;

			$urlRouterProvider.otherwise('/home');

			$stateProvider
				// HOME STATES AND NESTED VIEWS
				.state('home', {
					url: '/home',
					templateUrl: '../static/partials/partial-home.html'
				})

				// nested list with custom controller
				.state('home.list', {
					url: '/list',
					templateUrl: '../static/partials/partial-home-list.html',
					controller: function($scope) {
						// confirm("hai");
						$scope.dogs = ['Bernese', 'Husky', 'Goldendoodle'];
					}
				})

				// nested list with just some random string data
				.state('home.paragraph', {
					url: '/paragraph',
					template: 'I could sure use a drink right now.'
				})

				/*.state('about', {
					url: '/about',
					templateUrl: '../static/partials/partial-about.html',
					controller: 'scotchController'
				})*/

				// ABOUT PAGE AND MULTIPLE NAMED VIEWS
				.state('about', {
					url: '/about',
					views: {
						// the main template will be placed here (relatively named)
						'': { templateUrl: '../static/partials/partial-about.html' },

						// the child views will be defined here (absolutely named)
						'columnOne@about': { template: 'Look I am a column!' },

						// for column two, we'll define a separate controller
						'columnTwo@about': {
							templateUrl: '../static/partials/table-data.html',
							controller: 'ScotchController'
						}
					}
				});
		}
	]
); // closes $routerApp.config()

