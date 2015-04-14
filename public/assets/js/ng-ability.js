AngularBonfire.factory("NgAbilityFactory", function($http, $q) {
  //this runs the first time the service is injected
  //this creates the service
  var factory = {}


  factory.getAll = function () {

  	var deferred = $q.defer();
  	
  	$http.get(AngularBonfireUrl+'/ability/get_profile_abilites_json').then(function(resp) {
    	deferred.resolve(resp.data);
 	});

  	return deferred.promise;
  };

  factory.addAbility = function (dataObject) {
  	
  	var deferred = $q.defer();

    var post_data = {
        'form_data': dataObject, 
        // I don't think anyone has ever found a neat way of doing this without inline js
        'ci_csrf_token'  : ci_csrf_token(),
    }
	
	// so far we have an object we can 'POST' to our form which contains a security token
	$.post(AngularBonfireUrl+'/ability/add', post_data).done(function(){
   		deferred.resolve('done');
   	});

  	return deferred.promise;
  };
  
  factory.updateAbility = function (id, dataObject) {

  };

  factory.deleteAbility = function (id) {

  };

  return factory
});

var NgAbilityCtrl = AngularBonfire.controller('NgAbilityCtrl', [
	'$scope', 
	'$state', 
	'NgAbilityFactory', 
	function($scope, $state
		, NgAbilityFactory
		) {

	$scope.abilities = {};
	$scope.abilityFormData = {};


	$state.go('action_interest');


  	console.log('sdfds');
	
	$scope.init = function(){

		NgAbilityFactory.getAll().then(function(data) {
		    console.log(data);
		    $scope.abilities = data;
		});
    }
    $scope.init(); 

    $scope.addAbility = function() {

    		// 	    var post_data = {
		    //     // 'form_data': {'name':'reasonable use of globals'},//formData, //formData, // we can now send it along with our request
		    //     // I don't think anyone has ever found a neat way of doing this without inline js
		    //     'ci_csrf_token' : ci_csrf_token()
		    // }
		    // console.log('padpfsdfp',post_data)
		    // so far we have an object we can 'POST' to our form which contains a security token
  // $.post(AngularBonfireUrl+'/ability/add',
  //  { 'ci_csrf_token'  : ci_csrf_token(), 'formData' : $scope.abilityFormData });


// $.ajax({
//    url: AngularBonfireUrl+'/ability/add',
//    type: "post",
//    data: {csrfTokenName : csrfTokenValue},   //   post_data,
//    success: function(){
//      alert("success");
//     	// deferred.resolve("success");
//    },
//    error:function(){
//      alert("failure");
//     	// deferred.resolve("failure");
//    }
// });

    	console.log($scope.abilityFormData);
    	
  //   	// add to front of array
    	$scope.abilities.unshift($scope.abilityFormData);

  //   	var post_data = {
		//     'form_data': $scope.abilityFormData, //formData, // we can now send it along with our request
		//     csrfTokenName: csrfTokenValue  // I think setting these as globals in the footer is okay
		// }


    	NgAbilityFactory.addAbility($scope.abilityFormData).then(function(data) {

		    console.log('saved', data);
    		// reset the form
    		$scope.abilityFormData = {}
		});
    	
	}
    

}]);

// AngularBonfire.config(['$stateProvider', '$urlRouterProvider', 
//     function ($stateProvider, $urlRouterProvider ) {
	    
// 		var list = { 
// 		    name: 'list', 
// 		    views:{
//             	'content':{
// 		    		templateUrl: AngularBonfireUrl+'/ability/ability_list'
//             	}
//             }
// 		};

// 		$stateProvider
// 	  		.state(list)
// 		;
// }]);



