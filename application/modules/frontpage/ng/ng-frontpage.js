AngularBonfire.factory("FrontpageFactory", function($http, $q) {
  //this runs the first time the service is injected
  //this creates the service
  var factory = {}


  factory.getAll = function () {

  	var deferred = $q.defer()
  	
  	$http.get(AngularBonfireUrl+'/api/frontpage/getstuff').then(function(resp) {
    	
      deferred.resolve(resp.data)
 	  })

  	return deferred.promise
  }
  return factory
 })


  
console.log('moving')
var CloudCtrl = AngularBonfire.controller('CloudCtrl', ['$scope', '$animate', 'FrontpageFactory',
    function($scope, $animate, FrontpageFactory
    	) {
	
	// $scope.keepArray = false; //{skill:'',value:'0'}
	
	$scope.debug = 'CloudCtrl';

 
	// if word inArray is truthy push array to array

	console.log(_)
	
	// $scope.activeFilters = [];

	// $scope.users =  [

	// 		{	"username": "franz-kafka",
	// 			"skills": [
	// 			{"name":"polite"},
	// 			{"name":"javascript"},
	// 			{"name":"insurance broker"},
	// 			{"name":"design"}
	// 			]
	// 		},
	// 		{	"username":"me",
	// 			"skills": [
	// 			{"name":"hardworking"},
	// 			{"name":"sewing"},
	// 			{"name":"javascript"},
	// 			{"name":"information architecture"}
	// 			]
	// 		},
	// 		{
	// 			"username": "another-user",
	// 			"skills": [
	// 			{"name":"hardworking"},
	// 			{"name":"design"},
	// 			{"name":"italian"},
	// 			{"name":"javascript"},
	// 			]
	// 		},
	// 		{
	// 			"username": "more-data",
	// 			"skills": [
	// 			{"name":"hardworking"},
	// 			{"name":"design"},
	// 			]
	// 		},
	// 		{
	// 			"username": "even-more",
	// 			"skills": [
	// 			{"name":"javascript"},
	// 			{"name":"design"},
	// 			{"name":"polite"}
	// 			]
	// 		}
	// 	];

	$scope.activeUsers = []
	$scope.skills = [];
	$scope.filters = [];
	$scope.init = function(){
		console.log('init')
		FrontpageFactory.getAll().then(function(data){
			$scope.users = data; // cache users object
			console.log($scope.users)
			$scope.gatherSkills($scope.users)
		})
	};


	// returns array of skill object values
	$scope.gatherSkills = function(users){
		// console.log(users)
		// if($scope.filters.length < 0){
		// 	console.log('filterUsers()');
		// } 
		console.log('called');
		$scope.skills = [];
		var gather = function(user){
			var skills = _.map(user.skills, function(value,key){
                return value
            })

            console.log(skills);
			_.each(skills, function(input){
				$scope.countSkills(input.name);
			});
			console.log($scope.skills);
		}
		_.each(users, gather);
		console.log('all skills', $scope.skills)
	};

			// $scope.gatherSkills($scope.users );
	// Checks to see if the skill exists
	// if false adds the skill to the array
	// if true increments the counter for the skill
	$scope.countSkills = function(input){ 
		var existingSkill = _.contains(_.pluck($scope.skills, 'text'), input);
		var filteredSkill = _.contains($scope.filters, input);

		if(!existingSkill && !filteredSkill){ // 
			var thing = {
				text: input, 
				weight: 1, 
				link: { href: "#", title: input}
			}

			$scope.skills.push(thing);
		}
		else if(!filteredSkill){ // really inefficient i think 
			_.select($scope.skills, function(obj){

			    if (obj.text === input){
			    	obj.weight = ++obj.weight;
			    }; 
					    
			});

		}
	};

	$scope.addFilter = function(filter){
		$scope.filters.push(filter); 
		// console.log('1',$scope.filters);
		$scope.filterUsers($scope.filters);
	}
	$scope.removeFilter = function(filter){
		$scope.filters = _.without($scope.filters, filter);
		// console.log($scope.filters)
		$scope.filterUsers($scope.filters);
		
	}
	$scope.filterUsers = function(filters){
		var users = $scope.users ;
		var result = [];
		
		var numberOfFilters = filters.length;
		// console.log('numberOfFilters',numberOfFilters)
		
		// iterate over user
		_.each(users, function(user){
			// console.log('---------------', user, '------------------')
			var hasSkill = 0; // set skills to zero
			// iterate over skills array	
			_.each(user.skills, function(skill){
				// console.log('4',skill.name)
				// if(_.contains(filters, skill.name)){
				if(_.contains(filters, skill.name)){
					hasSkill = ++hasSkill
					// console.log('true', hasSkill);
				}
			});
			if(hasSkill === numberOfFilters){
					result.push(user)
			}
		})
		$scope.activeUsers = result;
		// console.log('6', $scope.activeUsers)
		$scope.gatherSkills(result);
	}

	$scope.init();

  
}]);
