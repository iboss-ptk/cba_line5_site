var app = angular.module('brand_manager', []);
var controllers = {};

Array.prototype.remove = function(from, to) {
	var rest = this.slice((to || from) + 1 || this.length);
	this.length = from < 0 ? this.length + from : from;
	return this.push.apply(this, rest);
};

app.service('brandService',function($http){

	return {
		getBrands: function() {
			return $http.get('productrest/brand');
		}
	};
});


controllers.BrandCtrl = function($scope, brandService){

	function getById(arr, id) {
		for (var d = 0, len = arr.length; d < len; d += 1) {
			if (arr[d].id === id) {
				return d;
			}
		}
	}

	brandService.getBrands().success(function(data){
		$scope.brands = data;
		
	});

	$scope.add = function(){
		if($scope.new_brand.trim() !=='') $scope.brands.push({name:$scope.new_brand});
		$scope.new_brand='';
		// ajax store
	}

	$scope.edit = function(){

	}

	$scope.delete = function(id,name){
		if(confirm('Deleting'+name+'. Sure?'))
		{
			var index = getById($scope.brands, id);
			$scope.brands.remove(index);
			//ajax destroy
		}
	}
}

app.controller(controllers);