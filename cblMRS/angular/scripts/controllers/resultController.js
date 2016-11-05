// code style: https://github.com/johnpapa/angular-styleguide

(function() {
    'use strict';
    angular
        .module('app')
        .controller('ResultController', ResultController);

    ResultController.$inject =  ['$scope', '$timeout','$http', '$state', '$rootScope', '$cacheFactory', '$localStorage'];

    function ResultController($scope, $timeout,$http,$state,$rootScope,$cache,$localStorage) {
        var vm = $scope;
        vm.cblResult = [];
        vm.isValid = true;
        var id = $localStorage.currentUser;
        var apiURL = $rootScope.serverUrl + '/resultData/' + id;
        vm.itemsByPage=10;
        var detailURL = $rootScope.serverUrl + '/result/';

        vm.init = function(){
            vm.GetResult();
        }

        vm.GetResult=function(){
            $http.get(apiURL)
                .success(function(response)
                {
                    vm.cblResult = response;
                });
        }

        vm.Detail = function (resultId)
        {
            vm.isEdit=true;
            vm.obj='';

            $http.get(detailURL + resultId)
                .success(function(response)
                {
                    vm.obj=response;
                    $('#m').modal('show');
                    $('#frmModal')[0].reset();
                });
        }

        vm.init();
    }
})();
