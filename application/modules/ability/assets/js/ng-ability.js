AngularBonfire.factory("NgAbilityFactory", function($http, $q) {
  //this runs the first time the service is injected
  //this creates the service
  var factory = {}

  factory.getAll = function () {
	  var deferred = $q.defer();

  	$http.get(AngularBonfireUrl+'/ability/get_private_abilites').then(function(resp) {
    	deferred.resolve(resp.data);
 	});
    	// deferred.resolve('resp.data');

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
	'NgAbilityFactory', // the new bit
	function($scope, $state
		, NgAbilityFactory
		) {

	$scope.stuff = {};

	$state.go('home');
  	
  	$scope.user ={
		'name': 'Franz Kafka',
		'coverletter': '<h3>I want to cut patterns</h3><p>Or something. Designing and manufacturing clothes is what I do best and it is what I love to do. I only have the experience I have given myself so I do not expect to be put in the design department from day one.</p>',
		'cv': '<h3>A wisywig object</p>'
	}
	
	$scope.init = function(){

		NgAbilityFactory.getAll().then(function(data) {
		    console.log(data);
		    $scope.stuff = data;
		});
    }
    $scope.init(); 
    

}]);

AngularBonfire.config(['$stateProvider', '$urlRouterProvider', 
    function ($stateProvider, $urlRouterProvider ) {
	    
		var home = { 
		    name: 'home',  //mandatory
	    	// url: '/',
		    // templateUrl: 'application/home/home-layout.html',
		    views:{
            	'content':{
		    		templateUrl: AngularBonfireUrl+'/ability/ngpartial'
                	// controller: 'ProfileCtrl'
            	}
            }
		};

		$stateProvider
	  		.state(home)
		;
}]);



