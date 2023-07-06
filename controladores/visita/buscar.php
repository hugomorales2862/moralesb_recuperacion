
<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require_once '../../modelos/Visita.php';
try {
  
    $visita = new Visita($_GET);
    // var_dump($visita);
    // exit;
    
    $visitas = $visita->buscar();
  
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Resultados</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>NO. </th>
                            <th>NOMBRES DEL VISITANTE</th>
                            <th>DPI DEL VISITANTE</th>
                            <th>HORA DE INGRESO</th>
                            <th>HORA DE SALIDA</th>
                            <th>MODIFICAR</th>
                            <th>ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($visitas) > 0):?>
                        <?php foreach($visitas as $key => $visita) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $visita['NOMBRE'] ?></td>
                            <td><?= $visita['DPI'] ?></td>
                            <td><?= $visita['HORA_INGRESO'] ?></td>
                            <td><?= $visita['HORA_SALIDA'] ?></td>
                            <td><a class="btn btn-warning w-100" href="/moralesb_recuperacion/vistas/visita/modificar.php?ID=<?= $visita['ID']?>">Modificar</a></td>
                            <td><a class="btn btn-danger w-100" href="/moralesb_recuperacion/controladores/visita/eliminar.php?ID=<?= $visita['ID']?>">Eliminar</a></td>
                        </tr>
                        <?php endforeach ?>
                        <?php else :?>
                            <tr>
                                <td colspan="3">NO EXISTEN REGISTROS</td>
                            </tr>
                        <?php endif?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <a href="/moralesb_recuperacion/vistas/visita/buscar.php" class="btn btn-info w-100">Volver al formulario</a>
            </div>
        </div>
    </div>
</body>
</html>