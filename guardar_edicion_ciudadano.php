<?php
include_once "funciones.php";

if (!isset($_POST['DpiCiudadano'], $_POST['nombre'], $_POST['tarjeta'], $_POST['placa'], $_POST['descripcion'])) {
    echo "Error: Faltan datos.";
    exit;
}

$DpiCiudadano = $_POST['DpiCiudadano'];
$nombre = $_POST['nombre'];
$TarjetaCirculacion = $_POST['tarjeta'];
$NoPlaca = $_POST['placa'];
$DescripcionCarro = $_POST['descripcion'];


actualizarCiudadano($DpiCiudadano, $nombre, $TarjetaCirculacion, $NoPlaca, $DescripcionCarro);


header("Location: Ciudadanos.php");
exit;
