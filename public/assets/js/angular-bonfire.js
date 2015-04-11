'use strict';
console.log('angular-bonfire.js');

// Declare app level module which depends on filters, and services
var AngularBonfire = angular.module('AngularBonfire', 
	[
	'NgAbility'
	
	// 'ui.router','ngResource','ngAnimate','ui.bootstrap','ngRoute','firebase'
	// ,'AuthCtrl'
	// ,'HeaderCtrl'
	// ,'HeaderDirective'
	// ,'FooterCtrl'
	// ,'FooterDirective'
	// ,'ProfileCtrl'
	// ,'DreamsCtrl'
	// ,'SkillsCtrl'
	// ,'StatsCtrl'
	// ,'EditProfileCtrl'
	// ,'EditSkillsCtrl'
	// ,'AccountCtrl'
	// ,'CloudCtrl'
	// ,'CloudDirective'
		// ,'MainCtrl'
	// ,'BeerCtrl'
	// ,'UsersCtrl' 
	]);

var NgAbility = angular.module('NgAbility', []);

NgAbility.controller('NgAbility', ['$scope', function($scope) {


  	$scope.user ={
		'name': 'Franz Kafka',
		'coverletter': '<h3>I want to cut patterns</h3><p>Or something. Designing and manufacturing clothes is what I do best and it is what I love to do. I only have the experience I have given myself so I do not expect to be put in the design department from day one.</p>',
		'cv': '<h3>A wisywig object</p>'
	}

}]);

