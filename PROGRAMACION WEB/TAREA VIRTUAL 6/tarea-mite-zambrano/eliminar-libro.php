<?php
include('./db-conexion.php');
include('./sesion-helper.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM libro WHERE id = $id";
    $resultado = mysqli_query($conn, $query);
    if (!$resultado) {
        die("Error al actualizar el libro: " . mysqli_error($conn));
    }

    $_SESSION['message'] = 'Libro Eliminado Exitosamente';
    $_SESSION['message_type'] = 'danger';

    header("Location: index.php");
}
