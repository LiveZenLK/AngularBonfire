// AngularBonfire.factory("NgActionFactory", function($http, $q) {
//   //this runs the first time the service is injected
//   //this creates the service
//   var factory = {}


//   factory.getAll = function () {

//   	var deferred = $q.defer();
  	
//   	$http.get(AngularBonfireUrl+'/ability/get_profile_abilites_json').then(function(resp) {
//     	deferred.resolve(resp.data);
//  	});

//   	return deferred.promise;
//   };

//   factory.addAbility = function (dataObject) {
  	
//   	var deferred = $q.defer();
  	
//   // 	$http.post(AngularBonfireUrl+'/ability/add/'+dataObject).then(function(resp) {
//  	// });

// 		    var post_data = {
// 		        'form_data': {'name':'reasonable use of globals'},//formData, //formData, // we can now send it along with our request
// 		        // I don't think anyone has ever found a neat way of doing this without inline js
// 		        csrfTokenName : csrfTokenValue
// 		    }
// 		    // so far we have an object we can 'POST' to our form which contains a security token



// $.ajax({
//    url: AngularBonfireUrl+'/ability/add',
//    type: "post",
//    data: post_data,
//    success: function(){
//      // alert("success");
//     	deferred.resolve("success");
//    },
//    error:function(){
//      // alert("failure");
//     	deferred.resolve("failure");
//    }
// });
  		
//   	return deferred.promise;
//   };
  
//   factory.updateAbility = function (id, dataObject) {

//   };

//   factory.deleteAbility = function (id) {

//   };

//   return factory
// });

var NgActionCtrl = AngularBonfire.controller('NgActionCtrl', [
	'$scope', 
	'$state', 
	// 'NgActionFactory', 
	function($scope, $state
		// , NgActionFactory
		) {

	$scope.actions = ''
	$scope.actionFormData = ''

	$state.go('action_interest')
	
	$scope.init = function(){
    // $scope.actions = [
    //   {
    //     "action_name" : "lend",
    //     "image" : "action-lend.png"
    //   },{
    //     "action_name" : "borrow",
    //     "image" : "action-borrow.png"
    //   },{
    //     "action_name" : "buy",
    //     "image" : "action-buy.png"
    //   },{
    //     "action_name" : "sell",
    //     "image" : "action-sell.png"
    //   },{
    //     "action_name" : "forage",
    //     "image" : "action-forage.png"
    //   },{
    //     "action_name" : "gamble",
    //     "image" : "action-gamble.png"
    //   },{
    //     "action_name" : "give",
    //     "image" : "action-give.png"
    //   },{
    //     "action_name" : "take",
    //     "image" : "action-take.png"
    //   },{
    //     "action_name" : "sniff",
    //     "image" : "action-sniff.png"
    //   },{
    //     "action_name" : "smoke",
    //     "image" : "action-smoke.png"
    //   },{
    //     "action_name" : "swallow",
    //     "image" : "action-swallow.png"
    //   },{
    //     "action_name" : "imbibe",
    //     "image" : "action-imbibe.png"
    //   },{
    //     "action_name" : "plant",
    //     "image" : "action-plant.png"
    //   },{
    //     "action_name" : "harvest",
    //     "image" : "action-harvest.png"
    //   },{
    //     "action_name" : "mix",
    //     "image" : "action-mix.png"
    //   },{
    //     "action_name" : "cook",
    //     "image" : "action-cook.png"
    //   }
    // ]
    
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


    console.log($scope.actions)
    // NgAbilityFactory.getAll().then(function(data) {
        // console.log(data)
        // $scope.abilities = data
		// })

    $scope.doAction = function(actionName){
      var foo = 'action_'+actionName;
      console.log(foo);
        $state.go(foo)

    }
  }
  $scope.init()


}]);

AngularBonfire.config(['$stateProvider', '$urlRouterProvider', 
    function ($stateProvider, $urlRouterProvider ) {
	    
		var action_interest = { 
		    name: 'action_interest', 
		    views:{
            	'content':{
		    		templateUrl: AngularBonfireUrl+'/action/interest'
            // templateUrl: AngularBonfireUrl+'/ability/ability_list'
            // template: 'action interest'
            	},
              'list':{
            templateUrl: AngularBonfireUrl+'/action/action_list'
              }
            }
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
              },
              'list':{
            templateUrl: AngularBonfireUrl+'/action/action_list'
              }
            }
    };


		$stateProvider
        .state(action_interest) // namespacing is important here since we extending the sidewide AngularBonfire object
        // .state(action_list) // namespacing is important here since we extending the sidewide AngularBonfire object
	  		.state(action_character) // namespacing is important here since we extending the sidewide AngularBonfire object
		;
}]);



