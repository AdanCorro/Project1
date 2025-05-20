<?php require_once 'encabezadoAdm.php'; ?>

<body>
  <div id="content" class="container">
    <h2 class="admin-titulo">Rutinas de Ejercicio</h2>
    <table class="table table-hover table-responsive table-striped">
      <thead>
        <tr>
          <th class="tabla-colum">Nombre de la Rutina</th>
          <th class="tabla-colum">Descripción</th>
          <th class="tabla-colum">Fecha de Creación</th>
          <th class="tabla-colum">Ver Usuario</th>
          <th class="tabla-colum">Eliminar <span class="glyphicon glyphicon-trash"></span></th>
        </tr>
      </thead>
      <tbody>
        <tr class="tabla" ng-repeat="r in rutinas">
          <td>{{r.nombre}}</td>
          <td>{{r.descripcion}}</td>
          <td>{{r.fecha_creacion | date : 'yyyy-MM-dd'}}</td>
          <td>
            <button class="btn btn-info btn-sm" ng-click="verUsuario(r.usuario_id)">
              Ver Usuario
            </button>
          </td>
          <td>
            <button type="button" ng-click="eliminarRutina(r)" class="btn btn-danger">
              <span class="glyphicon glyphicon-trash"></span>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>


</body>

</html>