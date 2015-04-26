
console.log('ng-profile.js')

// AngularBonfire.factory('theService', function() {
// 	return {
// 			thing : [
// 			 	{name:'blah', desc:'one'},
// 			 	{name:'klah', desc:'two'}
// 			]
// 	};
// }); 

AngularBonfire.factory('theService', function($http, $q) {

  var factory = {}

  factory.getAllByUsername = function (username) {

  	var deferred = $q.defer()
  	var username = username
  	
  	// return $http.get(AngularBonfireUrl+'/api/profile/getabilities/'+username)//.then(function(resp) {
  	$http.get(AngularBonfireUrl+'/api/profile/getabilities/'+username).then(function(resp) {
    	console.log(resp.data)
      deferred.resolve(resp.data)
 	  })
  //   .catch(function(error) {
  //       deferred.reject('profile not found');
  //     });
  // } else {
  //   // deferred.reject("No template or templateUrl has been specified.");
  // // }

  	return deferred.promise
  }

  return factory

})

/* this bit */
AngularBonfire.directive('interestlist', function(theService) {
    return {
        restrict: 'E',
        scope: {username: '@myAttr'},
        controller: function($scope, $attrs, $q, theService, mySharedService) {
                    // {localName: '@myAttr'},
                      // $scope.stuff = theService.getAllByUsername($scope.localN)
          var username = $scope.username
          var defer = $q.defer() 
          defer.resolve(theService.getAllByUsername(username));
          defer.promise.then(function (data) {
              $scope.data = data;
              console.log($scope.data);
          $scope.stuff = data //theService.getAllByUsername('testtest')
            });
          // $scope.stuff = theService.getAllByUsername($scope.localN)
          // console.log($scope.stuff);
          $scope.doStuff = function(input) {
          	console.log(input)
          	mySharedService.prepForBroadcast(input)
          }
            // $scope.$on('handleBroadcast', function() {
              // var index =  mySharedService.message;
                 // $scope.display = $scope.list[index] //'Directive: ' + mySharedService.message;
            // });
        },
        replace: true,
        // template: '<h1>sdfsdf{{th}}</h1>'
        template: '<ul class="vertical-nav list-unstyled"><li ng-repeat="list in stuff track by $index"><a href="#" ng-click="doStuff($index)">{{list.name}}</a></li></ul>'
        // template: '<p><h2>{{display.name}}</h2><p>g{{display.list}}</p></article>'
    };
});


/* this bit */
AngularBonfire.directive('activeinterest', function(theService) {
    return {
        restrict: 'E',
        scope: {username: '@myAttr'},
        controller: function($scope, $attrs, $q, theService, mySharedService) {
          var username = $scope.username
          var defer = $q.defer() 
          defer.resolve(theService.getAllByUsername(username));
          defer.promise.then(function (data) {
              $scope.data = data;
              console.log($scope.data);
          $scope.list = data 
          });
        	// console.log($scope.list);

            $scope.$on('handleBroadcast', function() {
            	var index =  mySharedService.message;
                 $scope.display = $scope.list[index] //'Directive: ' + mySharedService.message;
            });

        },
        replace: true,
        template: '<article><h4>{{display.name}}</h4><p>{{display.description}}</p><p>{{display.rating}}</p></article>'
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
