// the router

var NgActionCtrl = AngularBonfire.controller('NgActionCtrl', [
    '$scope', 
    '$state', 
    function($scope, $state
        ) {

  $scope.actions = [
    {
      "action_name" : "interest",
      "image" : "action-lend.png"
    },{
    //   "action_name" : "conversation",
    //   "image" : "action-lend.png"
    // },{
      "action_name" : "character",
      "image" : "action-lend.png"
    }
  ];
    

  $scope.doAction = function(actionName){
    var route = 'action_'+actionName;
    $state.go(route)

  }
}]);

AngularBonfire.config(['$stateProvider', '$urlRouterProvider', 
    function ($stateProvider, $urlRouterProvider ) {
        
        var action_interest = { 
            name: 'action_interest', 
            controller: 'NgAbilityCtrl',
            views:{
                'content':{
                templateUrl: AngularBonfireUrl+'/ability/nglist',
                },
                'status':{
                templateUrl: AngularBonfireUrl+'/ability/ngstatus'
                },
                'actions':{
                templateUrl: AngularBonfireUrl+'/ability/ngactions',
                // controller: 'NgAbilityCtrl'
                }
            }
            //   'list':{
            // // templateUrl: AngularBonfireUrl+'/action/action_list'
            //   }
          };

    // var action_conversation = { 
    //     name: 'action_conversation', 
    //     views:{
    //           'content':{
    //         templateUrl: AngularBonfireUrl+'/action/action_conversation'
    //           },
    //           'list':{
    //         templateUrl: AngularBonfireUrl+'/action/action_list'
    //           }
    //         }
    // };

        var action_character = { 
        name: 'action_character', 
        views:{
              'content':{
            // templateUrl: AngularBonfireUrl+'/action/action_character'
            template: 'action character'
              }
            }
    };


        $stateProvider
        .state(action_interest) // namespacing is important here since we extending the sidewide AngularBonfire object
        // .state(action_list) // namespacing is important here since we extending the sidewide AngularBonfire object
            .state(action_character) // namespacing is important here since we extending the sidewide AngularBonfire object
        ;
}]);



