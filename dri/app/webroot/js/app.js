
function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

var driApp = angular.module('driApp', []);


driApp.controller('parientesController',["$scope","$http", function parientesController($scope,$http) {
	$scope.parientes = [];
	
	$scope.rutapadres= [];
	$scope.parametros=getUrlVars();
  
   $scope.buscar = function(vid) {   	
	   	if (vid===null){
	   		vid="";
	   	}
	   	if (vid===undefined){
	   		vid="";
	   	}
	  	$http.get('nodos/generacion/'+vid)
	  	.then(function(response) {
	        $scope.parientes = response.data[0].parientes;
	      });
  	};
  
  $scope.buscar($scope.parametros.desde);
  
   	if ($scope.parametros.desde!==undefined){
	  	$http.get('nodos/listapadres/'+$scope.parametros.desde)
	  	.then(function(response) {
	        $scope.rutapadres=response.data[0].parientes;
	      });
   	}
  
      
      
   $scope.ver = function(vid) {
   	$scope.rutapadres.push(vid);
   	$scope.buscar(vid.id);
  };
  
    
   $scope.atras = function(vid) {
   	$scope.buscar(vid.padre_id);
   	$scope.rutapadres.pop();
  };
  
}]);
