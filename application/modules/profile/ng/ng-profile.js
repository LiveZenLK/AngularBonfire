
AngularBonfire.factory('ProfileFactory', function($http, $q) {

  var factory = {}

  factory.getProfile = function (username) {

    var deferred = $q.defer()
    var username = username
    
    // return $http.get(AngularBonfireUrl+'/api/profile/getabilities/'+username)//.then(function(resp) {
    $http.get(AngularBonfireUrl+'/api/profile/getprofile/'+username).then(function(resp) {
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

var ProfileCtrl = AngularBonfire.controller('ProfileCtrl', [
    '$scope', 
    '$state', 
    'ProfileFactory',
    function($scope, $state, ProfileFactory
        ) {

      $scope.th = 'thdjfsk'
      $scope.username = ''
      $scope.profile = {}

      $scope.userInit = function(username) {
                     $scope.username = username;
        ProfileFactory.getProfile(username).then(function(data){
          console.log(data)
          $scope.profile = data

        })
                     // $scope.user = uid;
                     // Get a list of projects for user
        // $scope.projectList($scope.user);
      }
}])