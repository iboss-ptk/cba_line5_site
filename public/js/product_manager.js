var app = angular.module('product_manager',[]);
var controllers = {};

app.service('productService',function($http){

  return {
    getProducts: function() {
      return $http.get('productrest/data');

    }

  };
});

app.service('brandService',function($http){

  return {
    getBrands: function() {
      return $http.get('productrest/brand');

    }

  };
});

app.service('categoryService',function($http){

  return {
    getCategories: function() {
      return $http.get('productrest/category');

    }

  };
});


controllers.ProductCtrl = function($scope, $http, productService , brandService, categoryService){
	

  $scope.delete_product = function(prodID){
    var confirm_deletion = confirm("Deleting "+prodID+". Are you sure?");

    if(confirm_deletion){

      $http({method: 'DELETE', url: 'product/'+prodID }).
      success(function(data) {

      }).
      error(function(data) {
      });

      productService.getProducts().success(function(data){
        $scope.products = data.data;
      });
    }
    
  }

  productService.getProducts().success(function(data){
    $scope.products = data.data;

    brandService.getBrands().success(function(data){
      var brand_list = {};

      for (var i = 0; i<data.length; i++) {
        var obj =data[i];
        brand_list[obj.id] = obj.name;
      }

      for (var i = $scope.products.length - 1; i >= 0; i--) {
        $scope.products[i].brand = brand_list[$scope.products[i].brand_id];
      };

    });

    categoryService.getCategories().success(function(data){
      var category_list = {};

      for (var i = 0; i<data.length; i++) {
        var obj =data[i];
        category_list[obj.id] = obj.name;
      }

      for (var i = $scope.products.length - 1; i >= 0; i--) {
        $scope.products[i].category = category_list[$scope.products[i].category_id];
      };

    });
  });



  
}




app.controller(controllers);