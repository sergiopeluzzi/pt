angular.module('starter.controllers')
    .controller('UserReadQrCodeCtrl', ['$scope', '$cordovaBarcodeScanner', '$ionicPopup',
        function ($scope, $cordovaBarcodeScanner, $ionicPopup) {
            $scope.readbarcode = function () {

                $cordovaBarcodeScanner
                    .scan()
                    .then(function (barcodeData) {
                        // Success! Barcode data is here
                        console.log(barcodeData.text);
                    }, function (error) {
                        // An error occurred
                        $ionicPopup.alert({
                            title: 'Advertência',
                            template: 'Não foi possível ler o código, tente novamente!'
                        })
                    });
            }
        }]);