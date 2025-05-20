var App = angular.module("app", []);

App.controller('adminEjerciciosCtrl', function($scope, $http) {
  $scope.ejercicio = {};
  $scope.ejercicios = [];
  $scope.ejercicioMod={};
  $scope.categoriaSeleccionada = "";
  $scope.nuevoEjercicio = {};

  $scope.cargarEjercicios = function(categoria = '') {
    $http.get('../api/Ejercicios/consultarEjercicios.php', {
      params: { categoria: categoria }
    }).then(function(response) {
      $scope.ejercicios = response.data;
    }, function(error) {
      console.error('Error al cargar ejercicios', error);
    });
  };

  $scope.filtrarPorCategoria = function() {
    $scope.cargarEjercicios($scope.categoriaSeleccionada);
  };

  $scope.eliminarEjercicio = function(ejercicio) {
    if (confirm('¿Estás seguro de eliminar este ejercicio?')) {
      $http.post('../api/Ejercicios/eliminarEjercicio.php', {
        id: ejercicio.id
      }).then(function(response) {
        $scope.cargarEjercicios($scope.categoriaSeleccionada);
      }, function(error) {
        console.error('Error al eliminar ejercicio', error);
      });
    }
  };
$scope.filtrarPorCategoria = function() {
  console.log('Filtrando por categoría:', $scope.categoriaSeleccionada);
  $scope.cargarEjercicios($scope.categoriaSeleccionada);
};

$scope.guardarEjercicio = function() {
  $http.post('../api/Ejercicios/guardarEjercicio.php', $scope.nuevoEjercicio)
    .then(function(response) {
      alert("Ejercicio agregado exitosamente");
      $scope.nuevoEjercicio = {}; // Limpia el formulario
      var modalElement = document.getElementById('modalAgregarEjercicio');
      var modalInstance = bootstrap.Modal.getInstance(modalElement);
      modalInstance.hide(); // Cierra el modal
      $scope.cargarEjercicios($scope.categoriaSeleccionada); // Recarga
    }, function(error) {
      console.error("Error al guardar ejercicio:", error);
      alert("Error al guardar ejercicio.");
    });
};

    
  $scope.modificarEjercicio = function(ejercicio) {
  $scope.ejercicioMod = angular.copy(ejercicio); // Clona para no modificar directamente
  var modal = new bootstrap.Modal(document.getElementById('modalModificarEjercicio'));
  modal.show();
};

$scope.modificarEjercicioConfirmado = function() {
  $http.post('../api/Ejercicios/modificarEjercicio.php', $scope.ejercicioMod)
    .then(function(response) {
      alert("Ejercicio modificado exitosamente");
      var modalElement = document.getElementById('modalModificarEjercicio');
      var modalInstance = bootstrap.Modal.getInstance(modalElement);
      modalInstance.hide();
      $scope.cargarEjercicios($scope.categoriaSeleccionada);
    }, function(error) {
      console.error("Error al modificar ejercicio:", error);
      alert("Error al modificar ejercicio.");
    });
};

  $scope.cargarEjercicios(); // Carga inicial
});
