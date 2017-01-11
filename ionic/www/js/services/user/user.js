angular.module('starter.services')
    .factory('User', ['$resource', 'appConfig', function ($resource, appConfig) {
        return $resource(appConfig.baseUrl + '/api/public/user', {}, {
            query: {
                isArray: false
            }
        });
    }]);