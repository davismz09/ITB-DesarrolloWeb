<?php
echo "¡Hola, mundo!";

#Variables
$miVariable = "¡Hola, mundo!";
echo $miVariable;

#Tipos de datos:
$string = "Esto es una cadena";
$integer = 123;
$float = 12.3;
$boolean = true;
$array = array("uno", "dos", "tres");
$null = NULL;

#Operadores:
$suma = 1 + 2;
$resta = 1 - 2;
$multiplicacion = 1 * 2;
$division = 1 / 2;
$modulo = 1 % 2;
$exponenciacion = 1 ** 2;

#Condicionales:
$numero = 1;
if ($numero > 0) {
    echo "El número es positivo";
} else {
    echo "El número es negativo";
}

#Bucles:
for ($i = 0; $i < 10; $i++) {
    echo $i;
}

$i = 0;
while ($i < 10) {
    echo $i;
    $i++;
}

#Funciones:
function miFuncion($parametro)
{
    return $parametro;
}

echo miFuncion("¡Hola, mundo!");

#Clases:
class MiClase
{
    public $miVariable = "¡Hola, mundo!";

    public function miMetodo()
    {
        return $this->miVariable;
    }
}


$miObjeto = new MiClase();

echo $miObjeto->miMetodo();

#Herencia:
class MiClaseHija extends MiClase
{
    public function miMetodoHijo()
    {
        return $this->miVariable;
    }
}


$miObjetoHijo = new MiClaseHija();


echo $miObjetoHijo->miMetodoHijo();
