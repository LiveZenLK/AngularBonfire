// The routing and layout controller for the Account section
AngularBonfire.factory("AccountFactory", function($http, $q) {
  //this runs the first time the service is injected
  //this creates the service
  var factory = {}


  factory.show = function () {

    var deferred = $q.defer()
    
    $http.get(AngularBonfireUrl+'/account/show').then(function(resp) {
      
      deferred.resolve(resp.data)
    })

    return deferred.promise
  }
  
  // factory.updateAbility = function (id, dataObject) {

  //   var deferred = $q.defer();

  //   var post_data = {
  //     'item_ref'      : id,
  //     'form_data'     : dataObject, 
  //     'ci_csrf_token' : ci_csrf_token()
  //   }
  
  //   // so far we have an object we can 'POST' to our form which contains a security token
  //   $.post(AngularBonfireUrl+'/ability/update', post_data).done(function(sdf){
  //       console.log('saved', sdf)
  //       deferred.resolve('done')
  //   })

  //   return deferred.promise

  // }

  // factory.deleteAbility = function (id) {
  // }

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

var AccountProfileCtrl = AngularBonfire.controller('AccountProfileCtrl', ['$scope', '$state', 
  'AccountFactory',
  function($scope, $state
    , AccountFactory
    ) {

    $scope.account = {}
  $scope.init = function(){
    AccountFactory.show().then(function(data) {
        console.log(data);
        $scope.account = data;
    });
  }
  $scope.init(); 

}])


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



