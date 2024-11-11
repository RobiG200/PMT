<?php
?>
<?php
if (!isset($_POST["montoMulta"], $_POST["tipoMulta"], $_POST["descripcionMulta"], $_POST["dpiCiudadano"])) {
    exit("Faltan datos");
}


include_once "funciones.php";
guardarMulta($_POST["montoMulta"],$_POST["tipoMulta"], $_POST["descripcionMulta"], $_POST["dpiCiudadano"]);
header("Location: Multa.php");