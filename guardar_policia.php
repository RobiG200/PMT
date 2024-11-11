<?php
if (!isset($_POST["dpi"]) || !isset($_POST["nombre"]) || !isset($_POST["apellido"]) || !isset($_POST["edad"]) || !isset($_POST["direccion"])) {
    exit("Faltan datos");
}

include_once "funciones.php";

$dpi = $_POST["dpi"];

// Verificar si el DPI ya existe en la base de datos
if (verificarDpiExistentePolicia($dpi)) {
    // Mostrar un mensaje de advertencia si el DPI ya existe
    echo '<p style="color: red; font-weight: bold;">El DPI ingresado ya existe. Por favor, ingrese uno diferente.</p>';
    exit;
}

// Si el DPI no existe, guardar el nuevo registro
guardarPolicia($_POST["dpi"], $_POST["nombre"], $_POST["apellido"], $_POST["edad"], $_POST["direccion"]);
header("Location: Policia.php");
?>