<?php
function registra($cod, $cli, $dir, $tel, $fec)
{
    $archivo = fopen('clientes.txt', 'a+');
    $unCliente = $cod . '|' . $cli . '|' . $dir . '|' . $tel . '|' . $fec . '|' . chr(13) . chr(10);

    fwrite($archivo, $unCliente);
    fclose($archivo);
    header('Location: index.php');

}
