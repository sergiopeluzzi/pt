angular.module('starter.controllers.login', [])
    .controller('LoginCtrl', ['$scope', 'OAuth', function ($scope, OAuth) {

        $scope.user = {
            username: '',
            password: ''
        };

        $scope.login = function () {
            OAuth.getAccessToken($scope.user).then(function (data) {
               console.log(data);
            }, function (responseError) {
                
            });
        };

        $scope.registrar = function () {
            alert('Registro efetuado com sucesso');
        }
    }]);