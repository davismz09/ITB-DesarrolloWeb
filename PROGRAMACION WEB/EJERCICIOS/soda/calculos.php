<?php
//Asignación de precios
$ensalada = 10;
$jugo = 13;
$helado = 7;
$sandwich = 25;


//capturando el nombre del cliente
$cliente = isset($_POST['txtCliente']) ? $_POST['txtCliente'] : '';

//capturando la cantidad solicitadas por el usuario
$cantidadEns = isset($_POST['txtEnsalada']) ? $_POST['txtEnsalada'] : 0;
$cantidadJug = isset($_POST['txtJugo']) ? $_POST['txtJugo'] : 0;
$cantidadHel = isset($_POST['txtHelado']) ? $_POST['txtHelado'] : 0;
$cantidadSan = isset($_POST['txtSandwich']) ? $_POST['txtSandwich'] : 0;

//Calculando los subtotales
$subtotalEns = $ensalada * $cantidadEns;
$subtotalJug = $jugo * $cantidadJug;
$subtotalHel = $helado * $cantidadHel;
$subtotalSan = $sandwich * $cantidadSan;


//Calculando el total
$total = $subtotalEns + $subtotalJug + $subtotalHel + $subtotalSan;
