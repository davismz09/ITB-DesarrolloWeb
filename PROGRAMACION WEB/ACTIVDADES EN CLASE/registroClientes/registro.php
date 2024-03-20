<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="./estilo.css">
</head>

<body>
    <header class="header">
        <?php require 'encabezado.php' ?>
        <h2 id="centrado">REGISTRO DEL NUEVO CLIENTE</h2>
    </header>
    <section class="section--registro">

        <form name="frmRegistro" method="post">
            <table border="1" width="550" cellspacing="5" cellpadding="0">
                <tr>
                    <td>No. REGISTRO</td>
                    <td>
                        <?php
                        error_reporting(0);
                        require "generarCodigo.php";
                        $clientes = 'clientes.txt';
                        $numero = contador($clientes);
                        echo $numero;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>CLIENTE</td>
                    <td>
                        <input type="text" name="txtCliente" size="60" required>
                    </td>
                </tr>
                <tr>
                    <td>DIRECCION</td>
                    <td>
                        <input type="text" name="txtDireccion" size="60" required>
                    </td>
                </tr>
                <tr>
                    <td>TELEFONO</td>
                    <td>
                        <input type="text" name="txtFono" size="20" required>
                    </td>
                </tr>
                <tr>
                    <td>FECHA NAC.</td>
                    <td>
                        <input type="date" name="txtFecha" size="20" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="REGISTRAR CLIENTE" name="btnRegistrar">
                    </td>
                </tr>
                <?php
                if (isset($_POST["btnRegistrar"])) {
                    include('captura.php');
                    include('grabar.php');
                    registra($numero, getCliente(), getDireccion(), getTelefono(), getFecha());
                    header('location:index.php');
                }
                ?>
            </table>
        </form>
    </section>
    <footer>
        <?php require 'pie.php' ?>
    </footer>
</body>

</html>