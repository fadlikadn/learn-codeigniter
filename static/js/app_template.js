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
					templateUrl: 'static/partials/partial-home.html'
				})

				// ABOUT PAGE AND MULTIPLE NAMED VIEWS
				.state('about', {
					// we'll get to this in a bit
				});
		}
	]
);