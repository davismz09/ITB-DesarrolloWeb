<?php
// Inicializar variables para el resumen de estudiantes
$total_alumnos = 0;
$total_aprobados = 0;
$total_desaprobados = 0;
$alumno_max_promedio = "";
$max_promedio = 0;
$alumno_min_promedio = "";
$min_promedio = 20; // Inicializado con la nota máxima posible

// Leer nombres y notas desde el archivo de texto
$datos = file("datos.txt", FILE_IGNORE_NEW_LINES);
// Contar el número total de alumnos y calcular el total de aprobados y desaprobados
foreach ($datos as $dato) {
    list($nombre, $nota) = explode(",", $dato);
    $total_alumnos++;
    if ($nota >= 10) {
        $total_aprobados++;
    } else {
        $total_desaprobados++;
    }
    // Actualizar el alumno con mayor promedio
    if ($nota > $max_promedio) {
        $alumno_max_promedio = $nombre;
        $max_promedio = $nota;
    }
    // Actualizar el alumno con menor promedio
    if ($nota < $min_promedio) {
        $alumno_min_promedio = $nombre;
        $min_promedio = $nota;
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro e Informe de Notas</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <header>
        <h1>Informe de Notas - Asociativo</h1>
        <img src="https://www.shutterstock.com/image-photo/cute-little-children-nursery-teacher-600nw-2160303655.jpg" alt="Banner profesora">
    </header>
    <div class="container">
        <section>
            <!-- Formulario para ingresar notas -->
            <h2>Ingresar Notas</h2>
            <form action="notas.php" method="post">
                <input type="text" name="nombre" placeholder="Nombre del Estudiante" required>
                <input type="number" name="nota" placeholder="Nota" min="0" max="20" required>
                <button type="submit">Agregar Nota</button>
            </form>

            <!-- Tabla de Notas -->
            <h2>Tabla de Notas</h2>
            <table>
                <thead>
                    <tr>
                        <th>N° Orden</th>
                        <th>Alumno</th>
                        <th>Nota</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Mostrar las notas en la tabla
                    foreach ($datos as $index => $dato) {
                        list($nombre, $nota) = explode(",", $dato);
                        echo "<tr><td>" . ($index + 1) . "</td><td>$nombre</td><td>$nota</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <!-- Botón para mostrar u ocultar el resumen -->
            <button onclick="toggleResumen()">Mostrar Resumen</button>

            <!-- Resumen de Estudiantes -->
            <div id="resumen" class="oculto">
                <h2>Resumen de Estudiantes</h2>
                <div class="tabla-resumen">
                    <table>
                        <thead>
                            <tr>
                                <th>Total de Alumnos</th>
                                <th>Total de Aprobados</th>
                                <th>Total de Desaprobados</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $total_alumnos; ?></td>
                                <td><?php echo $total_aprobados; ?></td>
                                <td><?php echo $total_desaprobados; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tabla-resumen">
                    <table>
                        <thead>
                            <tr>
                                <th>Alumno con mayor promedio</th>
                                <th>Alumno con menor promedio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $alumno_max_promedio; ?> (<?= $max_promedio; ?>)</td>
                                <td><?= $alumno_min_promedio; ?> (<?= $min_promedio; ?>)</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <script>
        function toggleResumen() {
            var resumen = document.getElementById("resumen");
            if (resumen.classList.contains("oculto")) {
                resumen.classList.remove("oculto");
                resumen.classList.add("visible");
            } else {
                resumen.classList.remove("visible");
                resumen.classList.add("oculto");
            }
        }
    </script>
</body>

</html>