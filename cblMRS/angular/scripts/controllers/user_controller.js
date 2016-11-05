// code style: https://github.com/johnpapa/angular-styleguide 

(function() {
    'use strict';
    angular
        .module('app')
        .controller('UserController', UserController);

        UserController.$inject =  ['$scope', '$timeout','$http', '$state', '$rootScope', '$cacheFactory', '$localStorage'];

        function UserController($scope, $timeout,$http,$state,$rootScope,$cache,$localStorage) {
          var vm = $scope;
          vm.cbluser='';
          vm.success = '';
          vm.isValid=true;
          vm.rowCollection = []; // for storing original data from database
          vm.displayedCollection=[]; // only for visible rows (like searching, sorting)
          vm.changePasswordValue = '';
          vm.changeLoginValue = '';
          var apiURL = $rootScope.serverUrl + '/signup';
            var changePasswordURL = $rootScope.serverUrl + '/changePassword';
            var changeLoginURL = $rootScope.serverUrl + '/changeLogin';



            vm.Validate=function(){
            $http.post(apiURL,vm.cbluser)
                    .success(function(response)
                    {
                      if(response.length >0)
                      {
                          vm.cbluser=response[0];
                          if( $localStorage.cbluser == undefined){
                            $localStorage.cbluser = vm.cbluser;
                          }

                          // vm.cache= $cache.get('emr');
                          // vm.cache.put('user', vm.user);
                         //$rootScope.userPK=vm.user.PK;
                          $localStorage.currentUser=vm.cbluser.PK;

                          vm.isValid=true;
                          // location.href="#/app/page/profile";
                          $state.go('app.page.summary');

                      }
                       else
                       {
                          vm.isValid=false;                        
                       }
                    });
          }

            vm.changePassword=function(){
                vm.changePasswordValue.PK = $localStorage.cbluser.PK;
                console.log(vm.changePasswordValue);
                $http.post(changePasswordURL, vm.changePasswordValue)
                    .success(function(response)
                    {
                        vm.success = true;
                        console.log(response);
                        $('#m').modal('show');
                        $('#frmModal')[0].reset();
                    }).error(function(error){
                    console.log(error);
                });
            }

            vm.changeLogin=function(){
                vm.changeLoginValue.PK = $localStorage.cbluser.PK;
                $http.post(changeLoginURL, vm.changeLoginValue)
                    .success(function(response)
                    {
                        vm.success = true;
                        console.log(response);
                        $('#m').modal('show');
                        $('#frmModal')[0].reset();
                    });
            }

            }
})();
