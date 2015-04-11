
var NgAbility = AngularBonfire.controller('NgAbility', [
	'$scope', 
	'$state', // the new bit
	function($scope, $state) {

	$state.go('home');
  	$scope.user ={
		'name': 'Franz Kafka',
		'coverletter': '<h3>I want to cut patterns</h3><p>Or something. Designing and manufacturing clothes is what I do best and it is what I love to do. I only have the experience I have given myself so I do not expect to be put in the design department from day one.</p>',
		'cv': '<h3>A wisywig object</p>'
	}

}]);

AngularBonfire.config(['$stateProvider', '$urlRouterProvider', 
    function ($stateProvider, $urlRouterProvider ) {
	    
		var home = { 
		    name: 'home',  //mandatory
	    	// url: '/',
		    // templateUrl: 'application/home/home-layout.html',
		    views:{
            	'content':{
		    		template: 'application/home/home-layout.html'
                	// controller: 'ProfileCtrl'
            	}
            }
		};

		$stateProvider
	  		.state(home)
		;
}]);


