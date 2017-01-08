angular.module('starter.services')
    .factory('MyTransaction', ['$resource', 'appConfig', function ($resource, appConfig) {
        return $resource(appConfig.baseUrl + '/api/public/mytransactions', {}, {
            query: {
                isArray: false
            }
        });
    }]);