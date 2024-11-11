<?php include_once "encabezado.php"; ?>
<?php
include_once "funciones.php";

// Verificar si se ha proporcionado un DPI en la URL
if (!isset($_GET['DPI'])) {
    echo "Error: No se ha proporcionado el DPI.";
    exit;
}

// Obtener el DPI del agente a editar
$DPI = $_GET['DPI'];

// Obtener los datos actuales del agente
$policia = obtenerPoliciaPorDPI($DPI);

if (!$policia) {
    echo "Error: No se encontró al agente.";
    exit;
}
?>

<div class="columns is-centered mt-5">
    <div class="column is-half">
        <h2 class="title has-text-centered is-size-2">Editar agente</h2>
        <form action="guardar_edicion_policia.php" method="post">
            <!-- Campo oculto para el DPI (clave primaria) -->
            <input type="hidden" name="DPI" value="<?php echo $policia->DPI ?>">

            <div class="field">
                <label class="label">Nombre</label>
                <div class="control">
                    <input class="input" type="text" name="nombre" value="<?php echo $policia->Nombre ?>" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Apellido</label>
                <div class="control">
                    <input class="input" type="text" name="apellido" value="<?php echo $policia->Apellido ?>" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Edad</label>
                <div class="control">
                    <input class="input" type="number" name="edad" value="<?php echo $policia->Edad ?>" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Dirección</label>
                <div class="control">
                    <input class="input" type="text" name="direccion" value="<?php echo $policia->Direccion ?>" required>
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-primary" type="submit">Guardar cambios</button>
                </div>
                <div class="control">
                    <a href="Policia.php" class="button is-light">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include_once "pie.php"; ?>