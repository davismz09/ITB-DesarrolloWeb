<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>VENTAS DE PRODUCTOS</title>
    <style>
        body,
        .header {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 10px 0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .img-header {
            width: 760px;
            height: auto;
        }

        .form {
            width: 800px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            padding: 10px;
        }

        /* Estilos para el formulario */
        .form {
            width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        /* Estilos para las filas de la tabla */
        .form table tr {
            margin-bottom: 10px;
        }

        /* Estilos para las celdas de la tabla */
        .form table td {
            padding: 10px;
        }

        /* Estilos para los selectores */
        .form select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Estilos para los campos de texto */
        .form input[type="text"] {
            width: calc(100% - 20px);
            /* Restamos el padding para que el ancho sea correcto */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Estilos para el botón de calcular */
        .form input[type="submit"] {
            width: auto;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        /* Estilos para los títulos de las columnas */
        .form table tr:first-child td {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php
    error_reporting(E_ALL);
    //Nota de David :v : PARA EVITAR ERRORES CON LAS VARIABLES, HAY QUE PRIMERO DEFINIRLAS E INICIALIZARLAS
    //NO COMO HACE EL PROFESOR QUE LAS PONE DONDE LE DA LA GANA :v

    //isset es una función en PHP que se utiliza para determinar si una variable
    //está definida y no es nula. Devuelve true si la variable existe y tiene un
    //valor distinto de null, y false de lo contrario.
    $producto = isset($_POST['selProducto']) ? $_POST['selProducto'] : '';
    /*
        EXPLICACIÓN:
        $producto = isset($_POST['selProducto']) ? $_POST['selProducto'] : '';
        Aqui verifica si la variable 'selProducto' existe, si existe le coloca el
        valor de la variable 'selProducto' a la variable $produto
    */

    $precio = 0;
    $cuotas = isset($_POST['selCuotas']) ? $_POST['selCuotas'] : '';
    $cantidad = isset($_POST['txtCantidad']) ? $_POST['txtCantidad'] : 0;

    switch ($producto) {
        case 'Lavadora':
            $precio = 1500;
            break;
        case 'Refrigeradora':
            $precio = 3500;
            break;
        case 'Radiograbadora':
            $precio = 500;
            break;
        case 'Tostadora':
            $precio = 150;
            break;
        default:
            $precio = 0;
            break;
    }

    $subtotal = $cantidad * $precio;
    $montoMensual = ($cuotas > 0 && $subtotal > 0) ? $subtotal / $cuotas : 0;
    //EXPLICACION:
    // ($cuotas > 0 && $subtotal > 0) ? $subtotal / $cuotas : 0;
    // Primero verficia si $cuotas es mayor a 0, y que subtotal también sea mayor a cero
    // En caso de cumplir con la condición le asignará a la variable $montoMensual el valor
    // de la operacion $subtotal / %cuotas. Pero sí la condición es falso, le asignará el valor de 0.
    ?>

    <header class="header">
        <img class="img-header" src="https://img.freepik.com/psd-premium/banner-black-friday-portugues-3d-renderizado-campana-marketing-brasil_364106-704.jpg" alt="Banner Electrodomesticos" />
        <h2 id="centrado">VENTA DE PRODUCTOS</h2>
    </header>

    <form class="form" method="POST" name="frmVenta">
        <table border="0" width="500" cellspacing="0" cellpadding="0">
            <tr>
                <td>Producto</td>
                <td>
                    <select name="selProducto" onchange="this.form.submit()">
                        <option value="Lavadora" <?= $producto == 'Lavadora' ? 'selected' : ''; ?>>Lavadora</option>
                        <option value="Refrigeradora" <?= $producto == 'Refrigeradora' ? 'selected' : ''; ?>>Refrigeradora</option>
                        <option value="Radiograbadora" <?= $producto == 'Radiograbadora' ? 'selected' : ''; ?>>Radiograbadora</option>
                        <option value="Tostadora" <?= $producto == 'Tostadora' ? 'selected' : ''; ?>>Tostadora</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Precio</td>
                <td><input type="text" name="txtPrecio" readonly="readonly" value="<?= number_format($precio, 2, '.', ''); ?>" /></td>
            </tr>
            <tr>
                <td>Cantidad: </td>
                <td><input type="text" name="txtCantidad" value="<?= $cantidad; ?>" /></td>
                <td><input type="submit" value="Calcular" name="btnCalcular" /></td>
            </tr>
            <tr>
                <td>Subtotal</td>
                <td><input type="text" name="txtSubtotal" readonly="readonly" value="<?= '$' . number_format($subtotal, 2, '.', ''); ?>" /></td>
            </tr>
            <tr>
                <td>Cuotas</td>
                <td>
                    <select name="selCuotas" onchange="this.form.submit()">
                        <option value="">Seleccione</option>
                        <option value="3" <?= $cuotas == '3' ? 'selected' : ''; ?>>3</option>
                        <option value="6" <?= $cuotas == '6' ? 'selected' : ''; ?>>6</option>
                        <option value="9" <?= $cuotas == '9' ? 'selected' : ''; ?>>9</option>
                        <option value="12" <?= $cuotas == '12' ? 'selected' : ''; ?>>12</option>
                    </select>
                </td>
            </tr>
            <?php if ($cuotas > 0 && $subtotal > 0) : ?><!-- Inicia la estructura if -->
                <tr>
                    <td>No. Letras</td>
                    <td>Monto</td>
                </tr>
                <?php for ($i = 1; $i <= $cuotas; $i++) : ?><!-- Inicia el bucle for -->
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= '$' . number_format($montoMensual, 2, '.', ''); ?></td>
                    </tr>
                <?php endfor; ?><!-- cierra el bucle for -->
            <?php endif; ?> <!--cierra la estructura if -->
        </table>
    </form>
</body>

</html>