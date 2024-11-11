<?php
?>
<?php
if (!isset($_POST["hora"]) || !isset($_POST["fecha"]) || !isset($_POST["dpiPolicia"])) {
    exit("Faltan datos");
}
include_once "funciones.php";
guardarEntrada($_POST["hora"], $_POST["fecha"], $_POST["dpiPolicia"], $_POST["edad"]);
header("Location: Entradas.php");
