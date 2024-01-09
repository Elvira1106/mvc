var app = angular.module('products', ["ngRoute"]); 
app.config(function($routeProvider, $locationProvider){
    $routeProvider
        .when("/:id_product", {
            templateUrl : "/view/product.tpl.php"
        });
     $locationProvider.html5Mode(true); 
});

app.controller('ProductsController', function($scope, $http, $window) {

    $scope.getInfoByProductId = function(id_product) {
        $http({
            method: "GET",
            url: "http://localhost:3000/cabinet/products/getProduct",
            params: {id_product: id_product}
        }).then(function(result){
            $scope.productId = result.data.id_product;
            $scope.productName = result.data.name_pr;
            $scope.productPrice = result.data.price;
        })
    }

    $scope.saveProduct = function() {
        //ПОЛУЧАЕМ ДАННЫЕ ИХ ФОРМЫ
        $scope.productName = angular.element("#productName").val();
        $scope.productPrice = angular.element("#productPrice").val();
        $http({
            method: "POST",
            url: "http://localhost:3000/cabinet/products/saveProduct",
            data: $.param({id: $scope.productId, name: $scope.productName, price: $scope.productPrice}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(result){          
            $window.location.href = '/cabinet/products';
        })
    }
    $scope.addProduct = function() {
        //добавить валидацию данных
        $http({
            method: "POST",
            url: "http://localhost:3000/cabinet/products/addProduct",
            data: $.param({productName: $scope.newProductName, productPrice: $scope.newProductPrice}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(result){
            //написать и вызвать метод получения всех продуктов
            if(result.data.success) {
                $window.location.reload();
            }
        })
    }
    $scope.deleteProduct = function(id) {
        $http({
            method: "POST",
            url: "http://localhost:3000/cabinet/products/deleteProduct",
            data: $.param({id: id}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(result){
                $window.location.href = '/cabinet/products';
        });
    }

});
