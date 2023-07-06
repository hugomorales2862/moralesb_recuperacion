<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
<div class="container mt-5">
  <h1 class="text-center mt-3">Registro de Visitas</h1>
  <div class="row justify-content-center mt-2">
    <form action="/moralesb_recuperacion/controladores/visita/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
      <div class="row mb-3">
        <div class="col">
          <label for="nombre" class="form-label">Ingrese el Nombre de la Persona Visitante</label>
          <input type="text" name="nombre" id="nombre" class="form-control" required>
          <div class="col">
          <label for="dpi" class="form-label">Ingrese el Numero de DPI</label>
          <input type="number" name="dpi" id="dpi" class="form-control" required>
        </div>
        <div class="col">
          <label for="hora_ingreso" class="form-label">Ingrese la Hora de ingreso</label>
          <input type="datetime-local" name="hora_ingreso" id="hora_ingreso" class="form-control" required>
        </div>
        <div class="col">
          <label for="hora_salida" class="form-label">Ingrese la Hora de salida</label>
          <input type="datetime-local" name="hora_salida" id="hora_salida" class="form-control" required>
        </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
          <button type="submit" class="btn btn-primary w-100">Guardar</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php include_once '../../includes/footer.php'?>