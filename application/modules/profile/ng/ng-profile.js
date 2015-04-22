console.log('ng-profile.js')
AngularBonfire.factory('theService', function() {
return 
	interest : [
		{name: 'chess', desc:'a game with 64 square and 6 variant pieces in two colors 16 per side'},
		{name: 'draughts', desc:'exactly the same but with only on varient peice and power ups '}
		];
});
function FirstCtrl($scope, theService) {
$scope.thing = theService.thing;
$scope.name = "First Controller";
}
function SecondCtrl($scope, theService) {
$scope.someThing = theService.thing;
$scope.name = "Second Controller!";
} 




