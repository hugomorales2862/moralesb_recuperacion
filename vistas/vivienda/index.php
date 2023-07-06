<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
<div class="container mt-5">
  <h1 class="text-center mt-3">Registro de viviendas</h1>
  <div class="row justify-content-center mt-2">
    <form action="/moralesb_recuperacion/controladores/vivienda/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
      <div class="row mb-3">
        <div class="col">
          <label for="nombre_condominio" class="form-label">Nombre del Condominio</label>
          <input type="text" name="nombre_condominio" id="nombre_condominio" class="form-control" required>
          <div class="col">
          <label for="numero_vivienda" class="form-label">Ingrese el numero de Vivienda</label>
          <input type="number" name="numero_vivienda" id="numero_vivienda" class="form-control" required>
        </div>
        <div class="col">
          <label for="propietaria" class="form-label">Ingrese el nombre del Propietario (A)</label>
          <input type="text" name="propietaria" id="propietaria" class="form-control" required>
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