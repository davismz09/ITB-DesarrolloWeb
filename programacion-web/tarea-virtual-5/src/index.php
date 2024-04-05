<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilo.css">
    <meta name="author" content="David Mite">
    <title>Tarea Virtual 5 | David Mite Zambrano | DSE-08</title>
</head>

<body>
    <header class="header">
        <h1 class="title-header">Casa de préstamos</h1>
        <img class="imagen-header" src="https://png.pngtree.com/thumb_back/fw800/background/20231002/pngtree-real-estate-banner-background-a-person-holding-a-key-in-front-image_13523352.png" alt="Casa de préstamo">
    </header>
    <main class="main">
        <?php
        error_reporting(0);
        $error_cliente = $error_monto = '';

        $cuotas = isset($_POST['cuotas']) ? $_POST['cuotas'] : '';
        $fecha_actual = new DateTime();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //Validación: nombre del cliente
            (empty($_POST["txtCliente"])) ? $error_cliente = "Debe registrar el nombre del cliente" : $cliente = $_POST["txtCliente"];
            //Validación: monto del préstamo
            (empty($_POST["txtMonto"]) || $_POST["txtMonto"] <= 0) ? $error_monto = "Debe ingresar correctamente el monto del préstamo" : $monto = $_POST["txtMonto"];
        }

        switch ($cuotas) {
            case 3:
                $impuesto = 0.05;
                break;
            case 6:
                $impuesto = 0.07;
                break;
            case 9:
                $impuesto = 0.10;
                break;
            case 12:
                $impuesto = 0.20;
                break;
            default:
                $impuesto = 0;
                break;
        }

        $subtotal = $monto * $impuesto;
        $total = $monto + $subtotal;
        $montoMensual = ($cuotas > 0 && $total > 0) ? $total / $cuotas : 0;
        ?>

        <section class="section">
            <form class="form" method="post">
                <div class="form-group">
                    <label for="txtCliente">Cliente</label>
                    <input id="txtCliente" type="text" name="txtCliente" value="<?= $cliente ?>" placeholder="Digite su nombre">
                    <span class="error"><?php echo $error_cliente; ?></span>
                </div>

                <div class="form-group">
                    <label for="txtMonto">Monto</label>
                    <input id="txtMonto" type="text" name="txtMonto" value="<?= number_format($monto, 2, '.', ''); ?>" placeholder="Digite su monto">
                    <span class="error"><?php echo $error_monto; ?></span>
                </div>

                <div class="form-group">
                    <label for="cuotas">N°. Cuotas</label>
                    <select id="cuotas" name="cuotas" onchange="this.form.submit()">
                        <option value="">Elige una opción</option>
                        <option <?= $cuotas === '3' ? 'selected' : ''; ?> value="3">3</option>
                        <option <?= $cuotas === '6' ? 'selected' : ''; ?> value="6">6</option>
                        <option <?= $cuotas === '9' ? 'selected' : ''; ?> value="9">9</option>
                        <option <?= $cuotas === '12' ? 'selected' : ''; ?> value="12">12</option>
                    </select>
                </div>

                <input type="submit" value="Cotizar" name="btnCotizar" />
                <?php if ($cuotas > 0 && $total > 0 && $cliente != '') : ?><!-- Inicia la estructura if -->
                    <table border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>N° de Cuota</td>
                            <td>Fecha de pago</td>
                            <td>Monto mensual</td>
                        </tr>
                        <?php for ($i = 1; $i <= $cuotas; $i++) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $fecha_actual->format('Y-m-d') ?></td>
                                <td>$<?= number_format($montoMensual, 2, '.', '') ?></td>
                            </tr>
                            <?php $fecha_actual->modify('+1 month') ?>
                        <?php endfor ?>
                    </table>
                <?php endif ?>

            </form>
        </section>

    </main>
</body>

</html>