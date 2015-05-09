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

var AngularBonfireLoader = '<article ng-hide="show" class="row loader-wrap">'
AngularBonfireLoader +=    		'<div class="col-12">'
AngularBonfireLoader += 			'<div class="loader">Loading...</div>'
AngularBonfireLoader += 		'</div>'
AngularBonfireLoader += 	'</article>'

AngularBonfire.directive('systemloader', function() {
    return {
        restrict: 'E',
        replace: true,
        // scope: {show: '@featureInit'},
        controller: function($scope, $attrs, $rootScope) {
          	var show = false;
        	$rootScope.$on('loaded', function() { 
				$scope.show = true;
				console.log('off')
			});
        	console.log('showing the:   ',show)
		},
        template: AngularBonfireLoader
    }
})

