<?php
require_once '../modelos/Vivienda.php';
try {

    $vivienda = new Vivienda($_GET);

    $viviendas = $vivienda->buscar();
    //var_dump($viviendas);
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}
?>
<?php include_once '../../includes/header.php' ?>
<div class="container">
    <h1 class="text-center">Modificar Registro de Viviendas</h1>
    <div class="row justify-content-center">
        <form action="/moralesb_recuperacion/controladores/vivienda/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
            <input type="hidden" name="ID" value="<?= $viviendas[0]['ID'] ?>">
            <div class="row mb-3">
                <div class="col">
                    <label for="nombre_condominio">Condominio</label>
                    <input type="text" name="nombre_condominio" id="nombre_condominio" value="<?= $viviendas[0]['NOMBRE_CONDOMINIO'] ?>" class="form-control" required>
                </div>
                <div class="col">
                    <label for="numero_vivienda">Numero de Vivienda</label>
                    <input type="text" name="numero_vivienda" id="numero_vivienda" value="<?= $viviendas[0]['NUMERO_VIVIENDA'] ?>" class="form-control" required>

                </div>
                <div class="col">
                    <label for="propietaria">Propietario(a)</label>
                    <input type="text" name="propietaria" id="propietaria" value="<?= $viviendas[0]['propietaria'] ?>" class="form-control" required>

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