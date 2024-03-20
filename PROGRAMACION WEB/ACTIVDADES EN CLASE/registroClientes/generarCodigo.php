<?php
function contador($archivo)
{
    if (file_exists($archivo) && filesize($archivo) !== 0) {
        $clientes = fopen($archivo, 'r');
        if ($clientes) {
            $leer = fread($clientes, filesize($archivo));
            fclose($clientes); // Cerrar el archivo después de leer
            $linea = explode(chr(13) . chr(10), $leer);
            $n = count($linea);
            return $n;
        } else {
            // Manejar el error si no se puede abrir el archivo
            return "Error al abrir el archivo";
        }
    } else {
        return 1;
    }
}
