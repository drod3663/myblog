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

    app.controller("ManageController", ["$http", "$log", "$scope", function($http, $log, $scope) {

        $scope.posts = [];

        $http.get('/posts/list').then(function(response) {

            $scope.posts = response.data;

            $log.info("Post list success response.");

            $log.info(response);

        }, function(response) {
            $log.error("Post list error response!");

            $log.debug(response);
        });

        $scope.deletePost = function(id) {

            $http.delete('/posts/' + id).then(function(id, index) {

                $scope.posts.splice(index +1, 1);

                $log.info("Post Delete Successful");

            }, function(response) {
                $log.error("Delete Not Successful.");

                $log.debug(response);
            });
        };

        $scope.open = function(index) {
            $scope.post = $scope.posts[index];
            $('#modal').modal('show');

        };


        $scope.editPost = function() {

            $http.put('/posts/' + $scope.post.id, {
                'title': $scope.post.title,
                'body': $scope.post.body

            }).then(function(response) {

                $log.info("Edit from Manage Post Successful.");
                $log.info(response);
                $('#modal').modal('hide');

            }, function(response) {
                
                $log.error("Edit Not Successful.");
                $log.debug(response);
            });
        };


        $scope.formatDate = function(date) {
            var dateOut = new Date(date);
            return dateOut;
        };

    }]);

})();