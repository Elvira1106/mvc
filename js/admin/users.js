var users = angular.module('users', []);


users.controller("usersController", function($scope, $http, $window){
    
    $scope.getUserData = function(userId) {
        $http({
            method: "POST",
            url: "http://localhost:3000/cabinet/users/getUserById",
            data: $.param({userId: userId}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(result){
            $scope.userId = result.data.id_user;
            $scope.userLogin = result.data.login;
            $scope.userEmail = result.data.email;
            $scope.userFullName = result.data.fullname;
            $scope.getRoles();
        //     $scope.userRole = result.data.role;
        //     for(var i=0; i<$scope.role.length; i++) {
        //         loc_val = $scope.roles[i];
        //         if (loc_val.name==result.data.role) {
        //             $scope.newRole = loc_val;
        //             break;
        //         }
        //     }
         })
    }

    $scope.getRoles = function() {
        $http({
            method: "POST",
            url: "http://localhost:3000/cabinet/users/getUsersRoles",
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(result){
            $scope.roles = [];
            for(var i=0; i<result.data.length; i++) {
                $scope.roles.push(result.data[i]);
            }
        })
    }
    
    $scope.updateUserData = function() {
    
        $http({
            method: "POST",
            url: "http://localhost:3000/cabinet/users/updateUserData",
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            data: $.param({id: $scope.userId, fullName: $scope.userFullName, login: $scope.userLogin, email: $scope.userEmail, role: $scope.role})
        }).then(function(result){       
            alert(result.data.text);
            $window.location.reload();
        });
    }

    $scope.deleteUser = function(userId) {
        $http({
            method: "POST",
            url: "http://localhost:3000/cabinet/users/deleteUser",
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            data: $.param({id: userId})
        }).then(function(result){
            alert(result.data.text);
            $window.location.reload();
        });
    }

    $scope.addNewUser = function() {
        $http({
            method: "POST",
            url: "http://localhost:3000/cabinet/users/addNewUser",
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            data: $.param({fullName: $scope.newUser, login: $scope.newLogin, email: $scope.newEmail, password: $scope.newPassword, role: $scope.newRole})
        }).then(function(result){
            alert(result.data.text);
            $window.location.reload();
        });
    }

    $scope.getRoles();

})

users.directive('editUser', function(){
    return {
        templateUrl: "/view/edit-user.tpl.php",
        restrict: "E", //элемент
        replace: true, //замена на другой шаблон
        transclude: true, 
        controller: "usersController",
        link: function(scope, $element, $attrs) {
            scope.showEditForm = function() {
                scope.isShowEditForm = true;
            };
        }
    }
})