<?php require_once 'encabezadoAdm.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="controlador/angular.min.js"></script>
<script src="controlador/adminUsuarios.js "></script>

<body ng-app="app" ng-controller="adminUsuariosCtrl">
  <div id="content" class="container">
    <h2 class="admin-titulo">Usuarios Registrados</h2>
    <table class="table table-hover table-responsive table-striped">
      <thead>
        <tr>
          <th class="tabla-colum">Nombre</th>
          <th class="tabla-colum">Ap. Paterno</th>
          <th class="tabla-colum">Ap. Materno</th>
          <th class="tabla-colum">Correo</th>
          <th class="tabla-colum">Rol</th>
          <th class="tabla-colum">Género</th>
          <th class="tabla-colum">Altura (cm)</th>
          <th class="tabla-colum">Peso (kg)</th>
          <th class="tabla-colum">Fecha Registro</th>
          <th class="tabla-colum">Eliminar <span class="glyphicon glyphicon-trash"></span></th>
          <th class="tabla-colum">Modificar <span class="glyphicon glyphicon-pencil"></span></th>
        </tr>
      </thead>
      <tbody>
        <tr class="tabla" ng-repeat="u in usuarios">
          <td>{{u.nombre}}</td>
          <td>{{u.ap_paterno}}</td>
          <td>{{u.ap_materno}}</td>
          <td>{{u.correo}}</td>
          <td>{{u.rol}}</td>
          <td>{{u.genero}}</td>
          <td>{{u.altura}}</td>
          <td>{{u.peso}}</td>
          <td>{{u.fecha_registro}}</td>
          <td>
            <button type="button" ng-click="eliminar(u)" class="btn btn-danger">
              <span class="glyphicon glyphicon-trash"></span>Eliminar
            </button>
          </td>
          <td>
            <button type="button" ng-click="modificarUsuario(u)" class="btn btn-warning"">
              <span class="glyphicon glyphicon-pencil"></span>Modificar
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- Agregar Usuario -->

   <!-- Botón para abrir el modal -->
<div class="btnEjercicio text-end mb-3">
  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregarUsuario">
    <span class="glyphicon glyphicon-plus"></span> Agregar Usuario</button>
</div>

  <!-- Modal para agregar un usuario -->
<div class="modal fade" id="modalAgregarUsuario" tabindex="-1" aria-labelledby="modalAgregarUsuarioLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form ng-submit="guardarUsuario()">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#BF0B0B">
          <h5 class="modal-title" id="modalAgregarUsuarioLabel" style="color:white">Agregar Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">

          <div class="mb-3">
            <label>Nombre:</label>
            <input type="text" class="form-control" ng-model="nuevoUsuario.nombre" required>
          </div>

          <div class="mb-3">
            <label>Apellido Paterno:</label>
            <input type="text" class="form-control" ng-model="nuevoUsuario.ap_paterno" required>
          </div>

          <div class="mb-3">
            <label>Apellido Materno:</label>
            <input type="text" class="form-control" ng-model="nuevoUsuario.ap_materno" required>
          </div>

          <div class="mb-3">
            <label>Correo:</label>
            <input type="email" class="form-control" ng-model="nuevoUsuario.correo" required>
          </div>

          <div class="mb-3">
            <label>Rol:</label>
            <select class="form-select" ng-model="nuevoUsuario.rol" required>
              <option value="">-- Selecciona --</option>
              <option value="admin">Admin</option>
              <option value="usuario">Usuario</option>
            </select>
          </div>

          <div class="mb-3">
            <label>Género:</label>
            <select class="form-select" ng-model="nuevoUsuario.genero" required>
              <option value="">-- Selecciona --</option>
              <option value="Masculino">Masculino</option>
              <option value="Femenino">Femenino</option>
              <option value="Otro">Otro</option>
            </select>
          </div>

          <div class="mb-3">
            <label>Altura (cm):</label>
            <input type="number" class="form-control" ng-model="nuevoUsuario.altura" required>
          </div>

          <div class="mb-3">
            <label>Peso (kg):</label>
            <input type="number" class="form-control" ng-model="nuevoUsuario.peso" required>
          </div>

          <div class="mb-3">
            <label>Contraseña:</label>
            <input type="password" class="form-control" ng-model="nuevoUsuario.password" required>
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

<!-- Modal para modificar un usuario -->
<div class="modal fade" id="modalModificarUsuario" tabindex="-1" aria-labelledby="modalModificarUsuarioLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form ng-submit="modificarUsuarioConfirmado()">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#BF0B0B">
          <h5 class="modal-title" id="modalModificarUsuarioLabel" style="color:white">Modificar Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">

          <div class="mb-3">
            <label>Nombre:</label>
            <input type="text" class="form-control" ng-model="usuarioMod.nombre" required>
          </div>

          <div class="mb-3">
            <label>Apellido Paterno:</label>
            <input type="text" class="form-control" ng-model="usuarioMod.ap_paterno" required>
          </div>

          <div class="mb-3">
            <label>Apellido Materno:</label>
            <input type="text" class="form-control" ng-model="usuarioMod.ap_materno" required>
          </div>

          <div class="mb-3">
            <label>Correo:</label>
            <input type="email" class="form-control" ng-model="usuarioMod.correo" required>
          </div>

          <div class="mb-3">
            <label>Rol:</label>
            <select class="form-select" ng-model="usuarioMod.rol" required>
              <option value="">-- Selecciona --</option>
              <option value="admin">Admin</option>
              <option value="usuario">Usuario</option>
            </select>
          </div>

          <div class="mb-3">
            <label>Género:</label>
            <select class="form-select" ng-model="usuarioMod.genero">
              <option value="">-- Selecciona --</option>
              <option value="Masculino">Masculino</option>
              <option value="Femenino">Femenino</option>
              <option value="Otro">Marciano</option>
            </select>
          </div>

          <div class="mb-3">
            <label>Altura (cm):</label>
            <input type="number" class="form-control" ng-model="usuarioMod.altura" >
          </div>

          <div class="mb-3">
            <label>Peso (kg):</label>
            <input type="number" class="form-control" ng-model="usuarioMod.peso">
          </div>

          <div class="mb-3">
            <label>Contraseña (opcional):</label>
            <input type="password" class="form-control" ng-model="usuarioMod.password">
            <small class="form-text text-muted">Dejar vacío si no se desea cambiar la contraseña.</small>
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