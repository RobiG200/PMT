<?php
include_once "funciones.php";

// Verificar si se han recibido todos los datos
if (!isset($_POST['DPI'], $_POST['nombre'], $_POST['apellido'], $_POST['edad'], $_POST['direccion'])) {
    echo "Error: Faltan datos.";
    exit;
}

$DPI = $_POST['DPI'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];
$direccion = $_POST['direccion'];

// Actualizar el agente en la base de datos
actualizarPolicia($DPI, $nombre, $apellido, $edad, $direccion);

// Redirigir de nuevo a la página de registros
header("Location: Policia.php");
exit;


?>