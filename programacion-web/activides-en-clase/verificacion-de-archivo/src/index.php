<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Archivo</title>
    <link rel="stylesheet" href="./estilo.css">
</head>

<body>
    <header class="header">
        <h2 id="centrado">VERIFICAR LA EXISTENCIA DE UN ARCHIVO</h2>
        <img src="https://png.pngtree.com/thumb_back/fw800/background/20220617/pngtree-group-of-people-working-in-call-center-thinking-headset-headphones-photo-image_18794342.jpg" height="300" alt="Banner Ayuda">
    </header>
    <section>
        <?php
        error_reporting((0));
        require "proceso.php";
        ?>
        <form name="frmArchivo" method="post">
            <table border="0" width="550" cellspacing="1" cellpading="1">
                <tr>
                    <td>Nombre del archivo</td>
                    <td>
                        <input type="text" name="txtArchivo" value="" placeholder="Digite nombre del archivo" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Verificar" name="btnVerificar">
                        <input type="submit" value="Resetear" reset>
                    </td>
                </tr>
                <?php if (isset($_POST['btnVerificar'])) : ?>
                    <tr>
                        <td>Nombre Completo del archivo</td>
                        <td><?= getArchivo(); ?></td>
                    </tr>
                    <tr>
                        <td>¿Existe el archivo?</td>
                        <td><?= verifica(getArchivo()); ?></td>
                    </tr>
                    <tr>
                        <td>Fecha de la ultima modificación</td>
                        <td><?= ultimaModificacion(getArchivo()); ?></td>
                    </tr>
                    <tr>
                        <td>Tipo de archivo</td>
                        <td><?= tipoArchivo(getArchivo()); ?></td>
                    </tr>
                    <tr>
                        <td>Tamaño en Bytes</td>
                        <td><?= tamañoArchivo(getArchivo());
                            ?> Bytes</td>
                    </tr>
                    <tr>
                        <td>¿El archivo es ejecutable?</td>
                        <td><?= esEjecutable(getArchivo()); ?></td>
                    </tr>
                <?php endif ?>

            </table>
        </form>
    </section>

</body>

</html>