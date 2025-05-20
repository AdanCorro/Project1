<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZJr9o5HEyPvR3XtSXLzvH4wwQn8KCh38lF5KZJwQVoZd5vyiJ+F0JGpG6jhM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ZMtdQFhPcPklE5D3OjnaWB5V4ScnUqywMKr+2QFUI0ttPsuCXjq4XhFz9TJoA6sI" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100..700&family=Dosis:wght@200..800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="assets/css/styles.css">
  <title>Administración</title>
  <link rel="icon" href="../src/img/icon.png" type="image/x-icon">
</head>

<body id="body-pd">
  <div class="l-navbar" id="navbar">
    <nav class="nav">
      <div>
        <div class="nav__brand">
          <ion-icon name="menu-outline" class="nav__toggle active" id="nav-toggle"></ion-icon>
          <a href="administrador.php" class="nav__logo">Administración</a>
        </div>
        <div class="nav__list">
          <a href="calendario.php" class="nav__link">
            <ion-icon name="calendar-outline" class="nav__icon"></ion-icon>
            <span class="nav__name">Calendario</span>
          </a>
          <a href="usuarios.php" class="nav__link">
            <ion-icon name="people-outline" class="nav__icon"></ion-icon>
            <span class="nav__name">Usuarios</span>
          </a>
          <a href="ejercicios.php" class="nav__link">
            <ion-icon name="barbell-outline" class="nav__icon"></ion-icon>
            <span class="nav__name">Ejercicios</span>
          </a>
          <a href="rutinas.php" class="nav__link">
            <ion-icon name="pie-chart-outline" class="nav__icon"></ion-icon>
            <span class="nav__name">Rutinas</span>
          </a>
          <div class="nav__link collapse">
            <ion-icon name="chatbubbles-outline" class="nav__icon"></ion-icon>
            <span class="nav__name">Comunidad</span>

            <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>

            <ul class="collapse__menu">
              <a href="#" class="collapse__sublink">Data</a>
              <a href="#" class="collapse__sublink">Group</a>
            </ul>
          </div>
          <a href="settings.php" class="nav__link">
            <ion-icon name="settings-outline" class="nav__icon"></ion-icon>
            <span class="nav__name">Ajustes</span>
          </a>
        </div>
      </div>

      <a href="home.php" class="nav__link active">
        <ion-icon name="log-out-outline" class="nav__icon"></ion-icon>
        <span class="nav__name">Cerrar sesión</span>
      </a>
    </nav>
  </div>
  <!-- ===== IONICONS ===== -->
  <!-- Ionicons versión moderna -->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


  <!-- ===== MAIN JS ===== -->
  <script src="assets/js/main.js"></script>
</body>