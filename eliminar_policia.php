<?php
?>
<?php
if (!isset($_POST["id_policia"])) {
    exit("No hay datos");
}

include_once "funciones.php";
eliminarPolicia($_POST["id_policia"]);
header("Location: Policia.php");
