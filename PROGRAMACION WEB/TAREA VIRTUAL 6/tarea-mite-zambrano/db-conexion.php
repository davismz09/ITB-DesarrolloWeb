<?php
$conn = mysqli_connect('localhost', 'root', '', 'bd_biblioteca');

// Verificar la conexión
if (mysqli_connect_errno()) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}

return $conn;
