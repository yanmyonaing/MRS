// code style: https://github.com/johnpapa/angular-styleguide

(function() {
    'use strict';
    angular
        .module('app')
        .controller('summaryController', summaryController);

    summaryController.$inject =  ['$scope', '$timeout','$http', '$state', '$rootScope', '$cacheFactory', '$localStorage'];

    function summaryController($scope, $timeout,$http,$state,$rootScope,$cache,$localStorage) {
        var vm = $scope;
        vm.cblSummary = [];
        vm.obj = [];
        vm.isValid = true;
        var id = $localStorage.currentUser;
        vm.itemsByPage=10;
        var apiURL = $rootScope.serverUrl + '/summaryData/'+id;
        var detailURL = $rootScope.serverUrl + '/summary/';

        vm.init = function(){
            vm.GetSummary();
        }

        vm.GetSummary=function(){
            $http.get(apiURL)
                .success(function(response)
                {
                    vm.cblSummary = response;
                });
        }

        vm.Detail = function (summaryId)
        {
            vm.isEdit=true;
            vm.obj='';
            
            $http.get(detailURL + summaryId)
                .success(function(response)
                {
                    console.log(response);
                    vm.obj=response;
                    $('#m').modal('show');
                    $('#frmModal')[0].reset();
                });
        }

        vm.init();
    }
})();
