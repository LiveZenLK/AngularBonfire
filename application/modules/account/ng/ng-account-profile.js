var AccountProfileCtrl = AngularBonfire.controller('AccountProfileCtrl', ['$scope', '$state', '$timeout',
  'AccountFactory',
  function($scope, $state, $timeout
    , AccountFactory
    ) {

    $scope.account = {}
    $scope.saved = '';
  $scope.init = function(){
    AccountFactory.show().then(function(data) {
        console.log(data);
        $scope.account = data;
        // $scope.account.account_profile = "This is line 1\nThis is line 2"
    });
  }
  $scope.init(); 

  $scope.save = function(data) {
    console.log(data);
    var dataObject = {
      account_profile : data
    } 

    AccountFactory.updateProfile(data).then(function(data) {

      $scope.saved = 'saved'
      $timeout(function(){ $scope.saved = ''; }, 3000);
    })
  }  

}])


// /* this bit */
// AngularBonfire.directive('markdowndisplay', function(theService) {
//     return {
//         restrict: 'E',
//         // scope: {username: '@myAttr'},
//         controller: function($scope, $attrs, $q, AccountFactory, markdownBroadcast) {
//           // This is an antipattern i found useful the last time i did this
//           $scope.list = 'tempdata'
//           var defer = $q.defer() 
//           // I think this show method on the factory is only called once
//           defer.resolve(AccountFactory.show());
//           // this because reasons
//           defer.promise.then(function (data) {
//               $scope.data = data;
          
//               console.log($scope.data);
//               $scope.list = data.account_profile;
//               console.log(data.account_profile);
//               // $scope.list = marked(data.account_profile);
//               // 
//           });

//           // console.log($scope.list);

//             // $scope.$on('handleBroadcast', function() {
//               // var index =  mySharedService.message;
//                  // $scope.display = $scope.list[index] //'Directive: ' + mySharedService.message;
//             // });

//         },
//         replace: true,
//         template: '<article ng-bind-html="list"></article>'
//         // template: '<p><h2>{{display.name}}</h2><p>{{display.list}}</p></article>'
//     };
// });

// AngularBonfire.factory('markdownBroadcast', function($rootScope) {
//     var sharedService = {};

//     sharedService.message = '';

//     sharedService.prepForBroadcast = function(msg) {
//         this.message = msg;
//         this.broadcastItem();
//     };

//     sharedService.broadcastItem = function() {
//         $rootScope.$broadcast('handleBroadcast');
//     };

//     return sharedService;
// });



