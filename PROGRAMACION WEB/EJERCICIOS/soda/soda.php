<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/estilos.css">
</head>

<body>
    <header>
        <?php
        include('./encabezado.php');
        ?>
    </header>
    <section>
        <div class="contenedor">
            <?php
            error_reporting(E_ALL);
            include('./calculos.php');
            ?>

            <form name="frmHelados" method="post">
                <table border="1" width="600" cellspacing="1" cellpadding="1">
                    <tr>
                        <td>Clientes</td>
                        <td colspan="3">
                            <input type="text" name="txtCliente" size="104" value="<?= $cliente; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td id="fila">Lista de productos</td>
                        <td id="fila">Cantidad</td>
                        <td id="fila">Precio $</td>
                        <td id="fila">Subtotal $</td>
                    </tr>
                    <tr>
                        <td>Ensalada de frutas</td>
                        <td>
                            <input type="text" name="txtEnsalada" value="<?= $cantidadEns; ?>">
                        </td>
                        <td>
                            <?= '$' . number_format($ensalada, 2); ?>
                        </td>
                        <td>
                            <?= '$' . number_format($subtotalEns, 2); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Jugo de Frutas</td>
                        <td>
                            <input type="text" name="txtJugo" value="<?= $cantidadJug ?>">
                        </td>
                        <td>
                            <?= '$' . number_format($jugo, 2); ?>
                        </td>
                        <td>
                            <?= '$' . number_format($subtotalJug, 2); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Helado</td>
                        <td>
                            <input type="text" name="txtHelado" value="<?= $cantidadHel; ?>">
                        </td>
                        <td>
                            <?= '$' . number_format($helado, 2); ?>
                        </td>
                        <td>
                            <?= '$' . number_format($subtotalHel, 2); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Sandwich</td>
                        <td>
                            <input type="text" name="txtSandwich" value="<?= $cantidadSan; ?>">
                        </td>
                        <td>
                            <?= '$' . number_format($sandwich, 2); ?>
                        </td>
                        <td>
                            <?= '$' . number_format($subtotalSan, 2); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="btnFinalizar" value="Calcular">
                        </td>
                    </tr>
                    <tr>
                        <?php if (isset($_POST['btnFinalizar'])) : ?>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Total a pagar</td>
                        <td id="codigo">$
                            <?= number_format($total, 2); ?>
                        </td>
                    </tr>
                <?php endif; ?>
                </table>
            </form>
        </div>
    </section>
    <footer>
        <?php
        include('./pie.php');
        ?>
    </footer>
</body>

</html>