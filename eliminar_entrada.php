<?php
?>
<?php
if (!isset($_POST["CodEntrada"])) {
    exit("No hay datos");
}

include_once "funciones.php";
eliminarEntrada($_POST["CodEntrada"]);
header("Location: Entradas.php");
