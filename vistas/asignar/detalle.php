<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../modelos/Visita.php';
require '../../modelos/Vivienda.php';
require '../../modelos/asignar.php';

try {

    $visita = new Visita($_GET);
    $vivienda = new Vivienda($_GET);
    $detalle = new asignar();

    $visitas = $visita->buscar();
    $viviendas = $vivienda->buscar();
    $detalles = $detalle->inf();
    // echo var_dump($detalles);
    // exit;

    $fecha = date('d/m/Y', strtotime($visitas[0]['HORA_INGRESO']));
    // echo $fecha;
    // exit;
   

} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}

?>
<?php include_once '../../includes/header.php' ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 table-responsive">
            <table class="table table-bordered">
                <thead>
                <?php if (count($detalles) > 0) : ?>
                    <?php
                    $condominios = array();

                    // Obtener la lista de condominios
                    foreach ($detalles as $detalle) {
                        $condominios[] = $detalle['CONDOMINIO'];
                    }

                    // Eliminar duplicados y ordenar alfabéticamente
                    $condominios = array_unique($condominios);
                    sort($condominios);
                    ?>
                    <?php foreach ($condominios as $condominio) : ?>
                        <tr class="text-center">
                            <th colspan="5"><?php echo "INGRESOS DEL DIA" . " " . $fecha ?></th>
                        </tr>
                        <tr class="text-center table-dark">
                            <th colspan="5"><?php echo "CONDOMINIO" . " " . $condominio ?></th>
                        </tr>
                        <?php
                        $detallesCondominio = array_filter($detalles, function ($detalle) use ($condominio) {
                            return $detalle['CONDOMINIO'] === $condominio;
                        });
                        if (count($detallesCondominio) === 0) {
                            echo '<tr><td colspan="5">NO EXISTEN REGISTROS</td></tr>';
                        } else {
                            ?>
                            <tr class="text-center table-dark">
                                <?php if (isset($detallesCondominio[0]['NUMERO_VIVIENDA']) && isset($detallesCondominio[0]['PROPIETARIA'])) : ?>
                                    <th colspan="5"><?php echo "VIVIENDA" . " " . $detallesCondominio[0]['NUMERO_VIVIENDA'] . "-" . $detallesCondominio[0]['PROPIETARIA'] ?></th>
                                <?php else : ?>
                                    <th colspan="5">VIVIENDA -</th>
                                <?php endif; ?>
                            </tr>
                            <tr>
                                <th>NO.</th>
                                <th>NOMBRE</th>
                                <th>DPI</th>
                                <th>HORA INGRESO</th>
                                <th>HORA SALIDA</th>
                            </tr>
                            <?php foreach ($detallesCondominio as $key => $detalle) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $detalle['VISITANTE'] ?></td>
                                    <td><?= $detalle['DPI'] ?></td>
                                    <td><?= $detalle['HORA_INGRESO'] ?></td>
                                    <td>
                                        <?php if ($detalle['HORA_SALIDA'] === null) {
                                            echo "SIN SALIDA";
                                        } else {
                                            echo $detalle['HORA_SALIDA'];
                                        } ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php } ?>
                    <?php endforeach; ?>

                <?php else : ?>
                    <tr>
                        <td colspan="5">NO EXISTEN REGISTROS</td>
                    </tr>
                <?php endif ?>
                </thead>
            </table>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <a href="/vistas/asignar/buscar.php" class="btn btn-info w-100">Volver al formulario</a>
        </div>
    </div>
</div>
<?php include_once '../../includes/footer.php' ?>


