<?php include_once "encabezado.php"; ?>
<?php
include_once "funciones.php";

if (!isset($_GET['CodSalida'])) {
    echo "Error: No se ha proporcionado el código de salida.";
    exit;
}

$CodSalida = $_GET['CodSalida'];
$salida = obtenerSalidaPorCodSalida($CodSalida);

if (!$salida) {
    echo "Error: No se encontró la salida.";
    exit;
}
?>

<div class="columns is-centered mt-5">
    <div class="column is-half">
        <h2 class="title has-text-centered is-size-2">Editar salida</h2>
        <form action="guardar_edicion_salida.php" method="post">
            <input type="hidden" name="CodSalida" value="<?php echo $salida->CodSalida ?>">

            <div class="field">
                <label class="label">Hora</label>
                <div class="control">
                    <input class="input" type="time" name="hora" value="<?php echo $salida->Hora ?>" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Fecha</label>
                <div class="control">
                    <input class="input" type="date" name="fecha" value="<?php echo $salida->Fecha ?>" required>
                </div>
            </div>

            <div class="field">
                <label class="label">DPI</label>
                <div class="control">
                    <input class="input" type="text" name="dpi" value="<?php echo $salida->DPI ?>" readonly>
                </div>
            </div>

            <div class="field">
                <label class="label">Nombre</label>
                <div class="control">
                    <input class="input" type="text" name="nombre" value="<?php echo $salida->Nombre ?>" readonly>
                </div>
            </div>

            <div class="field">
                <label class="label">Apellido</label>
                <div class="control">
                    <input class="input" type="text" name="apellido" value="<?php echo $salida->Apellido ?>" readonly>
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-primary" type="submit">Guardar cambios</button>
                </div>
                <div class="control">
                    <a href="Salida.php" class="button is-light">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include_once "pie.php"; ?>