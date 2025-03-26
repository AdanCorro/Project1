<!DOCTYPE html>
<html lang="en" ng-app="app">

<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PowerZone</title>
  <link rel="icon" href="../src/img/icon.png" type="image/x-icon">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/margenes.css">
  <script src="./controlador/jquery.min.js"></script>
  <script src="./controlador/bootstrap.min.js"></script>
  <script src="./controlador/angular.min.js"></script>
</head>

<header>
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="./index.php">Power Zone</a>
      </div>

      <div class="collapse navbar-collapse" id="myNavbar">
        <form class="navbar-form navbar-right" action="../api/login.php" method="post" role="form">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" class="form-control" name="correo" placeholder="Correo" required>
          </div>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" class="form-control" name="pass" placeholder="Contraseña" required>
          </div>
          <button type="submit" class="btn btn-info" name="login">Iniciar sesión</button>
        </form>
      </div>
    </div>
  </nav>
</header>

<script src="./controlador/index.js"></script>

<body ng-controller="indexCtrl">
  <div id="content" class="container">

    <div class="row">
      <div class="col-md-7">
        <h2>¡Bienvenido a Power Zone!</h2>
        <img src="" class="img-responsive img-rounded">
      </div>

      <div class="col-md-5">
        <h1> Regístrate</h1>
        <form class="form-horizontal" name="form" novalidate>
          <div class="form-group">
            <label class="col-sm-4 control-label"> Email: </label>
            <div class="col-sm-8">
              <input type="email" class="form-control" name="correo" ng-model="usuario.correo" placeholder="Email" required
                ng-pattern="/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/">
              <div ng-show="form.correo.$touched && form.correo.$invalid" class="text-danger">
                Por favor ingresa un correo válido.
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 control-label"> Nombre: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="nombre" ng-model="usuario.nombre" placeholder="Nombre" required>
              <div ng-show="form.nombre.$touched && form.nombre.$invalid" class="text-danger">
                El nombre es obligatorio.
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 control-label"> Apellido Paterno: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="ap_paterno" ng-model="usuario.ap_paterno" placeholder="Apellido Paterno" required>
              <div ng-show="form.ap_paterno.$touched && form.ap_paterno.$invalid" class="text-danger">
                El apellido paterno es obligatorio.
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 control-label"> Apellido Materno: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="ap_materno" ng-model="usuario.ap_materno" placeholder="Apellido Materno" required>
              <div ng-show="form.ap_materno.$touched && form.ap_materno.$invalid" class="text-danger">
                El apellido materno es obligatorio.
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 control-label"> Contraseña: </label>
            <div class="col-sm-8 inputGroupContainer">
              <div class="input-group">
                <input type="password" class="form-control" name="password" ng-model="usuario.password" placeholder="Contraseña" required ng-minlength="6">
                <span class="input-group-addon" ng-mousemove="entro()" ng-mouseout="salio()" title="Mostrar contraseña">
                  <i class="glyphicon glyphicon-eye-open"></i>
                </span>
              </div>
              <div ng-show="form.password.$touched && form.password.$error.minlength" class="text-danger">
                La contraseña debe tener al menos 6 caracteres.
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
              <button type="submit" ng-click="guardar()" ng-disabled="form.$invalid" class="btn btn-success btn-lg">
                Crear cuenta
              </button>
              <div class="alert alert-info col-xs-12" style="width:150px;padding:10px;text-align:center;" ng-show="registroExitoso">
                Registrado
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>


</div>
</body>

<?php require_once 'footer.php'; ?>

</html>