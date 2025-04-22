<?php require_once 'encabezadoAdm.php'; ?>
<script src="./controlador/angular.min.js"></script>
<script src="./controlador/administracion.js "></script>

<body ng-controller="admCtrl">
  <div class="container">

    <br>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btnadmCtrl btn-info btn-lg" data-toggle="modal" data-target="#myModal">Agregar
      Usuario</button>

    <h2 class="admin-titulo">Administrar Usuarios </h2>
    <table class="table table-hover table-responsive table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Apellido Paterno</th>
          <th>Apellido Materno</th>
          <th>Correo</th>
          <th>Fecha de Nacimiento</th>
          <th>Género</th>
          <th>Altura</th>
          <th>Peso</th>
          <th>Modificar <span class="glyphicon glyphicon-pencil"> </span></th>
          <th>Eliminar <span class="glyphicon glyphicon-trash"> </span> </th>
        </tr>
      </thead>
      <tbody>
        <tr ng-repeat="u in usuarios">
          <td>{{u.id}}</td>
          <td class="nombre">{{u.nombre}}</td>
          <td>{{u.ap_paterno}}</td>
          <td>{{u.ap_materno}}</td>
          <td>{{u.correo}}</td>
          <td>{{u.fecha_nacimiento}}</td>
          <td>{{u.genero}}</td>
          <td>{{u.altura}}</td>
          <td>{{u.peso}}</td>
          <td>
            <butoon type="button" ng_click="seleccionar(u)" class="btn btn-success">
              <span class="glyphicon glyphicon-pencil"> </span>
            </butoon>
          </td>
          <td>
            <butoon type="button" ng-click="eliminar(u)" class="btn btn-danger">
              <span class="glyphicon glyphicon-trash"> </span>
            </butoon>
          </td>
        </tr>
    </table>

    <!-- Modal Agregar Usuario -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Usuario</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal">

              <div class="form-group">
                <label class="control-label col-sm-3">Nombre:</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" ng-model="usuario.nombre" placeholder="Nombre">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3">Apellido Paterno:</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" ng-model="usuario.ap_paterno" placeholder="Apellido Paterno">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3">Apellido Materno:</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" ng-model="usuario.ap_materno" placeholder="Apellido Materno">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3">Correo:</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" ng-model="usuario.correo" placeholder="Correo electrónico">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3">Rol:</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" ng-model="usuario.rol" placeholder="Rol del usuario">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3">Contraseña:</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" ng-model="usuario.password" placeholder="Contraseña">
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-8">
                  <button type="submit" ng-click="guardar()" class="btn btn-primary">Agregar</button>
                </div>
              </div>
            </form>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Fin Agregar Usuario -->

    <!-- Modal Modificar Usuario -->
    <div id="ModalMod" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modificar Usuario</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal">

              <div class="form-group">
                <label class="control-label col-sm-3">Nombre:</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" ng-model="usuarioMod.nombre" placeholder="Nombre">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3">Apellido Paterno:</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" ng-model="usuarioMod.ap_paterno" placeholder="Apellido Paterno">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3">Apellido Materno:</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" ng-model="usuarioMod.ap_materno" placeholder="Apellido Materno">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3">Correo:</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" ng-model="usuarioMod.correo" placeholder="Correo electrónico">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3">Rol:</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" ng-model="usuarioMod.rol" placeholder="Rol del usuario">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3">Contraseña:</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" ng-model="usuarioMod.password" placeholder="Contraseña (opcional)">
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-8">
                  <button type="submit" ng-click="modificar()" class="btn btn-primary">Guardar Cambios</button>
                </div>
              </div>

            </form>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Fin Modificar Usuario -->
  </div>
</body>

</html>