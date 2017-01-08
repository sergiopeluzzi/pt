angular.module('starter.controllers')
    .controller('UserMyTransactionsCtrl', [
        '$scope', '$state', 'appConfig', '$resource', function ($scope, $state, appConfig, $resource) {

            var transaction = $resource(appConfig.baseUrl + '/api/public/mytransactions');

            transaction.query();

        }]);