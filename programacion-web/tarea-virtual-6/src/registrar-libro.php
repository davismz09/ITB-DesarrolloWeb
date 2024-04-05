<?php
include("./db-conexion.php");
include("./sesion-helper.php");

if (isset($_POST['registrar_libro'])) {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $cantidad = $_POST['cantidad'];

    // Validación de campos no vacíos
    if (empty($titulo) || empty($autor) || empty($cantidad)) {
        $_SESSION['message'] = 'Todos los campos son obligatorios';
        $_SESSION['message_type'] = 'danger';
        header("Location: index.php");
        exit; // Detener la ejecución del script
    }

    // Validación de tipo de datos esperado
    if (!is_numeric($cantidad)) {
        $_SESSION['message'] = 'La cantidad debe ser un número';
        $_SESSION['message_type'] = 'danger';
        header("Location: index.php");
        exit; // Detener la ejecución del script
    }

    // Sanitizar la entrada para evitar SQL injection
    $titulo = mysqli_real_escape_string($conn, $titulo);
    $autor = mysqli_real_escape_string($conn, $autor);
    $cantidad = mysqli_real_escape_string($conn, $cantidad);

    // Query de inserción
    $query = "INSERT INTO libro(titulo,autor,cantidad) VALUES ('$titulo','$autor','$cantidad')";
    $resultado = mysqli_query($conn, $query);

    if ($resultado) {
        $_SESSION['message'] = 'Libro Guardado Exitosamente';
        $_SESSION['message_type'] = 'success';
    } else {
        $_SESSION['message'] = 'Error al guardar el libro: ' . mysqli_error($conn);
        $_SESSION['message_type'] = 'danger';
    }

    header("Location: index.php");
    exit; // Detener la ejecución del script
}
