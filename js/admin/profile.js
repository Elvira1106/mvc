var profile = angular.module('profile',  []);

profile.controller('ProfileController', function($scope, $http, $window) {

    $scope.saveProfileData = function() {
        $scope.id = 1;
        $scope.login = angular.element("#login").val();
        $scope.email = angular.element("#email").val();

        $http({
            method: "POST",
            url: "http://localhost:3000/cabinet/profile/updateProfile",
            data: $.param({id: $scope.id, login:  $scope.login, email: $scope.email}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(result){
           // console.log(result);
            $window.location.href = '/cabinet';
        })
    }

    $scope.updatePassword = function() {

        $scope.id = angular.element("#userId").val();
        $scope.newpass = angular.element("#newpass").val(); 
        $scope.repeatpass = angular.element("#repeatpass").val(); 
        $http({
            method: "POST",
            url: "http://localhost:3000/cabinet/profile/updatePassword",
            data: $.param({id:  $scope.id, newpass: $scope.newpass, repeatpass: $scope.repeatpass}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(result){
            alert(result.data.text);
            $window.location.href = '/cabinet';
        })
    }
});