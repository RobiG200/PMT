<?php include_once "encabezado.php"; ?>
<?php
include_once "funciones.php";

// Verificar que se haya proporcionado el DPI del ciudadano
if (!isset($_GET['DpiCiudadano'])) {
    echo "Error: No se ha proporcionado el DPI del ciudadano.";
    exit;
}

$DpiCiudadano = $_GET['DpiCiudadano'];
$ciudadano = obtenerCiudadanoPorDpi($DpiCiudadano);

if (!$ciudadano) {
    echo "Error: No se encontró el ciudadano.";
    exit;
}
?>

<div class="columns is-centered mt-5">
    <div class="column is-half">
        <h2 class="title has-text-centered is-size-2">Editar Ciudadano</h2>
        <form action="guardar_edicion_ciudadano.php" method="post">
            <input type="hidden" name="DpiCiudadano" value="<?php echo $ciudadano->DpiCiudadano ?>">

            <div class="field">
                <label class="label">Nombre</label>
                <div class="control">
                    <input class="input" type="text" name="nombre" value="<?php echo $ciudadano->Nombre ?>" required>
                </div>
            </div>

            <div class="field">
                <label class="label">No. Tarjeta</label>
                <div class="control">
                    <input class="input" type="text" name="tarjeta" value="<?php echo $ciudadano->TarjetaCirculacion ?>" required>
                </div>
            </div>

            <div class="field">
                <label class="label">No. Placa</label>
                <div class="control">
                    <input class="input" type="text" name="placa" value="<?php echo $ciudadano->NoPlaca ?>" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Descripción del Auto</label>
                <div class="control">
                    <input class="input" type="textarea" name="descripcion" value="<?php echo $ciudadano->DescripcionCarro ?>" required>
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-primary" type="submit">Guardar cambios</button>
                </div>
                <div class="control">
                    <a href="Ciudadanos.php" class="button is-light">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include_once "pie.php"; ?>