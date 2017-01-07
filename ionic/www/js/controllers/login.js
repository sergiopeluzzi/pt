angular.module('starter.controllers.login', [])
    .controller('LoginCtrl', ['$scope', 'OAuth', '$ionicPopup', '$state', function ($scope, OAuth, $ionicPopup, $state) {

        $scope.user = {
            username: '',
            password: ''
        };

        $scope.login = function () {
            OAuth.getAccessToken($scope.user).then(function (data) {
                $state.go('main');
            }, function (responseError) {
                $ionicPopup.alert({
                    title: 'Advertencia!',
                    template: '<b>Login e/ou Senha inválidos!</b>'
                });
            });
        };

        $scope.registrar = function () {
            alert('Registro efetuado com sucesso');
        }
    }]);