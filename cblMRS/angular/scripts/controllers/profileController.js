// code style: https://github.com/johnpapa/angular-styleguide

(function() {
    'use strict';
    angular
        .module('app')
        .controller('profileController', profileController);

    profileController.$inject =  ['$scope', '$timeout','$http', '$state', '$rootScope', '$cacheFactory', '$localStorage'];

    function profileController($scope, $timeout,$http,$state,$rootScope,$cache,$localStorage) {
        var vm = $scope;
        vm.cblProfile = [];
        vm.obj = [];
        vm.isValid = true;
        var id = $localStorage.currentUser;
        vm.itemsByPage=10;
        var apiURL = $rootScope.serverUrl + '/getProfile/'+id;

        vm.init = function(){
            vm.GetProfile();
        }

        vm.GetProfile=function(){
            $http.get(apiURL)
                .success(function(response)
                {
                    vm.cblProfile = response;
                });
        }
        
        vm.init();
    }
})();
