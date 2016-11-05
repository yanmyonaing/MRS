// code style: https://github.com/johnpapa/angular-styleguide

(function() {
    'use strict';
    angular
        .module('app')
        .controller('fileResultController', fileResultController);

    fileResultController.$inject =  ['$scope', '$timeout','$http', '$state', '$rootScope', '$cacheFactory', '$localStorage'];

    function fileResultController($scope, $timeout,$http,$state,$rootScope,$cache,$local) {
        var vm = $scope;
        vm.cblFileResult = [];
        var id = $localStorage.currentUser;
        vm.isValid = true;
        var apiURL = $rootScope.serverUrl + '/getFileResult/'+id;

        vm.init = function(){
            vm.GetFileResult();
        }

        vm.GetFileResult=function(){
            $http.get(apiURL)
                .success(function(response)
                {
                    vm.cblFileResult = response;
                });
        }

        vm.init();
    }
})();
