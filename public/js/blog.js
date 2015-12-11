(function() {
    "use strict";

    // This should be the actual name of your module
    var app = angular.module("blog", []);

    // Find the token value from the page using jQuery
    const TOKEN = $("meta[name=csrf-token]").attr("content");
    
    // Set the token as an Angular constant
    app.constant("CSRF_TOKEN", TOKEN);
    
    // Configure $http to include both your token and a flag indicating the request is AJAX
    app.config(["$httpProvider", "CSRF_TOKEN", function($httpProvider, CSRF_TOKEN) {
        $httpProvider.defaults.headers.common["X-Csrf-Token"] = CSRF_TOKEN;
        $httpProvider.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
    }]);

    app.controller("ManageController", ['$scope', '$log', '$http', function($scope, $log, $http ) {
        $scope.posts = [];

        $http.get('/posts/list').then(function(response) {
            $log.info("Post list success response");

            $log.debug(response);
        $scope.posts = response.data;
        }, function(response) {
            $log.error("Post list error response");

            $log.debug(response);
        });

        $scope.deletePost = function (index) {
            var id = $scope.posts[index].id;

            $http.delete('/posts/' + id).then(function (response) {
                $log.info("Post successfully deleted");

                $scope.posts.splice(index, 1);
            }, function (response) {
                $log.error("Post failed to delete");

                $log.debug(response);
            });
        };

    }]);  
})();