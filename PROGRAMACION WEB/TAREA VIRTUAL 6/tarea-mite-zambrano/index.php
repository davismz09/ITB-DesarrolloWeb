<?php
include('./sesion-helper.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="David MIte Zambrano">
    <title>Tarea Virtual 6 | DSE08 | Mite Zambrano</title>
    <script src="js/jquery-3.6.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

</head>

<body>
    <div class="container p-4">
        <div class="row">
            <!-- FORMULARIO PARA AGREGAR LIBROS -->
            <div class="col-md-4">
                <?php if (isset($_SESSION['message'])) : ?>
                    <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php session_unset();
                endif; ?>
                <div class="card card-body">
                    <h1 class="fs-5 mb-3">Agregar Nuevo Libro</h1>
                    <form action="./registrar-libro.php" method="POST">
                        <div class="form-group mb-3">
                            <input type="text" name="titulo" class="form-control" placeholder="Titulo del libro" autofocus required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" name="autor" class="form-control" placeholder="Autor del libro" autofocus required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" name="cantidad" class="form-control" placeholder="Cantidad del libro" autofocus required>
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="registrar_libro" value="Registrar Libro" autofocus required>
                    </form>
                </div>
            </div>
            <?php include('./listado.php'); ?>
            <?php include('./modal-obtener-libro.php'); ?>
        </div>
    </div>
    <script src="./js/evitar-reenvio.js"></script>
</body>

</html>