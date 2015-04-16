// The routing and layout controller for the Account section

var NgAccountCtrl = AngularBonfire.controller('NgAccountCtrl', [
    '$scope', 
    '$state', 
    function($scope, $state
        ) {
  
  // console.log('NgAccountCtrl')
  
  // The routes as used in the menu
  $scope.routes = [
    {
      "account_route" : "interests",
      "name"          : "Interests",
      "image"         : "interests.png"
    },{
      "account_route" : "items",
      "name"          : "Items",
      "image"         : "items.png"
    },{
      "account_route" : "character",
      "name"          : "Character",
      "image"         : "character.png"
    }
  ]
    
  // Changes the current active route
  $scope.doRoute = function(actionName){
    var route = 'account_route_' + actionName
    $state.go(route)
  }

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

    var account_route_items = { 
        name: 'account_route_items', 
        views:{
            'content':{
            template: 'items content' 
            },
            'status':{
            template: 'items status'
            },
            'actions':{
            template: 'items actions'
            }
        }
    }

    var account_route_character = { 
        name: 'account_route_character', 
        views:{
            'content':{
            template: 'character content' 
            },
            'status':{
            template: 'character status'
            },
            'actions':{
            template: 'character actions'
            }
        }
    }

    // Easily allows us to activate/deactive states
    $stateProvider
    .state(account_route_interests) 
    .state(account_route_items) 
    .state(account_route_character) 

}])



