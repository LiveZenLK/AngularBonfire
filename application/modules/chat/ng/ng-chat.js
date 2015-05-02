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
  ['$scope', '$state', '$timeout','ChatFactory',
  function($scope, $state, $timeout, ChatFactory) {

  console.log('go')
  $scope.messages = {}

  var init = function() {
    ChatFactory.messages().then(function(data) {
      console.log(data)
      $scope.messages = data //'Message Delivered'
       // $timeout(function(){ $scope.success = ''; }, 3000)
    })
  } 
  init();

  $scope.reply = function(destination){
    console.log(destination);
  }
}])