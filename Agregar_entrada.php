<?php include_once "encabezado.php"; ?>
<?php include_once "funciones.php"; ?>
<div class="columns is-centered mt-5">
    <div class="column is-half">
        <h2 class="title has-text-centered is-size-2">Agregar Nueva Entrada</h2>
        <form action="guardar_entrada.php" method="post">
            <!-- Campo de Hora -->
            <div class="field">
                <label class="label" for="hora">Hora</label>
                <div class="control">
                    <input required id="hora" class="input" type="time" name="hora">
                </div>
            </div>
            <!-- Campo de Fecha -->
            <div class="field">
                <label class="label" for="fecha">Fecha</label>
                <div class="control">
                    <input required id="fecha" class="input" type="date" name="fecha">
                </div>
            </div>
            <!-- Campo de DPI del Policía -->
            <div class="field">
                <label class="label" for="dpiPolicia">DPI del Policía</label>
                <div class="control">
                    <div class="select">
                        <select required id="dpiPolicia" name="dpiPolicia">
                            <option value="" disabled selected>Seleccione un Policía</option>
                            <?php
                            // Conectar a la base de datos y obtener los DPI de los policías
                            $bd = obtenerConexion();

                            // Comprobar si la conexión fue exitosa
                            if ($bd) {
                                // Ejecutar la consulta
                                $sentencia = $bd->query("SELECT DPI, Nombre, Apellido FROM policia");
                                $policias = $sentencia->fetchAll(PDO::FETCH_ASSOC);

                                // Comprobar si hay policías
                                if ($policias) {
                                    foreach ($policias as $policia) {
                                        echo "<option value=\"{$policia['DPI']}\">{$policia['DPI']} - {$policia['Nombre']} {$policia['Apellido']}</option>";
                                    }
                                } else {
                                    echo "<option value='' disabled>No se encontraron policías.</option>";
                                }
                            } else {
                                echo "<option value='' disabled>Error al conectar a la base de datos.</option>";
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
                    <a href="Entradas.php" class="button is-warning">Volver</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include_once "pie.php"; ?>