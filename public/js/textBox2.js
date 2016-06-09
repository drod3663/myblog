(function() {
	"use strict";

	var app = angular.module("textBox2", []);

	
    app.controller('TextController', ['$scope', function($scope) {
      $scope.action = [];
      $scope.submit = function() {
        if ($scope.text) {
          $scope.action.push(this.text);
          $scope.text = '';
        }
      };
    }]);

})();