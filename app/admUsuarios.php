<?php require_once 'encabezadoAdm.php'; ?>
<script src="./controlador/administracion.js"></script>
<div ng-controller="admCtrl">

  <main class="contenido">

    <div class="informacion">
      <h2 class="titulo">Gestión de Usuarios</h2>
      <p class="parrafo">
        Aquí puedes ver todos los usuarios registrados, añadir nuevos, o realizar acciones como editar o eliminar.
      </p>
    </div>

    <div class="contenedor acciones-usuarios">
      <a href="crear_usuario.php" class="boton boton-verde">+ Agregar Usuario</a>
    </div>

    <div class="contenedor tabla-usuarios">
      <table class="table table-hover table-responsive table-striped">
        <thead>
          <tr>
            <th class="tabla-colum">ID</th>
            <th class="tabla-colum">Nombre</th>
            <th class="tabla-colum">Rol</th>
            <th class="tabla-colum">Correo</th>
            <th class="tabla-colum">Eliminar <span class="glyphicon glyphicon-trash"></span></th>
          </tr>
        </thead>
        <tbody>
          <tr class="tabla" ng-repeat="u in usuarios">
            <td>{{u.id}}</td>
            <td>{{u.nombre}}</td>
            <td>{{u.status}}</td>
            <td>
              <button type="button" ng-click="eliminarAlumno(u)" class="btn btn-danger">
                <span class="glyphicon glyphicon-trash"></span>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

  </main>
</div>


<?php require_once 'footer.php'; ?>