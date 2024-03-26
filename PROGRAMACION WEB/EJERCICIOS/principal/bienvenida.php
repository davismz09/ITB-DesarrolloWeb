<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./estilo.css">
</head>

<body>
    <header>
        <?php
        require('encabezado2.php');
        ?>
    </header>
    <section>
        <table border="1" width="550" cellspacing="1" cellpadding="1">
            <tr>
                <td id="centrado">Usuario logeado correctamente</td>
                <td>
                    <a href="../soda/soda.php">Ir al sistema de facturación</a>
                </td>
            </tr>
        </table>
    </section>
    <footer>
        <?php
        require('pie2.php');
        ?>
</body>

</html>