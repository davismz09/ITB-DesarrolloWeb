<?php
function valida($usuario, $clave)
{
    $acceso = '';
    if ($usuario == 'Administrador' && $clave == '1234A')
        $acceso = 'ok';
    if ($usuario == 'Sistemas' && $clave == '111A')
        $acceso = 'ok';
    if ($usuario == 'Operador' && $clave == '222A')
        $acceso = 'ok';
    return $acceso;
}
