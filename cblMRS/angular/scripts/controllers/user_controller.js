// code style: https://github.com/johnpapa/angular-styleguide 

(function() {
    'use strict';
    angular
        .module('app')
        .controller('UserController', UserController);

        UserController.$inject =  ['$scope', '$timeout', '$auth', '$http', '$state', '$rootScope', '$cacheFactory', '$localStorage'];

        function UserController($scope, $timeout, $auth, $http,$state,$rootScope,$cache,$localStorage) {
          var vm = $scope;
          vm.cbluser='';
          vm.success = '';
          vm.isValid=true;
          vm.rowCollection = []; // for storing original data from database
          vm.displayedCollection=[]; // only for visible rows (like searching, sorting)
          vm.changePasswordValue = '';
          vm.changeLoginValue = '';
          vm.isValid = localStorage.getItem('isValid');
          vm.errorMessage = true;

          var apiURL = $rootScope.serverUrl + '/signup';
          var changePasswordURL = $rootScope.serverUrl + '/changePassword';
          var changeLoginURL = $rootScope.serverUrl + '/changeLogin';

            vm.Validate=function(){
                var credentials = {
                    user_id : vm.cbluser.user_id,
                    password : vm.cbluser.password
                };

                $auth.login(credentials).then(function(data) {
                    // If login is successful, redirect to the users state
                    delete localStorage.isValid;

                    return $http.get($rootScope.serverUrl+'/loginUser');

                }, function(error) {
                    vm.loginError = true;
                    vm.loginErrorText = error.error;

                    localStorage.setItem('isValid', true);
                    vm.errorMessage = false;
                    
                }).then(function(response){

                    var user = JSON.stringify(response);

                    localStorage.setItem('user', user);

                    $rootScope.authenticated = true;

                    if( $localStorage.cbluser == undefined){

                        $localStorage.cbluser = response.data.user;
                    }

                    $localStorage.currentUser=response.data.user.PK;

                    vm.isValid=true;

                    $state.go('app.page.summary');

                    // $rootScope.currentUser = response.data.user; To show user name


                });
            // $http.post(apiURL,vm.cbluser)
            //         .success(function(response)
            //         {
            //           if(response.length >0)
            //           {
            //               vm.cbluser=response[0];
            //               if( $localStorage.cbluser == undefined){
            //                 $localStorage.cbluser = vm.cbluser;
            //               }
            //
            //               // vm.cache= $cache.get('emr');
            //               // vm.cache.put('user', vm.user);
            //              //$rootScope.userPK=vm.user.PK;
            //               $localStorage.currentUser=vm.cbluser.PK;
            //
            //               vm.isValid=true;
            //               // location.href="#/app/page/profile";
            //               $state.go('app.page.summary');
            //
            //           }
            //            else
            //            {
            //               vm.isValid=false;
            //            }
            //         });
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


