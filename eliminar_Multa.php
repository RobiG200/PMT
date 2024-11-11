<?php
?>
<?php
if (!isset($_POST["CodMulta"])) {
    exit("No hay datos");
}

include_once "funciones.php";
eliminarMulta($_POST["CodMulta"]);
header("Location: Multa.php");
