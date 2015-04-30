// The routing and layout controller for the Account section
AngularBonfire.factory("AccountFactory", function($http, $q) {
  //this runs the first time the service is injected
  //this creates the service
  var factory = {}


  factory.show = function () {

    var deferred = $q.defer()
    
    $http.get(AngularBonfireUrl+'/api/account/show').then(function(resp) {
      
      deferred.resolve(resp.data)
    })

    return deferred.promise
  }
  
  factory.updateProfile = function (data) {

    var deferred = $q.defer();

    var post_data = {
      'account_profile' : data, 
      'ci_csrf_token'   : ci_csrf_token()
    }
  
    // so far we have an object we can 'POST' to our form which contains a security token
    $.post(AngularBonfireUrl+'/api/account/updateprofile', post_data).done(function(sdf){
        console.log('saved', sdf)
        deferred.resolve('done')
    })

    return deferred.promise

  }

  factory.deleteAbility = function (id) {
  }

  return factory
})


var AccountImageCtrl = AngularBonfire.controller('AccountImageCtrl', ['$scope', 'Upload', 'AccountFactory', function ($scope, Upload, AccountFactory) {
    $scope.$watch('files', function () {
        $scope.upload($scope.files);
    });

    $scope.image = {}
    
    $scope.init = function(){
      AccountFactory.show().then(function(data) {
        console.log(data);
        $scope.image = data.image_path
      });
    }
    $scope.init();

    $scope.upload = function (files) {
        if (files && files.length) {
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                Upload.upload({
                    url: AngularBonfireUrl+'/account/do_upload',
                    headers: {'Content-Type': file.type},
                    method: 'POST',
                    fileFormDataName: 'userfile', 
                    fields: {ci_csrf_token: ci_csrf_token(), userfile: file},
                    file: file
                }).progress(function (evt) {
                    var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
                    console.log('progress: ' + progressPercentage + '% ' + evt.config.file.name);
                }).success(function (data, status, headers, config) {
                    console.log('file ' + config.file.name + 'uploaded. Response: ' + data);

                });
            }
        }
    };
}]);

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





/* this bit */
AngularBonfire.directive('markdowndisplay', function(theService) {
    return {
        restrict: 'E',
        // scope: {username: '@myAttr'},
        controller: function($scope, $attrs, $q, AccountFactory, markdownBroadcast) {
          // This is an antipattern i found useful the last time i did this
          $scope.list = 'tempdata'
          var defer = $q.defer() 
          // I think this show method on the factory is only called once
          defer.resolve(AccountFactory.show());
          // this because reasons
          defer.promise.then(function (data) {
              $scope.data = data;
          
              console.log($scope.data);
              $scope.list = data.account_profile;
              console.log(data.account_profile);
              // $scope.list = marked(data.account_profile);
              // 
          });

          // console.log($scope.list);

            // $scope.$on('handleBroadcast', function() {
              // var index =  mySharedService.message;
                 // $scope.display = $scope.list[index] //'Directive: ' + mySharedService.message;
            // });

        },
        replace: true,
        template: '<article ng-bind-html="list"></article>'
        // template: '<p><h2>{{display.name}}</h2><p>{{display.list}}</p></article>'
    };
});

AngularBonfire.factory('markdownBroadcast', function($rootScope) {
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





















var NgAccountCtrl = AngularBonfire.controller('NgAccountCtrl', [
    '$scope', 
    '$state', 
  'AccountFactory',
    function($scope, $state, AccountFactory
        ) {

        // $scope.abilityFormData = {};
  
  // console.log('NgAccountCtrl')
  
  // The routes as used in the menu
  $scope.routes = [
    {
      "account_route" : "account_route_interests",
      "name"          : "Interests",
      "image"         : "interests.png"
    },{
      "account_route" : "account_route_profile",
      "name"          : "Profile",
      "image"         : "character.png"
    },{
      "account_route" : "account_route_social",
      "name"          : "Social",
      "image"         : "items.png"
    }
  ]
    
    $state.go('account_route_profile')
  // Changes the current active route
  // $scope.doRoute = function(actionName){
    // var route = 'account_route_' + actionName
  // }

}])

AngularBonfire.config(['$stateProvider', '$urlRouterProvider', 
    function ($stateProvider, $urlRouterProvider ) {
        
    // namespacing is important here since we extending the sidewide AngularBonfire object 
    // for instance we may need an interests route in the profile section
    var account_route_interests = { 
        name: 'account_route_interests', 
        controller: 'NgAbilityCtrl',
        views:{
            'content':{
            templateUrl: AngularBonfireUrl+'/ability/nglist'
            },
            'status':{
            templateUrl: AngularBonfireUrl+'/ability/ngstatus'
            },
            'actions':{
            templateUrl: AngularBonfireUrl+'/ability/ngactions',
            }
        }
    }

    var account_route_profile = { 
        name: 'account_route_profile', 
        controller: 'NgAccountCtrl',
        views:{
            'content':{
            templateUrl: AngularBonfireUrl+'/account/ngaboutme',
            controller: 'AccountProfileCtrl'
            },
            'status':{
            templateUrl: AngularBonfireUrl+'/account/nglocation'
            },
            'actions':{
            templateUrl: AngularBonfireUrl+'/account/ngimage'
            }
        }
    }

    var account_route_social = { 
        name: 'account_route_social', 
        views:{
            'content':{
            template: 'social content' 
            },
            'status':{
            template: 'social status'
            },
            'actions':{
            template: 'social actions'
            }
        }
    }

    // Easily allows us to activate/deactive states
    $stateProvider
    .state(account_route_interests) 
    .state(account_route_profile) 
    .state(account_route_social) 

}])



