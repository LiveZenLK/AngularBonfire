// AngularBonfire.factory("NgJoinFactory", function($http, $q) {
//   //this runs the first time the service is injected
//   //this creates the service
//   var factory = {}


//   factory.register = function () {

//   var deferred = $q.defer();
  	
// 	$.post(AngularBonfireUrl+'/ability/add', post_data).done(function(){
//    		deferred.resolve('done');
//    	});

//     return deferred.promise;
//   };

//   return factory
// });

var NgJoinCtrl = angular.module('NgJoinCtrl', ['ngAnimate']);



// var NgJoinCtrl = AngularBonfire.

NgJoinCtrl.controller('NgJoinCtrl', [
	'$scope', 
	'$state', 
	// 'ngAnimate',
  // 'ngAnimate',
	// 'NgJoinFactory', 
	function($scope, $state
    // , ngAnimate
		// , NgJoinFactory
		) {

	$scope.joinFormData = {};

      $scope.editswitch =  false;

  console.log('join.js');
	
  $scope.registerNow = function(){
    console.log('clicked enter')
  }    

}]);



