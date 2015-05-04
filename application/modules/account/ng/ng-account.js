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

  factory.updateLocation = function (data) {

    var deferred = $q.defer();

    var post_data = {
      'location' : data, 
      'ci_csrf_token'   : ci_csrf_token()
    }
    console.log('updateLocation post_data: ',post_data)
  
    // so far we have an object we can 'POST' to our form which contains a security token
    $.post(AngularBonfireUrl+'/api/account/updatelocation', post_data).done(function(sdf){
        console.log('saved', sdf)
        deferred.resolve('done')
    })

    return deferred.promise

  }

  factory.deleteAbility = function (id) {
  }

  return factory
})



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
            templateUrl: AngularBonfireUrl+'/account/nglocation',
            controller: 'AccountLocationCtrl'
            },
            'actions':{
            templateUrl: AngularBonfireUrl+'/account/ngimage',
            controller: 'AccountImageCtrl'
            },
           'secondary-actions':{
            templateUrl: AngularBonfireUrl+'/account/ngdocuments',
            controller: 'AccountImageCtrl'
            }
        }
    }

    var account_route_social = { 
        name: 'account_route_social', 
        controller: 'ChatCtrl',
        views:{
            'content':{
            template: 'social content' 
            },
            'status':{
            template: 'social status'
            },
            'actions':{
            templateUrl: AngularBonfireUrl+'/chat/inbox'
            }
        }
    }

    // Easily allows us to activate/deactive states
    $stateProvider
    .state(account_route_interests) 
    .state(account_route_profile) 
    .state(account_route_social) 

}])



