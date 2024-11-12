<?php include_once "encabezado.php" ?>
<div class="columns is-centered mt-5">
    <div class="column is-half">
        <h2 class="title has-text-centered is-size-2">Agregar Nuevo Policía</h2>
        <form action="guardar_policia.php" method="post">
            <!-- Campo de DPI -->
            <div class="field">
                <label class="label" for="dpi">DPI</label>
                <div class="control">
                    <input required id="dpi" class="input" type="number" placeholder="DPI" name="dpi">
                </div>
            </div>
            <!-- Campo de Nombre -->
            <div class="field">
                <label class="label" for="nombre">Nombre</label>
                <div class="control">
                    <input required id="nombre" class="input" type="text" placeholder="Nombre" name="nombre">
                </div>
            </div>
            <!-- Campo de Apellido -->
            <div class="field">
                <label class="label" for="apellido">Apellido</label>
                <div class="control">
                    <input required id="apellido" class="input" type="text" placeholder="Apellido" name="apellido">
                </div>
            </div>
            <!-- Campo de Edad -->
            <div class="field">
                <label class="label" for="edad">Edad</label>
                <div class="control">
                    <input required id="edad" name="edad" class="input" type="number" placeholder="Edad">
                </div>
            </div>
            <!-- Campo de Dirección -->
            <div class="field">
                <label class="label" for="direccion">Dirección</label>
                <div class="control">
                    <textarea name="direccion" class="textarea" id="direccion" cols="30" rows="5" placeholder="Dirección" required></textarea>
                </div>
            </div>
            <!-- Botones -->
            <div class="field is-grouped is-grouped-centered">
                <div class="control">
                    <button class="button is-success">Guardar</button>
                </div>
                <div class="control">
                    <a href="Policia.php" class="button is-warning">Volver</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include_once "pie.php" ?>