<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PowerZone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZJr9o5HEyPvR3XtSXLzvH4wwQn8KCh38lF5KZJwQVoZd5vyiJ+F0JGpG6jhM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ZMtdQFhPcPklE5D3OjnaWB5V4ScnUqywMKr+2QFUI0ttPsuCXjq4XhFz9TJoA6sI" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100..700&family=Dosis:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../build/css/app.css">
    <link rel="stylesheet" href="app.css">
    <link rel="icon" href="../src/img/icon.png" type="image/x-icon">
</head>

<body>
    <!-- Menú Normal (Solo visible en pantallas grandes) -->
    <header class="header d-none d-md-flex">
        <a href="home.php">
            <img class="logo" src="../src/img/logo.png" alt="logo">
        </a>
        <div class="contenedor">
            <div class="barra">
                <nav class="navegacion">
                    <a class="nav-link" href="home.php">Inicio</a>
                    <a class="nav-link" href="comunidad.php">Comunidad</a>
                    <div class="dropdown">
                        <a class="nav-link no-margin dropdown-toggle" href="#">Rutinas</a>
                        <div class="dropdown-content">
                            <a class="nav-link" href="#">Cardio</a>
                            <a class="nav-link" href="#">Fuerza</a>
                            <a class="nav-link" href="#">Flexibilidad</a>
                            <a class="nav-link" href="#">Resistencia</a>
                        </div>
                    </div>
                    <a class="nav-link" href="dietas.php">Dietas</a>
                </nav>
            </div>
            <div class="iconos">
                <div class="usuario dropdown">
                    <div class="user-link dropdown-toggle">
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round" width="24" height="24">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <circle cx="12" cy="7" r="4" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        </svg>
                        <?php
                        session_start();
                        echo $_SESSION['usuario'];
                        ?>
                    </div>
                    <div class="dropdown-content">
                        <a style="font-size: 18px" href="logout.php">Cerrar sesión</a>
                    </div>
                </div>
            </div>
    </header>

    <!-- Menú de Hamburguesa (Solo visible en pantallas pequeñas) -->
    <header class="navegacion-hamburguesa d-md-none">
        <a href="index.html">
            <img class="logo" src="../src/img/logo.png" alt="logo">
        </a>
        <label class="label_hamburguesa" for="menu_hamburguesa">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="list_icon" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
            </svg>
        </label>
        <input class="menu_hamburguesa" type="checkbox" id="menu_hamburguesa">
        <ul class="ul_links">
            <li class="il_links"><a class="nav-linkH" href="index.html">Inicio</a></li>
            <li class="il_links"><a class="nav-linkH" href="#">Comunidad</a></li>
            <li class="il_links">
                <div class="dropdown">
                    <a class="nav-linkH no-margin dropdown-toggle" href="#">Rutinas</a>
                    <div class="dropdown-content">
                        <a class="nav-linkH" href="#">Cardio</a>
                        <a class="nav-linkH" href="#">Fuerza</a>
                        <a class="nav-linkH" href="#">Flexibilidad</a>
                        <a class="nav-linkH" href="#">Resistencia</a>
                    </div>
                </div>
            </li>
            <li class="il_links"><a class="nav-linkH" href="#">Dietas</a></li>
        </ul>
        <div class="iconos">
            <div class="usuario">
                <a href="settings.php" class="user-link">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="12" cy="7" r="4" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    </svg>
                </a>
            </div>
        </div>
    </header>
</body>

</html>