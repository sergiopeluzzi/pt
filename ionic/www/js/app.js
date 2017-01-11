// Ionic Starter App

angular.module('starter.controllers', []);
angular.module('starter.services', []);
// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
angular.module('starter', [
    'ionic',
    'starter.controllers',
    'starter.services',
    'angular-oauth2',
    'ngResource',
    'ngCordova'

])
.constant('appConfig', {
    baseUrl: 'http://api.poptroco.com.br'
    //baseUrl: 'http://localhost:8000'
})

.run(function($ionicPlatform) {
  $ionicPlatform.ready(function() {
    if(window.cordova && window.cordova.plugins.Keyboard) {
      // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
      // for form inputs)
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);

      // Don't remove this line unless you know what you are doing. It stops the viewport
      // from snapping when text inputs are focused. Ionic handles this internally for
      // a much nicer keyboard experience.
      cordova.plugins.Keyboard.disableScroll(true);
    }
    if(window.StatusBar) {
      StatusBar.styleDefault();
    }
  });
})
.config(function ($stateProvider, $urlRouterProvider, OAuthProvider, OAuthTokenProvider, appConfig) {
    // Configuração do OAuthProvider
    OAuthProvider.configure({
        baseUrl: appConfig.baseUrl,
        clientId: 'poptroco_public',
        clientSecret: 'public_poptroco',
        grantPath: '/oauth2/token'
    });

    // COnfiguração pra tornar o Token seguro
    OAuthTokenProvider.configure({
        name: 'token',
        options: {
            secure: false // false em dev, true em prod
        }
    });

    // Configuração das rotas do front-end
    $stateProvider
        .state('home', {
            url: '/home',
            templateUrl: 'templates/home.html',
            controller: 'HomeCtrl'
        })
        .state('entrar', {
            url: '/entrar',
            templateUrl: 'templates/entrar.html',
            controller: 'LoginCtrl'
        })
        .state('cadastrar', {
            url: '/cadastrar',
            templateUrl: 'templates/cadastrar.html',
            controller: 'LoginCtrl'
        })
        .state('main', {
            url: '/main',
            templateUrl: 'templates/main.html',
            controller: 'LoginCtrl'
        })
        .state('facilitar', {
            url: '/facilitar',
            templateUrl: 'templates/facilitar.html',
            controller: 'LoginCtrl'
        })

        // Rota abstrata (agrupamento de rotas do usuário)
        .state('user', {
            abstract: true,
            url: '/user',
            template: '<ion-nav-view/>'
        })
        .state('user.mytransactions', {
            url: '/mytransactions',
            templateUrl: 'templates/user/mytransactions.html',
            controller: 'UserMyTransactionsCtrl'
        })
        .state('user.myqrcode', {
            url: '/myqrcode',
            templateUrl: 'templates/user/myqrcode.html',
            controller: 'UserMyQrCodeCtrl'
        })
        .state('user.readqrcode', {
            url: '/readqrcode',
            templateUrl: 'templates/user/readqrcode.html',
            controller: 'UserReadQrCodeCtrl'
        })
        .state('user.direct', {
            url: '/direct',
            templateUrl: 'templates/user/direct.html',
            controller: 'UserDirectCtrl'
        });
    // Evita erro 404. Se a rota n existir, volta pro /home ;D
    $urlRouterProvider.otherwise('/home');
});