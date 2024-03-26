<?php
include('./db-conexion.php');
include('./sesion-helper.php');

if (isset($_POST['actualizar_libro'])) {
    // Validar la entrada del usuario
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : '';
    $autor = isset($_POST['autor']) ? $_POST['autor'] : '';
    $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : '';

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

    // Prevenir la inyección de SQL utilizando consultas preparadas
    $query = "UPDATE libro SET titulo = ?, autor = ?, cantidad = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssii", $titulo, $autor, $cantidad, $id);
        $resultado = mysqli_stmt_execute($stmt);

        if ($resultado) {
            $_SESSION['message'] = 'Libro Actualizado Exitosamente';
            $_SESSION['message_type'] = 'info';
            header("Location: index.php");
            exit;
        } else {
            die("Error al actualizar el libro: " . mysqli_error($conn));
        }
    } else {
        die("Error en la preparación de la consulta: " . mysqli_error($conn));
    }
}
