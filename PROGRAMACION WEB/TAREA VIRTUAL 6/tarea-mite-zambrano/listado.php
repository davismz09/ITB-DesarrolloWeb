<?php
include('./db-conexion.php');
include('./sesion-helper.php');

// Consulta para obtener los libros
$query = "SELECT * FROM libro";
$resultado_libros = mysqli_query($conn, $query);

// Verificar si hay errores en la consulta
if (!$resultado_libros) {
    $error_message = "Error al obtener los libros: " . mysqli_error($conn);
} else {
    $error_message = ""; // Reiniciar el mensaje de error
}
?>
<div class="col-8">
    <?php if (!empty($error_message)) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $error_message ?>
        </div>
    <?php else : ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($resultado_libros)) : ?>
                    <tr>
                        <td><?= $row['titulo'] ?></td>
                        <td><?= $row['autor'] ?></td>
                        <td><?= $row['cantidad'] ?></td>
                        <td>
                            <!-- BOTON EDITAR -->
                            <button class="btn btn-secondary btn-editar" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $row['id'] ?>">
                                <span class="material-symbols-outlined">
                                    edit
                                </span>
                            </button>
                            <a href="./eliminar-libro.php?id=<?= $row['id'] ?>" class="btn btn-danger">
                                <span class="material-symbols-outlined">
                                    delete
                                </span>
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>