
 var nameApp = angular.module('nameApp',['ngRoute']);
 
 
      nameApp.config(function($routeProvider) {
	  console.log($routeProvider);
	 
        $routeProvider.
          when('/', {
            template: '<ul><li ng-repeat="country in countries">{{country.name}}</li><ul>',
            controller: 'CountryObjCtrl'
          }).
          when('/:countryName', {
            template: '<h1>TODO create country detail view</h1>',
            controller: 'CountryDetailCtrl'
          }).
          otherwise({
            redirectTo: '/'
          });
      });
 
	  nameApp.controller('NameCtrl', function($scope){
		$scope.firstName = "Venu";
		$scope.lastName = "Gopal";

		
	  });
	  
	// Get all country list...
	nameApp.controller('ContactCtrl', function($scope){
		//$scope.firstName = "Venu";
		//$scope.lastName = "Gopal";
		$scope.names = ['venu','gopal','reddy'];
		
		//add to list
		$scope.addName = function() {
          $scope.names.push($scope.enteredName);
		  $scope.enteredName='';
        };
		
		//remove from list..
		$scope.removeName = function(name) {
          var i = $scope.names.indexOf(name);
          $scope.names.splice(i, 1);
        };
		
	  });

	//Object notation...
	nameApp.controller('CountryObjCtrl', function ($scope){
        $scope.countries = [
          {"name": "China", "population": 1359821000},
          {"name": "India", "population": 1205625000},
          {"name": "United States of America","population": 312247000}
        ];
      });
 //var file_path = APPPATH + 'third_party/countries.json';
 
 //get the data from database.....
	nameApp.controller('CountriesCtrl', function ($scope, $http){
        $http.get("get_countries").success(function(data) {
          $scope.countries_list = data;
        });
		
		 $scope.sortField = 'COUNTRY_SHORTNAME';
		  $scope.reverse = true;
      });

	nameApp.controller('CountryDetailCtrl', function ($scope, $routeParams){
        console.log($routeParams);
      });	  