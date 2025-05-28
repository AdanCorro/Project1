var App = angular.module("app", []);

App.controller('adminUsuariosCtrl', function($scope,$http){

    $scope.nuevoUsuario={};
    $scope.usuarioMod={};
    $scope.usuario= {};
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

$scope.guardarUsuario = function() {
  $http.post('../api/usuarios/guardarUsuarios.php', $scope.nuevoUsuario)
    .then(function(response) {
      if (response.data.status === "success") {
        alert("Usuario agregado exitosamente.");
        $scope.nuevoUsuario = {}; // Limpia el formulario
        var modalElement = document.getElementById('modalAgregarUsuario');
        var modalInstance = bootstrap.Modal.getInstance(modalElement);
        modalInstance.hide();
        $scope.consultar();
      } else {
        alert("Error: " + response.data.message);
      }
    }, function(error) {
      console.error("Error al guardar usuario:", error);
      alert("Error al guardar usuario.");
    });
};

    
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
    
    // Función para modificar un usuario
    $scope.modificarUsuario = function(usuario) {
  $scope.usuarioMod = angular.copy(usuario); // Clona para no modificar directamente
  var modal = new bootstrap.Modal(document.getElementById('modalModificarUsuario'));
  modal.show();
};

$scope.modificarUsuarioConfirmado = function() {
  $http.post('../api/usuarios/modificarUsuarios.php', $scope.usuarioMod)
    .then(function(response) {
      alert("Usuario modificado exitosamente");
      var modalElement = document.getElementById('modalModificarUsuario');
      var modalInstance = bootstrap.Modal.getInstance(modalElement);
      modalInstance.hide();
      $scope.consultar();
    }, 
    function(error) {
      console.error("Error al modificar el usuario:", error);
      alert("Error al modificar usuario.");
    });
};
});