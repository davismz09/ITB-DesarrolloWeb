<?php
include('./db-conexion.php');
$query = "SELECT * FROM libro";
$resultado = mysqli_query($conn, $query);
if (!$resultado) {
    die("Error al actualizar el libro: " . mysqli_error($conn));
}
while ($row = $resultado->fetch_assoc()) {
    $id = $row['id'];
    $titulo = $row['titulo'];
    $autor = $row['autor'];
    $cantidad = $row['cantidad'];
    echo '
            <div class="modal fade" id="staticBackdrop' . $id . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5">Editar Producto</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Aquí se mostrará el formulario de edición -->
                            <form id="form_editar" action="./actualizar-libro.php?id=' . $id . '" method="POST">
                                <div class="form-group mb-3">
                                    <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Actualizar titulo" autofocus required value="' . $titulo . '">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" name="autor" id="autor" class="form-control" placeholder="Actualizar autor" autofocus required value="' . $autor . '">
                                </div>
                                <div class=" form-group mb-3">
                                    <input type="text" name="cantidad" id="cantidad" class="form-control" placeholder="Actualizar cantidad" autofocus required value="' . $cantidad . '">
                                </div>
                                <input type="submit" class="btn btn-success btn-block" name="actualizar_libro" value="Actualizar Libro" autofocus required>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        ';
}
