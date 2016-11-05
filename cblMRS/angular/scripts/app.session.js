/**
 * @ngdoc function
 * @name app.controller:Session
 * @description
 * Session of the app
 */
(function() {
    'use strict';
    angular
        .module('app')
        .factory('Session',Session);

    Session.$inject  = ['$http'];

    function Session($http) {
        var Session = {
            data: {},
            saveSession: function() { /* save session data to db */ },
            updateSession: function() {
                /* load data from db */
                $http.get('session.json').then(function(r) { return Session.data = r.data;});
            }
        };
        Session.updateSession();
        return Session;
    }
})();
