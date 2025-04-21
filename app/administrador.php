<?php require_once 'encabezadoAdm.php'; ?>
<main class="contenido">

  <div class="informacion">
    <h2 class="titulo">Administración</h2>
    <p class="parrafo">
      Bienvenido al panel de administración. Desde aquí podrás gestionar usuarios, rutinas, reportes y más. Utiliza las opciones de abajo para navegar por las secciones disponibles.
    </p>
  </div>

  <section class="admin-menu contenedor">
    <div class="admin-grid">
      <div class="admin-card">
        <h3 class="admin-card__titulo">Usuarios</h3>
        <p class="admin-card__texto">Administra los usuarios registrados en el sistema.</p>
        <a href="admUsuarios.php" class="admin-card__boton">Ver</a>
      </div>

      <div class="admin-card">
        <h3 class="admin-card__titulo">Rutinas</h3>
        <p class="admin-card__texto">Crea, edita o elimina rutinas de ejercicio.</p>
        <a href="rutinas.php" class="admin-card__boton">Ver</a>
      </div>

      <div class="admin-card">
        <h3 class="admin-card__titulo">Reportes</h3>
        <p class="admin-card__texto">Genera reportes de actividad y progreso.</p>
        <a href="reportes.php" class="admin-card__boton">Ver</a>
      </div>

      <div class="admin-card">
        <h3 class="admin-card__titulo">Configuración</h3>
        <p class="admin-card__texto">Gestiona las preferencias del sistema.</p>
        <a href="configuracion.php" class="admin-card__boton">Ver</a>
      </div>
    </div>
  </section>

</main>


<?php require_once 'footer.php'; ?>