<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
    <div class="container">
        <h1 class="text-center">Buscar</h1>
        <div class="row justify-content-center">
            <form action="/moralesb_recuperacion/controladores/asignar/buscar.php" method="GET" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                        <label for="visita">Nombre del visitante</label>
                        <input type="text" name="visita" id="visita" class="form-control" >
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-info w-100">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include_once '../../includes/footer.php'?>