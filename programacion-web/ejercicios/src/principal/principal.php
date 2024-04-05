<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./estilo.css">
</head>

<body>
    <header>
        <?php require('encabezado-2.php'); ?>
    </header>
    <section>
        <?php
        error_reporting(0);
        require('./captura.php');
        $usuario = getUsuario();
        $clave = getPassword();
        ?>
        <form action="principal.php" method="post">
            <table border="1" width="550" cellspacing="1" cellpadding="1">
                <tr>
                    <td>Usuario</td>
                    <td>
                        <select name="selUsuarios" id="">
                            <option value="Administrador">Administrador</option>
                            <option value="Sistemas">Sistemas</option>
                            <option value="Operador">Operador</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="txtPassword" maxlength="5" value="">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" id="centrado">
                        <input type="submit" value="Ingresar" name="btnIngresar">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" id="centrado">
                        <?php
                        if ($_POST['btnIngresar']) {
                            require('./validar.php');
                            if (valida($usuario, $clave) == 'ok') {
                                header('location: bienvenida.php');
                            }
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </form>
    </section>
    <footer>
        <?php require('pie-2.php'); ?>
    </footer>
</body>

</html>