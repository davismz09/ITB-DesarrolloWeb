<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mensualidades || David Mite Zambrano DSE08</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<style>
    /* Estilos para el formulario */
    .main {
        width: 100%;
        margin: 20px auto;
        text-align: center;
    }

    .header h1 {
        margin: 5px 0;
        text-align: center;
    }

    .form-table {
        width: 50%;
        margin: 0 auto;
        border-collapse: collapse;
    }

    .form-table td {
        padding: 5px;
    }

    .image-row img {
        display: block;
        margin: 0 auto;
        width: 400px;
        height: auto;
    }

    .error-message {
        color: red;
        font-size: 14px;
    }

    .submit-row {
        text-align: center;
    }

    .submit-row button {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .submit-row button:hover {
        background-color: #0056b3;
    }

    /* Estilos para los campos de entrada y selección */
    .nombre,
    .promedio {
        width: 100%;
        padding: 8px;
        margin: 2px 0;
        box-sizing: border-box;
    }

    .seleccion {
        width: 100%;
        padding: 8px;
        margin: 5px 0;
        box-sizing: border-box;
    }

    /* Estilos para los campos de resultado */
    .resultado {
        font-size: 16px;
        font-weight: bold;
    }
</style>

<body>

    <?php
    error_reporting(0);
    $nombre_error = $categoria_error = $promedio_error = '';
    $costo_mensual = $monto_descuento = $monto_cancelar = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $nombre = $_POST['nombre'] ?? '';
        $categoria = $_POST['categoria'] ?? '';
        $promedio = $_POST['promedio'] ?? '';

        // Validaciones
        if (empty($nombre)) $nombre_error = "Debe registrar nombre del alumno.";
        if (empty($categoria)) $categoria_error = "Debe seleccionar una categoría.";
        if (empty($promedio) || !is_numeric($promedio) || $promedio < 0 || $promedio > 20) {
            $promedio_error = "Debe registrar correctamente el promedio (0-20).";
        }

        // Lógica del negocio si pasa las validaciones
        if (empty($nombre_error) && empty($categoria_error) && empty($promedio_error)) {
            switch ($categoria) {
                case 'A':
                    $costo_mensual = 850.00;
                    break;
                case 'B':
                    $costo_mensual = 750.00;
                    break;
                case 'C':
                    $costo_mensual = 650.00;
                    break;
                case 'D':
                    $costo_mensual = 500.00;
                    break;
            }

            $porcentaje_descuento = 0;
            if ($promedio >= 13 && $promedio <= 15) {
                $porcentaje_descuento = 10;
            } elseif ($promedio >= 16 && $promedio <= 17) {
                $porcentaje_descuento = 15;
            } elseif ($promedio >= 18 && $promedio <= 19) {
                $porcentaje_descuento = 25;
            } elseif ($promedio == 20) {
                $porcentaje_descuento = 50;
            }

            $monto_descuento = ($costo_mensual * $porcentaje_descuento) / 100;
            $monto_cancelar = $costo_mensual - $monto_descuento;
        }
    }
    ?>

    <main>
        <section>
            <form action="" method="post">
                <table class="form-table">
                    <tr>
                        <td colspan="3" class="header">
                            <h1>Mensualidad de Universidad</h1>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="image-row">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTaQVr_B9kI2iEefaFT6yovmPnbBWeEVf06RQ&usqp=CAU" alt="Estudiantes" class="form-image">
                        </td>
                    </tr>
                    <tr>
                        <td>Nombre completo del alumno:</td>
                        <td>
                            <input type="text" name="nombre" class="nombre" require value="<?php echo htmlspecialchars($nombre ?? '') ?>">
                        </td>
                        <td class="error-message">
                            <?php echo $nombre_error; ?>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Seleccione la categoría:</td>
                        <td>
                            <select name="categoria" class="seleccion">
                                <option value="">Seleccione una categoría</option>
                                <option value="A" <?php echo (isset($categoria) && $categoria == 'A') ? 'selected' : ''; ?>>A</option>
                                <option value="B" <?php echo (isset($categoria) && $categoria == 'B') ? 'selected' : ''; ?>>B</option>
                                <option value="C" <?php echo (isset($categoria) && $categoria == 'C') ? 'selected' : ''; ?>>C</option>
                                <option value="D" <?php echo (isset($categoria) && $categoria == 'D') ? 'selected' : ''; ?>>D</option>
                            </select>
                        </td>
                        <td class="error-message"><?php echo $categoria_error; ?></td>
                    </tr>
                    <tr>
                        <td>Ingrese promedio:</td>
                        <td>
                            <input type="number" name="promedio" step="0.01" class="promedio" value="<?php echo htmlspecialchars($promedio ?? '') ?>">
                        </td>
                        <td class="error-message"><?php echo $promedio_error; ?></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="submit-row"><button type="submit" name="submit">Procesar</button></td>
                    </tr>
                    <?php if (isset($_POST['submit']) && empty($nombre_error) && empty($categoria_error) && empty($promedio_error)) : ?>
                        <tr>
                            <td>Monto mensualidad:</td>
                            <td colspan="2"><?php echo number_format($costo_mensual, 2); ?></td>
                        </tr>
                        <tr>
                            <td>Monto descuento:</td>
                            <td colspan="2"><?php echo number_format($monto_descuento, 2); ?></td>
                        </tr>
                        <tr>
                            <td>Monto a cancelar:</td>
                            <td colspan="2"><?php echo number_format($monto_cancelar, 2); ?></td>
                        </tr>
                    <?php endif; ?>

                </table>
            </form>
        </section>
    </main>

</body>

</html>