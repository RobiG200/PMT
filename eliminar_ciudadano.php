<?php
?>
<?php
if (!isset($_POST["DpiCiudadano"])) {
    exit("No hay datos");
}

include_once "funciones.php";
eliminarCiudadano($_POST["DpiCiudadano"]);
header("Location: Ciudadanos.php");
