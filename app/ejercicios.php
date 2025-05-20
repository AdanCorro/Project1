<?php require_once 'encabezadoAdm.php'; ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="controlador/angular.min.js"></script>
<script src="controlador/adminEjercicios.js "></script>

<body ng-app="app" ng-controller="adminEjerciciosCtrl">
  <div id="content" class="container">
    <h2 class="admin-titulo">Listado de Ejercicios</h2>

    <div class="filtrador mb-3">
      <label for="categoriaSelect">Filtrar por categoría:</label>
      <select class="barraSelectform-select" id="categoriaSelect" ng-model="categoriaSeleccionada" ng-change="filtrarPorCategoria()">
        <option value="">-- Todas --</option>
        <option value="Pecho">Pecho</option>
        <option value="Hombro">Hombro</option>
        <option value="Espalda">Espalda</option>
        <option value="Tríceps">Tríceps</option>
        <option value="Bíceps">Bíceps</option>
        <option value="Abdomen">Abdomen</option>
        <option value="Pierna">Pierna</option>

      </select>
    </div>

    <table class="table table-hover table-responsive table-striped">
      <thead>
        <tr>
          <th class="tabla-colum">Nombre</th>
          <th class="tabla-colum">Descripción</th>
          <th class="tabla-colum">Categoría</th>
          <th class="tabla-colum">Músculo Principal</th>
          <th class="tabla-colum">Video</th>
          <th class="tabla-colum">Eliminar</th>
          <th class="tabla-colum">Modificar</th>
        </tr>
      </thead>
      <tbody>
        <tr class="tabla" ng-repeat="e in ejercicios">
          <td>{{e.nombre}}</td>
          <td>{{e.descripcion}}</td>
          <td>{{e.categoria}}</td>
          <td>{{e.musculo_principal}}</td>
          <td>
            <a ng-if="e.video_url" ng-href="{{e.video_url}}" target="_blank">
              <button class="btn btn-primary btn-sm">Ver Video</button>
            </a>
          </td>
          <td>
            <button type="button" ng-click="eliminarEjercicio(e)" class="btn btn-danger">
              <span class="glyphicon glyphicon-trash"></span> Eliminar
            </button>
          </td>
          <td>
            <button type="button" ng-click="modificarEjercicio(e)" class="btn btn-warning">
              <span class="glyphicon glyphicon-pencil"></span> Modificar
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Agregar Ejercicio -->

   <!-- Botón para abrir el modal -->
<div class="btnEjercicio text-end mb-3">
  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregarEjercicio">
    <span class="glyphicon glyphicon-plus"></span> Agregar Ejercicio
  </button>
</div>

<!-- Modal para agregar ejercicio -->
<div class="modal fade" id="modalAgregarEjercicio" tabindex="-1" aria-labelledby="modalAgregarEjercicioLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form ng-submit="guardarEjercicio()">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#BF0B0B">
          <h5 class="modal-title" id="modalAgregarEjercicioLabel" style="color:white">Agregar Ejercicio</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label>Nombre:</label>
            <input type="text" class="form-control" ng-model="nuevoEjercicio.nombre" required>
          </div>
          <div class="mb-3">
            <label>Descripción:</label>
            <textarea class="form-control" ng-model="nuevoEjercicio.descripcion" required></textarea>
          </div>
          <div class="mb-3">
            <label>Categoría:</label>
            <select class="form-select" ng-model="nuevoEjercicio.categoria" required>
              <option value="">-- Selecciona --</option>
              <option value="Pecho">Pecho</option>
              <option value="Hombro">Hombro</option>
              <option value="Espalda">Espalda</option>
              <option value="Tríceps">Tríceps</option>
              <option value="Bíceps">Bíceps</option>
              <option value="Abdomen">Abdomen</option>
              <option value="Pierna">Pierna</option>
            </select>
          </div>
          <div class="mb-3">
            <label>Músculo Principal:</label>
            <input type="text" class="form-control" ng-model="nuevoEjercicio.musculo_principal" required>
          </div>
          <div class="mb-3">
            <label>Video (URL):</label>
            <input type="url" class="form-control" ng-model="nuevoEjercicio.video_url">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modificar ejercicio -->
<div class="modal fade" id="modalModificarEjercicio" tabindex="-1" aria-labelledby="modalModificarEjercicioLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form ng-submit="modificarEjercicioConfirmado()">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#BF0B0B">
          <h5 class="modal-title" id="modalModificarEjercicioLabel" style="color:white">Modificar Ejercicio</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label>Nombre:</label>
            <input type="text" class="form-control" ng-model="ejercicioMod.nombre" required>
          </div>
          <div class="mb-3">
            <label>Descripción:</label>
            <textarea class="form-control" ng-model="ejercicioMod.descripcion" required></textarea>
          </div>
          <div class="mb-3">
            <label>Categoría:</label>
            <select class="form-select" ng-model="ejercicioMod.categoria" required>
              <option value="">-- Selecciona --</option>
              <option value="Pecho">Pecho</option>
              <option value="Hombro">Hombro</option>
              <option value="Espalda">Espalda</option>
              <option value="Tríceps">Tríceps</option>
              <option value="Bíceps">Bíceps</option>
              <option value="Abdomen">Abdomen</option>
              <option value="Pierna">Pierna</option>
            </select>
          </div>
          <div class="mb-3">
            <label>Músculo Principal:</label>
            <input type="text" class="form-control" ng-model="ejercicioMod.musculo_principal" required>
          </div>
          <div class="mb-3">
            <label>Video (URL):</label>
            <input type="url" class="form-control" ng-model="ejercicioMod.video_url">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
      </div>
    </form>
  </div>
</div>

</body>

</html>