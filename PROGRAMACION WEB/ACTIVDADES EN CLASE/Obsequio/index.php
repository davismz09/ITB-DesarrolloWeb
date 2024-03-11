<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Obsequio a clientes</title>
        <link rel="stylesheet" href="./styles.css"/>
    </head>
    <body>
        <header>
            <h2 id="centrado">Obsequio a clientes</h2>
            <img src="https://img.freepik.com/foto-gratis/carro-compras-lleno-productos-dentro-supermercado_123827-28165.jpg" />
        </header>
        <?php
            error_reporting(0);
            $monto = $_POST['txtMonto'];
            $ticket = $_POST['txtNumero'];
        ?>
        
        <section>
            <form method="POST" name="frmObsequio" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> "> <!--Obsequio.php-->
                <table border="0" width="650" cellspacing="0" cellpadding="0">
                   <tr>
                        <td>Nombre del cliente:</td>
                        <td>
                            <input type="text" name="txtCliente" required size="50"  value="<?php echo $_POST[txtCliente]; ?>" placeholder="Ingrese nombre del Cliente">
                        </td>
                    </tr>
                    <tr>
                        <td>Monto total $:</td>
                        <td>
                            <input type="text" name="txtMonto" required value="<?php echo $monto; ?>" placeholder="Ingrese monto a pagar">
                        </td>
                    </tr>
                    <tr>
                        <td>Número de ticket:</td>
                        <td>
                            <input value="<?php echo $ticket; ?>" type="text" name="txtNumero" value="" required size="50" placeholder="Ingrese numero de ticket obtenido">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Procesar" name=""/>
                        </td>
                    </tr>
                    
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                          $ticket = $_POST['txtNumero'];
                          if($ticket>=1 && $ticket<=4){
                              $Obsequio = "Canasta con productos diversos";
                              $descuento = 16.0/100.0 * $monto;
                          } else if($ticket>=5 && $ticket<=9){
                              $Obsequio = "Saco de azúcar de 50kg";
                              $descuento = 13.0/100.0 * $monto;
                          } else if($ticket>=10 && $ticket<=14){
                              $Obsequio = "Aceite de 5 litros";
                              $descuento = 6.0/100.0 * $monto;
                          } else if($ticket>=15 && $ticket<=19){
                              $Obsequio = "Caja de leche de 24 latas grandes";
                              $descuento = 12.0/100.0 * $monto;
                          } else if($ticket == 20){
                              $Obsequio = "Caja de leche de 24 latas grandes";
                              $descuento = 12.0/100.0 * $monto;                            
                          } else if($ticket < 1 || $ticket > 20){
                              echo '<tr><td colspan="2"><script>alert("Ticket No Valido") </script></td></tr>';
                          }
                            $nuevoMonto = $monto - $descuento;
                     }
                    ?>
                    <tr>
                        <td> Monto a Cancelar: </td>
                        <td> <?php echo "$" . number_format($nuevoMonto, 2, '.','');
                        ?></td>
                    <tr>
                        <td> Obsequio obtenido: </td>
                        <td><?php echo $Obsequio; ?> </td>
                    </tr>
                </table>
            </form>
        </section>
    </body>
</html>
