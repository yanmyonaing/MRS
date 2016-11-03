(function() {
    'use strict';
    angular
        .module('app')
        .controller('SidebarController', SidebarController);

        SidebarController.$inject =  ['$scope', '$timeout','$http','$rootScope', '$cacheFactory', '$localStorage'];

        function SidebarController($scope, $timeout, $http, $rootScope, $cache, $local) {
          var vm = $scope;
          vm.obj = null; 
          vm.login = null;
          vm.cbluser = null;       
          vm.rowCollection = []; // for storing original data from database
          vm.displayedCollection=[]; // only for visible rows (like searching, sorting)
          var apiURL = $rootScope.serverUrl;

          vm.cbluser = angular.copy($local.cbluser);

          vm.getData=function(){
            $http.get(apiURL + '/getProfile/' + vm.cbluser.PK)
              .success(function(response)
              {                  
                  vm.obj=response;

                  if( $local.curuser == undefined){
                        $local.curuser = vm.obj;
                  }
              });
          }

          vm.ShowChangeID=function()
          {
              vm.login=angular.copy($local.curuser[0].login);
              $('#modChangeID').modal('show');              
          } 

          vm.ChangePassword=function(id)
          {
            vm.obj='';
            
            $http.get(apiURL+id)
                    .success(function(response)
                    {
                         vm.obj=response;
                         vm.currentSize=vm.obj;
                         $('#m').modal('show');  
                         $('#frmChangePass')[0].reset();  
                    });
          }
                    
          vm.logout=function(){

            $http.get(apiURL + '/logout')
                    .success(function(response)
                    {   
                        delete $local.cbluser;
                        delete $local.curuser;
                        location.href="#/access/signin"; 
                    });
                }
          vm.getData();
          }           
    })();
