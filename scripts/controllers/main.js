/**
 * Created by Rew on 09/06/2016.
 */

'use strict';

angular
    .module('myApp')
    .controller('usersCtrl', function ($scope, $http) {
          // sort options
        $scope.insertData = function () {

            $http.post('api/insert.php', {
                'unom':$scope.unom,
                'uprenom': $scope.uprenom,
                'uemail': $scope.uemail,
                'utel': $scope.utel,
                'uadresse': $scope.uadresse,
                'ucp': $scope.ucp,
                'uville': $scope.uville
            })
                .success(function(data, status, headers, config){
                    console.log('Data Inserted successfully');
                    $http.get("api/email.php");
                })
                .error(function() {
                    console.log('Error');
                });
        };
    });

angular
    .module('myApp')
    .controller('dbCtrl', ['$scope', '$http', function ($scope, $http) {
            $http.get("api/select.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "Erreur lors de la recherche des données";
                });
    }]);
