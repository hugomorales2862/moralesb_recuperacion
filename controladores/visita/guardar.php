<?php
require_once '../../modelos/Visita.php';

$_POST['hora_ingreso'] = str_replace('T',' ', $_POST['hora_ingreso']);
$_POST['hora_salida'] = str_replace('T',' ', $_POST['hora_salida']);


if ($_POST['hora_salida'] === '') {
    $_POST['hora_salida'] = null;
}

if ($_POST['nombre'] != '' && $_POST['dpi'] != '' && $_POST['hora_ingreso'] != '') {
    try {
        $visita = new Visita($_POST);
        $resultado = $visita->guardar();
        if ($resultado) {
        
        } else {
            $error = "NO se guardó correctamente";
        }
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2) {
        $error = $e2->getMessage();
    }
} else {
    $error = "Debe llenar todos los datos";
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
        <div class="row">
            <div class="col-lg-6">
                <?php if($resultado): ?>
                    <div class="alert alert-success" role="alert">
                        Guardado exitosamente!
                    </div>
                <?php else :?>
                    <div class="alert alert-danger" role="alert">
                        Ocurrió un error: <?= $error ?>
                    </div>
                <?php endif ?>
              
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
            <a href="/moralesb_recuperacion/vistas/visita/index.php" class="btn btn-info w-100">Volver al formulario</a>
            </div>
        </div>
    </div>
</body>
</html>