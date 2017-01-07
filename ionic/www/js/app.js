// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
angular.module('starter', [
    'ionic',
    'starter.controllers.home',
    'starter.controllers.login',
    'angular-oauth2'
])

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
.config(function ($stateProvider, $urlRouterProvider, OAuthProvider, OAuthTokenProvider) {
    // Configuração do OAuthProvider
    OAuthProvider.configure({
        //baseUrl: 'https://api.poptroco.com.br',
        baseUrl: 'http://localhost:8000',
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
        });
    // Evita erro 404. Se a rota n existir, volta pro /home ;D
    $urlRouterProvider.otherwise('/home');
});