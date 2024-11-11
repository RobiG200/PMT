<?php
include_once "funciones.php";

if (!isset($_POST['CodEntrada'], $_POST['hora'], $_POST['fecha'])) {
    echo "Error: Faltan datos.";
    exit;
}

$CodEntrada = $_POST['CodEntrada'];
$hora = $_POST['hora'];
$fecha = $_POST['fecha'];

actualizarEntrada($CodEntrada, $hora, $fecha);

header("Location: Entradas.php");
exit;

