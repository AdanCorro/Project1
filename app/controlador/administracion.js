var App = angular.module("app", []);

App.controller('admCtrl', function($scope,$http){

    $scope.usuario={};
    $scope.usuarios=[];
    
    // Función para consultar usuarios desde el backend
    $scope.consultar = function(){               
        $http.post('../api/usuarios/consultarUsuarios.php')
        .success(function(data,status,headers,config){
            $scope.usuarios=data;
        }).error(function(data,status,headers,config){
            alert("Error en la Petición");
        });   
    }
    
    // Consultar usuarios al cargar la página
    $scope.consultar();
    
    // Función para guardar un nuevo usuario
    $scope.guardar = function(){               
        $http.post('../api/usuarios/guardarUsuarios.php',$scope.usuario)
        .success(function(data,status,headers,config){
            $scope.usuario={};
            $scope.consultar();
            $('#myModal').modal('hide');
        }).error(function(data,status,headers,config){
            alert("Error en la Petición");
        });
    }
    
    // Objeto para almacenar los datos de un usuario a modificar
    $scope.usuarioMod={};
    
    // Función para eliminar un usuario
    $scope.eliminar = function(usuario){ 
        let isBook = confirm("¿Quieres eliminar este registro?");
        if(isBook){
            $http.post('../api/usuarios/eliminarUsuarios.php',usuario)
        .success(function(data,status,headers,config){
            $scope.usuario={};
            $scope.consultar();
            $('#myModal').modal('hide');
        }).error(function(data,status,headers,config){
            alert("Error en la Petición");
        });
        }              
    }
    
    // Función para seleccionar un usuario y mostrarlo en un modal
    $scope.seleccionar = function(u){
        $scope.usuarioMod = u;
        $("#ModalMod").modal();
    }
    
    // Función para modificar un usuario
    $scope.modificar = function(){
		$http.post('../api/usuarios/modificarUsuarios.php', $scope.usuarioMod)
        .success(function(data,status,headers,config){
            $scope.usuario={};
            $scope.consultar();
            $('#ModalMod').modal('hide');
        }).error(function(data,status,headers,config){
            alert("Error en la Petición");
        });
        }         
});