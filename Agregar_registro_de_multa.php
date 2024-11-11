<?php include_once "encabezado.php"; ?>
<?php include_once "funciones.php"; ?>
<div class="columns is-centered mt-5">
    <div class="column is-half">
        <h2 class="title has-text-centered is-size-2">Agregar nuevo registro de multas</h2>
        <form action="guardar_multa.php" method="post">
            <!-- Campo de Monto de la Multa -->
            <div class="field">
                <label class="label" for="montoMulta">Monto de la Multa</label>
                <div class="control">
                    <input required id="montoMulta" class="input" type="number" step="0.01" name="montoMulta" placeholder="Monto en quetzales">
                </div>
            </div>
            <!-- Campo de Tipo de Multa -->
            <div class="field">
                <label class="label" for="tipoMulta">Tipo de Multa</label>
                <div class="control">
                    <div class="select">
                        <select required id="tipoMulta" name="tipoMulta">
                            <option value="" disabled selected>Seleccione el tipo de multa</option>
                            <?php
                            // Conectar a la base de datos y obtener los tipos de multas
                            $bd = obtenerConexion();
                            $sentencia = $bd->query("SELECT CodTipoMulta, Nombre FROM TipoMulta");
                            $tiposMulta = $sentencia->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($tiposMulta as $tipo) {
                                echo "<option value=\"{$tipo['CodTipoMulta']}\">{$tipo['Nombre']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <!-- Campo de Descripción de la Multa -->
            <div class="field">
                <label class="label" for="descripcionMulta">Descripción</label>
                <div class="control">
                    <textarea required id="descripcionMulta" name="descripcionMulta" class="textarea" placeholder="Descripción de la multa"></textarea>
                </div>
            </div>
            <!-- Campo de DPI del Ciudadano -->
            <div class="field">
                <label class="label" for="dpiCiudadano">DPI del Ciudadano</label>
                <div class="control">
                    <div class="select">
                        <select required id="dpiCiudadano" name="dpiCiudadano">
                            <option value="" disabled selected>Seleccione un Ciudadano</option>
                            <?php
                            // Obtener los DPI de los ciudadanos
                            $sentencia = $bd->query("SELECT DpiCiudadano, Nombre FROM Ciudadano");
                            $ciudadanos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($ciudadanos as $ciudadano) {
                                echo "<option value=\"{$ciudadano['DpiCiudadano']}\">{$ciudadano['DpiCiudadano']} - {$ciudadano['Nombre']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <!-- Botones -->
            <div class="field is-grouped is-grouped-centered">
                <div class="control">
                    <button class="button is-success">Guardar</button>

                </div>
                <div class="control">
                    <a href="Multa.php" class="button is-warning">Regresar</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include_once "pie.php"; ?>