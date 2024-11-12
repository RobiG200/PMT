<?php
include_once "funciones.php";

// Verificar si se han recibido todos los datos necesarios para una salida
if (!isset($_POST['CodSalida'], $_POST['hora'], $_POST['fecha'])) {
    echo "Error: Faltan datos.";
    exit;
}

$CodSalida = $_POST['CodSalida'];
$hora = $_POST['hora'];
$fecha = $_POST['fecha'];

// Llamar a la función para registrar la salida en la base de datos
actualizarSalida($CodSalida, $hora, $fecha);

// Redirigir de nuevo a la página de registros de salidas
header("Location: Salida.php");
exit;

?>