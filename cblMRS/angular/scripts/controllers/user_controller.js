// code style: https://github.com/johnpapa/angular-styleguide 

(function() {
    'use strict';
    angular
        .module('app')
        .controller('UserController', UserController);

        UserController.$inject =  ['$scope', '$timeout','$http','$rootScope', '$cacheFactory', '$localStorage'];

        function UserController($scope, $timeout,$http,$rootScope,$cache,$local) {
          var vm = $scope;
          vm.cbluser='';
          vm.isValid=true;
          vm.rowCollection = []; // for storing original data from database
          vm.displayedCollection=[]; // only for visible rows (like searching, sorting)
          var apiURL = $rootScope.serverUrl + '/signup';
          
          vm.Validate=function(){
            $http.post(apiURL,vm.cbluser)
                    .success(function(response)
                    {
                      if(response.length >0)
                      {
                          vm.cbluser=response[0];
                          if( $local.cbluser == undefined){
                            $local.cbluser = vm.cbluser;
                          }

                          // vm.cache= $cache.get('emr');
                          // vm.cache.put('user', vm.user);
                         //$rootScope.userPK=vm.user.PK;
                          vm.isValid=true;                         
                          location.href="#/app/page/profile";                         
                       }
                       else
                       {
                          vm.isValid=false;                        
                       }
                    });
          }     
        }
})();
