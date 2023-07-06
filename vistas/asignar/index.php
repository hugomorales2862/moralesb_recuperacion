<?php include_once '../../includes/header.php' ?>
<?php include_once '../../includes/navbar.php' ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../modelos/Visita.php';
require '../../modelos/Vivienda.php';
try {

    $visita = new Visita();

    $visitas = $visita->buscar();
    // var_dump($visitas);
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}


try {

    $vivienda = new Vivienda();


    $viviendas = $vivienda->buscar();
    // var_dump($viviendas);
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}

?>

<div class="container mt-5">
    <h1 class="text-center mt-3">ASIGNACIÓN DE VISITAS</h1>
    <div class="row justify-content-center mt-2">
        <form action="/moralesb_recuperacion/controladores/asignar/guardar.php" method="POST" class="border border-primary rounded p-3 bg-light col-md-6">
            <div class="row mb-3">
                <div class="col">
                    <label for="visita">SELECCIONE EL NOMBRE DEL VISITANTE</label>
                    <select name="visita" id="visita" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($visitas as $key => $visita) : ?>
                            <option value="<?= $visita['ID'] ?>"><?= $visita['NOMBRE'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <div class="col">
                        <label for="vivienda">SELECCIONE EL NOMBRE DE LA PERSONA A QUIEN VISITA</label>
                        <select name="vivienda" id="vivienda" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($viviendas as $key => $vivienda) : ?>
                                <option value="<?= $vivienda['ID'] ?>"><?= $vivienda['PROPIETARIA'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Guardar</button>
        </form>
    </div>
</div>


<?php include_once '../../includes/footer.php' ?>