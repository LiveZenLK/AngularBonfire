'use strict';
// console.log(angular, 'angular-bonfire.js');

// Declare app level module which depends on filters, and services
var AngularBonfire = angular.module('AngularBonfire', 
	[
	'ngAnimate',
	'ui.router',
	'ngFileUpload',
	'ngSanitize',
	'hc.marked',
	'angular-underscore'
	])

var AngularBonfireUrl;
// var theOnlyGlobal = function(){
var theOnlyGlobal = 
	// return {
	{
		purpose: function(){ 
			console.log('around the application, a namespace create') 
		},
	    isDarkside: true,
	    isStrong: true,
	    useYoda: function(){
	    	this.isDarkside = !this.isDarkside;
	    	if(!this.isDarkside && this.isStrong){
	    		this.purpose()
	    	}
	    }
	}
	// }
// }

