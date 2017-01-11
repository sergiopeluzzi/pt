angular.module('starter.services')
    .factory('Direct', ['$resource', 'appConfig', function ($resource, appConfig) {
        return $resource(appConfig.baseUrl + '/api/public/mytransactions', {}, {
            query: {
                isArray: false
            }
        });
    }]);