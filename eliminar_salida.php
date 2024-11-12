<?php
?>
<?php
if (!isset($_POST["CodSalida"])) {
    exit("No hay datos");
}

include_once "funciones.php";
eliminarSalida($_POST["CodSalida"]);
header("Location: Salida.php");
