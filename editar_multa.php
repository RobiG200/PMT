<?php include_once "encabezado.php"; ?>
<?php
include_once "funciones.php";

// Verificar que se haya proporcionado el código de la multa
if (!isset($_GET['CodMulta'])) {
    echo "Error: No se ha proporcionado el código de la multa.";
    exit;
}

$CodMulta = $_GET['CodMulta'];
$multa = obtenerMultaPorCod($CodMulta);
$tiposMulta = obtenerTiposMulta();

// Obtener la lista de ciudadanos
$ciudadanos = obtenerCiudadanosMenu();

if (!$multa) {
    echo "Error: No se encontró la multa.";
    exit;
}
?>

<div class="columns is-centered mt-5">
    <div class="column is-half">
        <h2 class="title has-text-centered is-size-2">Editar Multa</h2>
        <form action="guardar_edicion_multa.php" method="post">
            <input type="hidden" name="CodMulta" value="<?php echo $multa->CodMulta ?>">

            

            <div class="field">
                <label class="label">Monto de la Multa</label>
                <div class="control">
                    <input class="input" type="number" name="monto" value="<?php echo $multa->MontoMulta ?>" required>
                </div>
            </div>

            <div class="field">
            <label class="label">Tipo de Multa</label>
            <div class="control">
                <div class="select">
                    <select name="tipo_multa" required>
                <option value="">Seleccione el tipo de multa</option>
                <?php foreach ($tiposMulta as $tipo) { ?>
                    <option value="<?php echo $tipo->CodTipoMulta; ?>" <?php echo ($tipo->CodTipoMulta == $multa->Nombre) ? 'selected' : ''; ?>>
                        <?php echo $tipo->Descripcion; // Asumiendo que tienes una columna Descripcion en tipomulta ?>
                    </option>
                <?php } ?>
                    </select>
                </div>
            </div>
        </div>
            <div class="field">
                <label class="label">Descripción de la Multa</label>
                <div class="control">
                    <textarea class="textarea" name="descripcion" required><?php echo $multa->DescripcionMulta ?></textarea>
                </div>
            </div>
            <div class="field">
                <label class="label">DPI del Ciudadano</label>
                <div class="control">
                    <div class="select">
                        <select name="dpi" required>
                            <option value="">Seleccione un ciudadano</option>
                            <?php foreach ($ciudadanos as $ciudadano) { ?>
                                <option value="<?php echo $ciudadano->DpiCiudadano; ?>" <?php echo ($ciudadano->DpiCiudadano == $multa->DpiCiudadano) ? 'selected' : ''; ?>>
                                    <?php echo $ciudadano->DpiCiudadano . ' - ' . $ciudadano->Nombre; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-primary" type="submit">Guardar cambios</button>
                </div>
                <div class="control">
                    <a href="Multa.php" class="button is-light">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include_once "pie.php"; ?>