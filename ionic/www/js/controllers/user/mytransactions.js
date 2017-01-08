angular.module('starter.controllers')
    .controller('UserMyTransactionsCtrl', [
        '$scope', '$state', 'MyTransaction', function ($scope, $state, MyTransaction) {

            MyTransaction.query({}, function (data) {
                console.log('Mostrando Transações');
                console.log(data);
            });

        }]);