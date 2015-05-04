AngularBonfire.factory("ChatWidgetFactory", function($http, $q) {

  var factory = {}

  factory.sendMessage = function (data) {

    var deferred = $q.defer()

    var post_data = {
        'form_data'     : data, 
        'ci_csrf_token' : ci_csrf_token() // a built globabl function defined by CI_Bonfire
    }
  
    console.log(post_data)
    $.post(AngularBonfireUrl+'/api/chat/sendmessage', post_data).then(function(resp) {
      
      deferred.resolve(resp.data)
    })

    return deferred.promise
  }

  return factory

})
AngularBonfire.factory("ChatFactory", function($http, $q) {
  var factory = {}

  factory.messages = function () {

    var deferred = $q.defer()
  
    $http.get(AngularBonfireUrl+'/api/chat/messages').then(function(resp) {
      
      deferred.resolve(resp.data)
    })

    return deferred.promise
  }

    factory.sendReply = function (recipient, message) {

    var deferred = $q.defer()

    var post_data = {
        'recipient'     : recipient, 
        'message'       :   message, 
        'ci_csrf_token' : ci_csrf_token() // a built globabl function defined by CI_Bonfire
    }
  
    console.log(post_data)
    $.post(AngularBonfireUrl+'/api/chat/sendreply', post_data).then(function(resp) {
      
      deferred.resolve(resp.data)
    })

    return deferred.promise
  }

  return factory
})

// var ChatWidgetCtrl = AngularBonfire.controller('ChatWidgetCtrl', 
//   ['$scope', '$state', '$timeout','ChatWidgetFactory',
//   function($scope, $state, $timeout, ChatWidgetFactory) {

//     $scope.account = {}
//     $scope.saved = '';
//   $scope.init = function(){
//     AccountFactory.show().then(function(data) {
//         console.log(data);
//         $scope.account = data;
//         // $scope.account.account_profile = "This is line 1\nThis is line 2"
//     });
//   }
//   $scope.init(); 

//   $scope.save = function(data) {
//     console.log(data);
//     var dataObject = {
//       account_profile : data
//     } 

//     AccountFactory.updateProfile(data).then(function(data) {

//       $scope.saved = 'saved'
//       $timeout(function(){ $scope.saved = ''; }, 3000);
//     })
//   }  

// }])

var ChatWidgetCtrl = AngularBonfire.controller('ChatWidgetCtrl', 
  ['$scope', '$state', '$timeout','ChatWidgetFactory',
  function($scope, $state, $timeout, ChatWidgetFactory) {

  $scope.success = ''
  $scope.formData = {}

  $scope.send = function() {
    console.log($scope.formData)
    ChatWidgetFactory.sendMessage($scope.formData).then(function(data) {
       $scope.success = 'Message Delivered'
       $timeout(function(){ $scope.success = ''; }, 3000)
    })
  } 
}])



var ChatCtrl = AngularBonfire.controller('ChatCtrl', 
  ['$scope', '$state', '$timeout','ChatFactory','ChatReplyService',
  function($scope, $state, $timeout, ChatFactory, ChatReplyService) {

  console.log('go')
  $scope.messages = {}
  $scope.replyDestination = ''

  var init = function() {
    ChatFactory.messages().then(function(data) {
      console.log(data)
      $scope.messages = data //'Message Delivered'
       // $timeout(function(){ $scope.success = ''; }, 3000)
    })
  } 
  init();

  $scope.reply = function(destination){
    ChatReplyService.prepForBroadcast(destination)
    ChatReplyService.broadcastItem()
  }
  $scope.send = function(destination, message){
    console.log(destination, message);
      ChatFactory.sendReply(destination, message).then(function(data) {
       $scope.success = 'Message Delivered'
       $timeout(function(){ $scope.success = ''; ChatReplyService.broadcastSent()}, 3000)
    })
  }
}])


/* this bit */
AngularBonfire.directive('owl', function(theService) {
    return {
        restrict: 'E',
        scope: {username: '@myAttr'},
        controller: function($scope, $attrs, $q, ChatReplyService) {
          // var username = $scope.username
          // var defer = $q.defer() 
          // defer.resolve(theService.getAllByUsername(username));
          // defer.promise.then(function (data) {
              // $scope.data = data;
              // console.log($scope.data);
          // $scope.list = data 
          // });
          console.log($scope);

            $scope.$on('handleBroadcast', function() {
                $scope.destination = ChatReplyService.message;
                  //'Directive: ' + mySharedService.message;
                  console.log($scope.destination)
            });
            $scope.$on('handleSent', function() {
                $scope.destination = '';
                $scope.message = '';
                  //'Directive: ' + mySharedService.message;
                  console.log($scope.destination)
            });

        },
        replace: true,
        template: theOnlyGlobal.owlTemplate//'<article><h4>You are replying to {{destination}}</h4></article>'
        // template: '<p><h2>{{display.name}}</h2><p>{{display.list}}</p></article>'
    };
});

theOnlyGlobal.owlTemplate = 

'<form >'
+'<article class="owl"><h4>You are replying to <input type="text" ng-model="destination"  value="destination" ></h4>'
+''
+'<textarea placeholder="message to {{destination}}" ng-model="message"></textarea>'
+'<input ng-controller="ChatCtrl" ng-click="send(destination, message)" type="submit" class="button" value="Send"/>'
+'</form><h2>{{success}}</h2></article>'

AngularBonfire.factory('ChatReplyService', function($rootScope) {
    var sharedService = {};

    sharedService.message = '';

    sharedService.prepForBroadcast = function(msg) {
        this.message = msg;
        // this.broadcastItem();
    };

    sharedService.broadcastSent = function(msg) {
        $rootScope.$broadcast('handleSent');
    };

    sharedService.broadcastItem = function() {
        $rootScope.$broadcast('handleBroadcast');
    };

    // sharedService.data = ''

    return sharedService;
});

// AngularBonfire.factory('ChatOwls', function())

// first 

// border-top:

// each square is a div of 8X8
// k

// lets try 100 of them

// .square.top-row.left.top.{ 2px,0px,0px,2px;}
// .square.top-row.left.top.{ 0px,0px,0px,2px;}
// .square.top-row.left.top.right{ 
// .square.top-row.left.top.bottom
// .square.top-row.left.top.right.bottom{
// .square.top.row.right
// .square.top.row.right.top
// .square.top.row.right.top.bottom
// .square.top-row.top.{
// .square.top-row.top.bottom{
// .square.top-row.bottom{



// .square.top-row.bottom.full{
//   border-top:2px;




// if a1 {x,x,x,x,}
// abcdefgh
//   top:    [a1, a2, a3, a4, a5, a6, a7, a8]  
//   bottom: [h1, h2, h3, h4, h5, h6, h7, h8]
//   left:   [a1, b1, c1, d1, e1, f1, g1, h1]
//   right:  [a8, b8, c8, d8, e8, f8, g8, h8] 


// #The Board
// ```
// [a1, a2, a3, a4, a5, a6, a7, a8]
// [b1, b2, b3, b4, b5, b6, b7, b8]
// [c1, c2, c3, c4, c5, c6, c7, c8]
// [d1, d2, d3, d4, d5, d6, d7, d8]
// [e1, e2, e3, e4, e5, e6, e7, e8]
// [f1, f2, f3, f4, f5, f6, f7, f8]
// [g1, g2, g3, g4, g5, g6, g7, g8]
// [h1, h2, h3, h4, h5, h6, h7, h8]
// ```

// .#..#..#..#..#..#..#..#.
// .#..#..#..#..#..#..#..#.
// .#..#..#..#..#..#..#..#.
// .#..#..#..#..#..#..#..#.
// .#..#..#..#..#..#..#..#.
// .#..#..#..#..#..#..#..#.
// .#..#..#..#..#..#..#..#.
// .#..#..#..#..#..#..#..#.

// #\\#\\#\\#\\#\\#\\#\\#\\ 
// \\#\\#\\#\\#\\#\\#\\#\\#
// #\\#\\#\\#\\#\\#\\#\\#\\ 
// \\#\\#\\#\\#\\#\\#\\#\\#
// #\\#\\#\\#\\#\\#\\#\\#\\ 
// \\#\\#\\#\\#\\#\\#\\#\\#
// #\\#\\#\\#\\#\\#\\#\\#\\ 
// \\#\\#\\#\\#\\#\\#\\#\\#
// #\\#\\#\\#\\#\\#\\#\\#\\



// [X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]

// [X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]
// [X] [X][X][-][-][-][-][X][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]
// [-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-]
// [-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-]
// [-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-]
// [-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-]
// [X] [X][X][-][-][-][-][X][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]
// [X] [X][X][-][-][-][-][X][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]

// [X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]
// [X] [X][X][-][-][-][-][X][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]
// [-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-]
// [-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-]
// [-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-]
// [-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-]
// [X] [X][X][-][-][-][-][X][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]
// [X] [X][X][-][-][-][-][X][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]

// [X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]
// [X] [X][X][-][-][-][-][X][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]
// [-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-]
// [-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-]
// [-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-]
// [-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-]
// [X] [X][X][-][-][-][-][X][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]
// [X] [X][X][-][-][-][-][X][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]

// [X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]
// [X] [X][X][-][-][-][-][X][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]
// [-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-][-] [-]
// [-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-][-] [-]
// [-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-][-] [-]
// [-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-][-] [-]
// [X] [X][X][-][-][-][-][X][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]
// [X] [X][X][-][-][-][-][X][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]

// [X] [X][X][-][-][-][-][X][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]


// XXX X=X XXX XXX
// XXX XXX XX= =XX
// XXX XXX XXX X=X

// XXX XXX XXX XXX
// XX= =XX XXX XXX
// X=X XXX XXX X=X

// X== XXX XXX X=X
// XX= =X= =XX XX=
// XXX XXX XXX XXX

// XXX X=X XXX XXX
// XXX XXX XX= =X=
// X=X X=X X=X XXX

// X=X X=X X=X XXX
// =X= =XX XX= =X=
// X=X X=X X=X X=X



// [X] [X][X][-][-][-][-][x][X] [X][X][=][=][=][=][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]

// [X] [X][X][-][-][-][-][x][X] [X][X][=][=][=][=][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]
// [X] [X][X][-][-][-][-][X][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]
// [-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][=] [=][-][-][-][-][-][-][-] [-]
// [-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][=] [=][-][-][-][-][-][-][-] [-]
// [-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][=] [=][-][-][-][-][-][-][-] [-]
// [-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][=] [=][-][-][-][-][-][-][-] [-]
// [X] [X][X][-][-][-][-][X][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]
// [X] [X][X][-][-][-][-][X][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][=][=][=][=][x][X] [X]

// [X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][=][=][=][=][x][X] [X]
// [X] [X][X][-][-][-][-][X][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]
// [=] [=][-][-][-][-][-][-][=] [=][-][-][-][-][-][-][=] [=][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-]
// [=] [=][-][-][-][-][-][-][=] [=][-][-][-][-][-][-][=] [=][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-]
// [=] [=][-][-][-][-][-][-][=] [=][-][-][-][-][-][-][=] [=][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-]
// [=] [=][-][-][-][-][-][-][=] [=][-][-][-][-][-][-][=] [=][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-]
// [X] [X][X][-][-][-][-][X][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]
// [X] [X][X][=][=][=][=][X][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][=][=][=][=][x][X] [X]

// [X] [X][X][=][=][=][=][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][=][=][=][=][x][X] [X]
// [X] [X][X][-][-][-][-][X][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]
// [-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][=] [=]
// [-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][=] [=]
// [-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][=] [=]
// [-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][=] [=]
// [X] [X][X][-][-][-][-][X][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]
// [X] [X][X][-][-][-][-][X][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]

// [X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]
// [X] [X][X][-][-][-][-][X][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]
// [-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-][=] [=]
// [-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-][=] [=]
// [-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-][=] [=]
// [-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-] [-][-][-][-][-][-][-] [-][-][-][-][-][-][-][-][=] [=]
// [X] [X][X][-][-][-][-][X][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X]
// [X] [X][X][-][-][-][-][X][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][=][=][=][=][x][X] [X]

// [X] [X][X][-][-][-][-][X][X] [X][X][-][-][-][-][x][X] [X][X][-][-][-][-][x][X] [X][X][=][=][=][=][x][X] [X]




