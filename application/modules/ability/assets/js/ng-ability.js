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

	$state.go('list');
	
	$scope.init = function(){

		NgAbilityFactory.getAll().then(function(data) {
		    console.log(data);
		    $scope.abilities = data;
		});
    }
    $scope.init(); 
    

}]);

AngularBonfire.config(['$stateProvider', '$urlRouterProvider', 
    function ($stateProvider, $urlRouterProvider ) {
	    
		var list = { 
		    name: 'list', 
		    views:{
            	'content':{
		    		templateUrl: AngularBonfireUrl+'/ability/ability_list'
            	}
            }
		};

		$stateProvider
	  		.state(list)
		;
}]);



