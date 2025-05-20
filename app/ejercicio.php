<?php require_once 'encabezadoAdm.php'; ?>

<body>
  <div id="content" class="container">
    <h2 class="admin-titulo">Listado de Ejercicios</h2>
    <table class="table table-hover table-responsive table-striped">
      <thead>
        <tr>
          <th class="tabla-colum">Nombre</th>
          <th class="tabla-colum">Descripción</th>
          <th class="tabla-colum">Categoría</th>
          <th class="tabla-colum">Músculo Principal</th>
          <th class="tabla-colum">Video</th>
          <th class="tabla-colum">Eliminar <span class="glyphicon glyphicon-trash"></span></th>
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
              <button class="btn btn-primary btn-sm">
                Ver Video
              </button>
            </a>
          </td>
          <td>
            <button type="button" ng-click="eliminarEjercicio(e)" class="btn btn-danger">
              <span class="glyphicon glyphicon-trash"></span>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>


</body>

</html>