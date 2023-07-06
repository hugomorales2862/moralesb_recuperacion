<?php
require_once '../../modelos/Visita.php';
try {

    $visita = new Visita($_GET);

    $visitas = $visita->buscar();
    //var_dump($visitas);
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}
?>
<?php include_once '../../includes/header.php' ?>
<div class="container">
    <h1 class="text-center">Modificar Registro de visitas</h1>
    <div class="row justify-content-center">
        <form action="/moralesb_recuperacion/controladores/visita/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
            <input type="hidden" name="ID" value="<?= $visitas[0]['ID'] ?>">
            <div class="row mb-3">
                <div class="col">
                    <label for="nombre">nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?= $visitas[0]['NOMBRE'] ?>" class="form-control" required>
                </div>
                <div class="col">
                    <label for="dpi">Numero de DPI</label>
                    <input type="number" name="dpi" id="dpi" value="<?= $visitas[0]['DPI'] ?>" class="form-control" required>

                </div>
                <div class="col">
                    <label for="hora_ingreso">Hora de ingreso </label>
                    <input type="text" name="hora_ingreso" id="hora_ingreso" value="<?= $visitas[0]['HORA_INGRESO'] ?>" class="form-control" >

                </div>
                <div class="col">
                    <label for="hora_salida">Hora de salida</label>
                    <input type="text" name="hora_salida" id="hora_salida" value="<?= $visitas[0]['HORA_SALIDA'] ?>" class="form-control" >

                </div>
              
            </div>

            <div class="row mb-3">
                <div class="col">
                    <button type="submit" class="btn btn-warning w-100">Modificar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include_once '../../includes/footer.php' ?>