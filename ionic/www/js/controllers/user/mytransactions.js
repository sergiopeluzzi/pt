angular.module('starter.controllers')
    .controller('UserMyTransactionsCtrl', [
        '$scope', '$state', 'MyTransaction', '$ionicLoading', function ($scope, $state, MyTransaction, $ionicLoading) {

            $scope.tnegativas = [];
            $scope.tpositivas = [];
            $scope.transacoes = [];

            $ionicLoading.show({
                template: 'Carregando...'
            });

            MyTransaction.query({}, function (data) {
                console.log('Mostrando Transações');
                var result = {negativo: data.Negativo, positivo: data.Positivo}

                $scope.tnegativas = result.negativo.data;
                $scope.tpositivas = result.positivo.data;
                $scope.transacoes = $scope.tnegativas.concat($scope.tpositivas)

                $ionicLoading.hide();

            }, function (dataError) {
                $ionicLoading.hide();
            });

        }]);