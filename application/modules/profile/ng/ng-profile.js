console.log('ng-profile.js')
AngularBonfire.factory('theService', function() {
	return {
			thing : [
			 	{name:'blah', desc:'one'},
			 	{name:'klah', desc:'two'}
			]
	};
}); 


var MyCtrl = AngularBonfire.controller('MyCtrl', [
	'$scope',
	'theService',
	'mySharedService'
	, function($scope, theService, mySharedService){

    $scope.stuff = theService.thing; 

    $scope.doStuff = function(input) {
    	console.log(input)
    	mySharedService.prepForBroadcast(input);
    }

}]);

/* this bit */
AngularBonfire.directive('rita', function(theService) {
    return {
        restrict: 'E',
        controller: function($scope, $attrs, theService, mySharedService) {
        	console.log('f');
        	$scope.list = theService.thing
            $scope.$on('handleBroadcast', function() {
            	var index =  mySharedService.message;
                 $scope.display = $scope.list[index] //'Directive: ' + mySharedService.message;
            });
        },
        replace: true,
        template: '<article><h2>{{display.name}}</h2><p>{{display.list}}</p></article>'
        // template: '<p><h2>{{display.name}}</h2><p>{{display.list}}</p></article>'
    };
});
AngularBonfire.factory('mySharedService', function($rootScope) {
    var sharedService = {};

    sharedService.message = '';

    sharedService.prepForBroadcast = function(msg) {
        this.message = msg;
        this.broadcastItem();
    };

    sharedService.broadcastItem = function() {
        $rootScope.$broadcast('handleBroadcast');
    };

    return sharedService;
});


