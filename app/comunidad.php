<?php require_once 'encabezado.php'; ?>
<body>

  <!-- Contenedor principal -->
  <main class="rs-container">
    
    <!-- Columna lateral izquierda -->
    <aside class="rs-sidebar-left">
      <ul class="rs-menu-list">
        <li><a href="#">Amigos</a></li>
        <li><a href="#">Mensajes</a></li>
        <li><a href="#">Notificaciones</a></li>
      </ul>
    </aside>

    <!-- Sección principal de publicaciones -->
    <section class="rs-feed">

      <!-- Crear nueva publicación -->
      <div class="rs-create-post">
        <form id="rs-new-post-form">
          <textarea placeholder="¿Qué estás pensando?" name="post_content" required class="rs-textarea"></textarea>
          <div class="rs-post-actions">
            <input type="file" name="imagen" accept="image/*" class="rs-file-input">
            <button type="submit" class="rs-post-btn">Publicar</button>
          </div>
        </form>
      </div>

      <!-- Lista de publicaciones -->
      <div class="rs-post">
        <div class="rs-post-header">
          <img src="#" alt="Foto de perfil" class="rs-profile-pic">
          <div>
            <strong>Usuario Ejemplo</strong>
            <span class="rs-timestamp">Hace 5 minutos</span>
          </div>
        </div>
        <div class="rs-post-content">
          <p>¡Hola mundo! Esta es mi primera publicación.</p>
          <img src="#" alt="Foto publicada" class="rs-post-image">
        </div>
        <div class="rs-post-footer">
          <button class="rs-action-btn">👍 Me gusta</button>
          <button class="rs-action-btn">💬 Comentar</button>
          <button class="rs-action-btn">🔁 Compartir</button>
        </div>
      </div>

      <!-- Más publicaciones... -->

    </section>

    <!-- Columna lateral derecha -->
    <aside class="rs-sidebar-right">
      <h4 class="rs-suggestions-title">Sugerencias</h4>
      <ul class="rs-suggestions-list">
        <li><a href="#">Seguir a Juan</a></li>
        <li><a href="#">Seguir a Ana</a></li>
      </ul>
    </aside>
  </main>
  <?php require_once 'footer.php'; ?>
</body>
</html>
