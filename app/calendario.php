<?php require_once 'encabezadoAdm.php'; ?>

<body>
  <div class="calendar">
    <div class="header">
      <button id="prevBtn">
        <i class="fa-solid fa-chevron-left"></i>
      </button>
      <div class="monthYear" id="monthYear"></div>
      <button id="nextBtn">
        <i class="fa-solid fa-chevron-right"></i>
      </button>

    </div>
    <div class="days">
      <div class="day">Lun</div>
      <div class="day">Mar</div>
      <div class="day">Mie</div>
      <div class="day">Jue</div>
      <div class="day">Vie</div>
      <div class="day">Sáb</div>
      <div class="day">Dom</div>
    </div>
    <div class="dates" id="dates"></div>
  </div>

  <script src="controlador/calendario.js"></script>
</body>

</html>