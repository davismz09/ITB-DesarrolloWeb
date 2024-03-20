<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilo.css">
    <title>Listado</title>
</head>

<body>
    <header class="header">
        <?php require 'encabezado.php'; ?>
        <h2 id="centrado">LISTADO DE CLIENTES</h2>
    </header>
    <section class="section--listado">
        <table border="1" width="550" cellspacing="0" cellpadding="0">
            <tr>
                <td>CODIGO</td>
                <td>NOMBRE DEL CLIENTE</td>
                <td>DIRECCION</td>
                <td>TELEFONO</td>
                <td>FECHA DE NACIMIENTO</td>
            </tr>
            <?php
            if (file_exists('clientes.txt')) { // Verifica si el archivo existe
                $clientes = fopen('clientes.txt', 'r');
                if (filesize('clientes.txt') == 0) {
                    echo '<tr><td colspan="5" id="centrado"> No hay registros... </td></tr>';
                } else {
                    $leer = fread($clientes, filesize('clientes.txt'));
                    $linea = explode(chr(13) . chr(10), $leer);
                    for ($i = 0; $i < count($linea) - 1; $i++) {
                        $palabra = explode('|', $linea[$i]);
            ?>
                        <tr>
                            <td><?php echo $palabra[0]; ?></td>
                            <td><?php echo $palabra[1]; ?></td>
                            <td><?php echo $palabra[2]; ?></td>
                            <td><?php echo $palabra[3]; ?></td>
                            <td><?php echo $palabra[4]; ?></td>
                        </tr>
            <?php
                    }
                }
                fclose($clientes); // Cierra el archivo después de usarlo
            } else {
                echo '<tr><td colspan="5" id="centrado"> El archivo de clientes no existe. </td></tr>';
            }
            ?>
        </table>
    </section>
    <footer class="footer">
        <?php require 'pie.php'; ?>
    </footer>
</body>

</html>