<?php include_once "encabezado.php"; ?>
<?php
include_once "funciones.php";

if (!isset($_GET['CodEntrada'])) {
    echo "Error: No se ha proporcionado el código de entrada.";
    exit;
}

$CodEntrada = $_GET['CodEntrada'];
$entrada = obtenerEntradaPorCodEntrada($CodEntrada);

if (!$entrada) {
    echo "Error: No se encontró la entrada.";
    exit;
}
?>

<div class="columns is-centered mt-5">
    <div class="column is-half">
        <h2 class="title has-text-centered is-size-2">Editar entrada</h2>
        <form action="guardar_edicion_entrada.php" method="post">
            <input type="hidden" name="CodEntrada" value="<?php echo $entrada->CodEntrada ?>">

            <div class="field">
                <label class="label">Hora</label>
                <div class="control">
                    <input class="input" type="time" name="hora" value="<?php echo $entrada->Hora ?>" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Fecha</label>
                <div class="control">
                    <input class="input" type="date" name="fecha" value="<?php echo $entrada->Fecha ?>" required>
                </div>
            </div>

            <div class="field">
                <label class="label">DPI</label>
                <div class="control">
                    <input class="input" type="text" name="dpi" value="<?php echo $entrada->DPI ?>" readonly>
                </div>
            </div>

            <div class="field">
                <label class="label">Nombre</label>
                <div class="control">
                    <input class="input" type="text" name="nombre" value="<?php echo $entrada->Nombre ?>" readonly>
                </div>
            </div>

            <div class="field">
                <label class="label">Apellido</label>
                <div class="control">
                    <input class="input" type="text" name="apellido" value="<?php echo $entrada->Apellido ?>" readonly>
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-primary" type="submit">Guardar cambios</button>
                </div>
                <div class="control">
                    <a href="Entradas.php" class="button is-light">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include_once "pie.php"; ?>