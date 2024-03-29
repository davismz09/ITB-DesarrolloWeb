<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $nota = $_POST['nota'];

    if (!empty($nombre) && !empty($nota) && is_numeric($nota) && $nota >= 0 && $nota <= 20) {
        // Almacenar en un archivo de texto (puedes cambiar la estructura según tus necesidades)
        $linea = "$nombre,$nota" . PHP_EOL;
        file_put_contents("datos.txt", $linea, FILE_APPEND | LOCK_EX);

        // Redirigir de vuelta a la página principal
        header("Location: index.php");
        exit; // Asegura que el script se detenga después de la redirección
    } else {
        echo "Error: El nombre no puede estar vacío y la nota debe ser un número entre 0 y 20.";
    }
}
