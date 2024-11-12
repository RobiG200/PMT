<?php
include_once "funciones.php";

// Verificar que se hayan enviado los datos necesarios
if (!isset($_POST['CodMulta'], $_POST['monto'], $_POST['tipo_multa'], $_POST['descripcion'],$_POST['dpi'])) {
    echo "Error: Faltan datos.";
    exit;  
}

// Recibir los datos del formulario
$CodMulta = $_POST['CodMulta'];
$monto = $_POST['monto'];
$tipoMulta = $_POST['tipo_multa']; // Asegúrate de que aquí estás usando el ID o código de tipo de multa
$descripcion = $_POST['descripcion'];
$DpiCiudadano = $_POST['dpi'];
// Actualizar la multa en la base de datos
actualizarMulta($CodMulta, $monto, $tipoMulta, $descripcion, $DpiCiudadano);
// Redireccionar a la página de multas
header("Location: Multa.php");
exit;
?>