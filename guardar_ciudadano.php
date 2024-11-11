<?php
if (!isset($_POST["dpi"]) || !isset($_POST["nombre"]) || !isset($_POST["tarjetaCirculacion"]) || !isset($_POST["noPlaca"]) || !isset($_POST["descripcionCarro"])) {
    exit("Faltan datos");
}

include_once "funciones.php";

// Verificamos si el DPI ya existe antes de guardar
$dpi = $_POST["dpi"];
$nombre = $_POST["nombre"];
$tarjetaCirculacion = $_POST["tarjetaCirculacion"];
$noPlaca = $_POST["noPlaca"];
$descripcionCarro = $_POST["descripcionCarro"];

if (verificarDpiExistente($dpi)) {
    // Si el DPI ya existe, mostrar mensaje de advertencia
    echo "<p style='color: red; text-align: center;'>El DPI ya está registrado. Por favor, verifica los datos.</p>";
} else {
    // Si el DPI no existe, procedemos a guardar el ciudadano
    guardarCiudadano($dpi, $nombre, $tarjetaCirculacion, $noPlaca, $descripcionCarro);
    header("Location: Ciudadanos.php");
}
?>