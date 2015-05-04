var AccountLocationCtrl = AngularBonfire.controller('AccountLocationCtrl', ['$scope', '$state', '$timeout',
  'AccountFactory',
  function($scope, $state, $timeout
    , AccountFactory
    ) {

    $scope.location = {}
    $scope.saved = '';
  
    $scope.init = function(){
      AccountFactory.show().then(function(data) {
          console.log(data);
          $scope.location = data.location;
          // $scope.account.account_profile = "This is line 1\nThis is line 2"
      });
    }
    $scope.init(); 

  $scope.saveLocation = function(data) {
    console.log('location scope', data);
    var dataObject = {
      location : data
    } 

    AccountFactory.updateLocation(data).then(function(data) {

      $scope.saved = 'saved'
      $timeout(function(){ $scope.saved = ''; }, 3000);
    })
  }  

}])



AngularBonfire.directive( 'weather', function(
  $stateParams
  ) {
    // here, it returns an object
    return {
      // each key value of an object is called a property
      restrict: 'AE',
      // they can be used to set configurations
      replace: true,
      // they can reference
      // eg: function(data){ this.replace || !this.replace; if (this.replace){/*game*/'is useful place to use a semi colon' },
      // and become pasta. They remind me of _
      // chain: function(data){ calledFunction.chain(calledFunction(replace: calleddFunction.eg())} 
      template: '<div id="weather" class="show-weather">unknown, location</div>',
      scope: {
        details: '@details' //'Aberdeen, Scotland'
      },
      link: function(scope, elem, attrs){ theOnlyGlobal.WeatherDirectiveCtrl(scope, elem, attrs) }
    }
        //

  })

// var WeatherDirectiveCtrl = function(scope, elem, attrs){
theOnlyGlobal.WeatherDirectiveCtrl = function(scope, elem, attrs){
    console.log('weather: ',scope);
    var location = ''//scope.details;
    // console.log(location);
    // observing interpolated attributes
    attrs.$observe('details',function(){
      console.log(' notice where this logs:',attrs.details);
      location = attrs.details
      console.log(location);
      $.simpleWeather({
            location: location,
            //     woeid: '',
            unit: 'f',
            success: function(weather) {
              // html = '<div class=<h2><i class="icon-'+weather.code+'"></i> </h2><p>'+weather.temp+'&deg;'+weather.units.temp+'</p>'
              html = '<h2><i class="icon-'+weather.code+'"></i> '+weather.temp+'&deg;'+weather.units.temp+'</h2>'
              // html += '<ul><li>'+weather.city+', '+weather.region+'</li>'
              // html += '<li class="currently">'+weather.currently+'</li>'
              // html += '<li>'+weather.wind.direction+' '+weather.wind.speed+' '+weather.units.speed+'</li></ul>'
              $(".show-weather").html(html);
            },
            error: function(error) {
              $(".show-weather").html('<p>'+error+'</p>');
            }
      }) //*$.simpleWeather*/
    }) //*attrs.$observe
}

// Docs at http://simpleweatherjs.com
// $(document).ready(function() {
//   $.simpleWeather({
//     location: 'Austin, TX',
//     woeid: '',
//     unit: 'f',
//     success: function(weather) {
//       html = '<h2><i class="icon-'+weather.code+'"></i> '+weather.temp+'&deg;'+weather.units.temp+'</h2>';
//       html += '<ul><li>'+weather.city+', '+weather.region+'</li>';
//       html += '<li class="currently">'+weather.currently+'</li>';
//       html += '<li>'+weather.wind.direction+' '+weather.wind.speed+' '+weather.units.speed+'</li></ul>';
  
//       $("#weather").html(html);
//     },
//     error: function(error) {
//       $("#weather").html('<p>'+error+'</p>');
//     }
//   });
// });


/*
  Docs at http://http://simpleweatherjs.com

  Look inspired by http://www.degreees.com/
  Used for demo purposes.

  Weather icon font from http://fonts.artill.de/collection/artill-weather-icons

  DO NOT hotlink the assets/font included in this demo. If you wish to use the same font icon then download it to your local assets at the link above. If you use the links below odds are at some point they will be removed and your version will break.
*/
